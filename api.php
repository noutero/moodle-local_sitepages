<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * PageTiler builder API for site pages (optional; requires mod_pagetiler).
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

define('AJAX_SCRIPT', true);

// phpcs:disable moodle.Files.MoodleInternal.MoodleInternalGlobalState
require_once(__DIR__ . '/config_bootstrap.php'); // Loads Moodle config.php (symlink-safe).
// phpcs:enable
require_once($CFG->dirroot . '/local/sitepages/locallib.php');

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');

/**
 * Emit a JSON response and exit.
 *
 * @param array $payload
 * @return never
 */
function local_sitepages_api_json(array $payload): void {
    echo json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}

/**
 * Decode the JSON request body.
 *
 * @return array
 */
function local_sitepages_api_body(): array {
    $raw = file_get_contents('php://input');
    if ($raw === false || $raw === '') {
        return [];
    }
    $data = json_decode($raw, true);
    return is_array($data) ? $data : [];
}

try {
    require_login();
    $context = context_system::instance();
    require_capability('local/sitepages:manage', $context);

    if (!local_sitepages_pagetiler_available()) {
        throw new moodle_exception('pagetilerunavailable', 'local_sitepages');
    }

    $nonce = $_SERVER['HTTP_X_WP_NONCE'] ?? '';
    if (!confirm_sesskey($nonce)) {
        throw new moodle_exception('invalidsesskey');
    }

    require_once($CFG->dirroot . '/mod/pagetiler/includes/bootstrap.php');

    $pathinfo = $_SERVER['PATH_INFO'] ?? '';
    if ($pathinfo === '' || $pathinfo === '/') {
        $pathinfo = optional_param('r', '', PARAM_RAW_TRIMMED);
    }
    $pathinfo = '/' . ltrim((string) $pathinfo, '/');
    $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');

    if (preg_match('#^/documents/(\d+)$#', $pathinfo, $m)) {
        $pageid = (int) $m[1];
        $page = local_sitepages_get_page($pageid);
        if (!$page) {
            throw new moodle_exception('pagenotfound', 'local_sitepages');
        }

        if ($method === 'GET') {
            $raw = json_decode((string) ($page->contentjson ?? ''), true);
            $doc = is_array($raw)
                ? \PageTiler\Security\Sanitizer::sanitize_document($raw)
                : \PageTiler\Documents\Document::empty();
            local_sitepages_api_json([
                'document' => $doc,
                'title' => $page->name,
                'status' => 'publish',
            ]);
        }

        if ($method === 'POST' || $method === 'PUT' || $method === 'PATCH') {
            $body = local_sitepages_api_body();
            $document = $body['document'] ?? null;
            if (!is_array($document)) {
                throw new invalid_parameter_exception('Missing document');
            }
            $clean = \PageTiler\Security\Sanitizer::sanitize_document($document);
            $update = (object) [
                'id' => $pageid,
                'editmode' => 'pagetiler',
                'contentjson' => json_encode($clean, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                'timemodified' => time(),
                'usermodified' => $USER->id,
            ];
            if (!empty($body['title']) && is_string($body['title'])) {
                $update->name = clean_param($body['title'], PARAM_TEXT);
            }
            $DB->update_record('local_sitepages', $update);
            local_sitepages_api_json([
                'document' => $clean,
                'title' => $update->name ?? $page->name,
                'status' => 'publish',
            ]);
        }
    }

    if (preg_match('#^/documents/(\d+)/publish$#', $pathinfo) && $method === 'POST') {
        // Same as save for site pages.
        $pathinfo = preg_replace('#/publish$#', '', $pathinfo);
        $_SERVER['REQUEST_METHOD'] = 'POST';
        // Fall through by re-dispatching simply.
        if (preg_match('#^/documents/(\d+)$#', $pathinfo, $m)) {
            $pageid = (int) $m[1];
            $page = local_sitepages_get_page($pageid);
            if (!$page) {
                throw new moodle_exception('pagenotfound', 'local_sitepages');
            }
            $body = local_sitepages_api_body();
            if (is_array($body['document'] ?? null)) {
                $clean = \PageTiler\Security\Sanitizer::sanitize_document($body['document']);
                $DB->update_record('local_sitepages', (object) [
                    'id' => $pageid,
                    'editmode' => 'pagetiler',
                    'contentjson' => json_encode($clean, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
                    'timemodified' => time(),
                    'usermodified' => $USER->id,
                ]);
            }
            $raw = json_decode((string) $DB->get_field('local_sitepages', 'contentjson', ['id' => $pageid]), true);
            local_sitepages_api_json([
                'status' => 'publish',
                'document' => is_array($raw)
                    ? \PageTiler\Security\Sanitizer::sanitize_document($raw)
                    : \PageTiler\Documents\Document::empty(),
            ]);
        }
    }

    if (preg_match('#^/courses-preview#', $pathinfo) && $method === 'GET') {
        local_sitepages_api_json([
            'courses' => \PageTiler\Catalog\MoodleCatalogHelper::getCourses([
                'filter' => optional_param('filter', 'all', PARAM_ALPHA),
                'category_id' => optional_param('category_id', 0, PARAM_INT),
                'count' => optional_param('count', 6, PARAM_INT),
                'orderby' => optional_param('orderby', 'fullname', PARAM_ALPHA),
                'order' => optional_param('order', 'ASC', PARAM_ALPHA),
                'summary_words' => optional_param('summary_words', 18, PARAM_INT),
            ]),
        ]);
    }

    if (preg_match('#^/my-courses-preview#', $pathinfo) && $method === 'GET') {
        local_sitepages_api_json([
            'courses' => \PageTiler\Catalog\MoodleCatalogHelper::getMyCourses([
                'count' => optional_param('count', 6, PARAM_INT),
                'summary_words' => optional_param('summary_words', 18, PARAM_INT),
            ]),
        ]);
    }

    if (preg_match('#^/course-categories-preview#', $pathinfo) && $method === 'GET') {
        local_sitepages_api_json([
            'categories' => \PageTiler\Catalog\MoodleCatalogHelper::getCategories([
                'parent_id' => optional_param('parent_id', 0, PARAM_INT),
                'count' => optional_param('count', 0, PARAM_INT),
                'hide_empty' => optional_param('hide_empty', 1, PARAM_INT),
            ]),
        ]);
    }

    if (preg_match('#^/featured-course-preview#', $pathinfo) && $method === 'GET') {
        local_sitepages_api_json([
            'course' => \PageTiler\Catalog\MoodleCatalogHelper::getCourse(
                optional_param('course_id', 0, PARAM_INT),
                optional_param('summary_words', 40, PARAM_INT)
            ),
        ]);
    }

    if (preg_match('#^/events-preview#', $pathinfo) && $method === 'GET') {
        local_sitepages_api_json([
            'events' => \PageTiler\Catalog\MoodleCatalogHelper::getEvents([
                'count' => optional_param('count', 5, PARAM_INT),
                'days' => optional_param('days', 30, PARAM_INT),
                'course_filter' => optional_param('course_filter', 'all', PARAM_ALPHA),
                'course_id' => optional_param('course_id', 0, PARAM_INT),
            ]),
        ]);
    }

    if (preg_match('#^/announcements-preview#', $pathinfo) && $method === 'GET') {
        local_sitepages_api_json([
            'announcements' => \PageTiler\Catalog\MoodleCatalogHelper::getAnnouncements([
                'source' => optional_param('source', 'site', PARAM_ALPHA),
                'course_id' => optional_param('course_id', 0, PARAM_INT),
                'count' => optional_param('count', 5, PARAM_INT),
                'excerpt_words' => optional_param('excerpt_words', 30, PARAM_INT),
            ]),
        ]);
    }

    if (preg_match('#^/badges-preview#', $pathinfo) && $method === 'GET') {
        local_sitepages_api_json([
            'badges' => \PageTiler\Catalog\MoodleCatalogHelper::getBadges([
                'scope' => optional_param('scope', 'site', PARAM_ALPHA),
                'course_id' => optional_param('course_id', 0, PARAM_INT),
                'count' => optional_param('count', 8, PARAM_INT),
            ]),
        ]);
    }

    if (preg_match('#^/media/upload$#', $pathinfo) && $method === 'POST') {
        $pageid = required_param('id', PARAM_INT);
        $page = local_sitepages_get_page($pageid);
        if (!$page) {
            throw new moodle_exception('pagenotfound', 'local_sitepages');
        }
        if (empty($_FILES['file']) || !is_array($_FILES['file'])) {
            throw new moodle_exception('nofile', 'error');
        }

        $alt = optional_param('alt', '', PARAM_TEXT);
        $stored = \mod_pagetiler\local\media_uploader::store_upload(
            $context,
            'local_sitepages',
            \mod_pagetiler\local\media_uploader::FILEAREA,
            $pageid,
            $_FILES['file'],
            $alt
        );

        local_sitepages_api_json([
            'id' => (int) $stored->get_id(),
            'url' => \mod_pagetiler\local\media_uploader::public_url($stored),
            'alt' => $alt,
            'filename' => $stored->get_filename(),
            'mimetype' => $stored->get_mimetype(),
            'filesize' => (int) $stored->get_filesize(),
        ]);
    }

    throw new moodle_exception('invalidparameter', 'error');
} catch (Throwable $e) {
    $code = ($e instanceof moodle_exception && $e->errorcode === 'invalidsesskey') ? 403 : 400;
    http_response_code($code);
    echo json_encode([
        'message' => $e->getMessage(),
        'errorcode' => $e instanceof moodle_exception ? $e->errorcode : 'error',
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    exit;
}
