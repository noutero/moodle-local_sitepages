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
 * Local helpers for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// Safe if this file is included from inside a function (no inherited globals).
global $CFG;
require_once($CFG->libdir . '/filelib.php');
require_once($CFG->dirroot . '/local/sitepages/lib.php');

/**
 * Normalize page width setting.
 */
function local_sitepages_normalize_pagewidth($value): string {
    return ((string) $value) === 'full' ? 'full' : 'limited';
}

/**
 * Normalize slug: empty → null; otherwise lowercase slug-safe string.
 */
function local_sitepages_normalize_slug(?string $slug): ?string {
    $slug = trim((string) $slug);
    if ($slug === '') {
        return null;
    }
    $slug = core_text::strtolower($slug);
    $slug = preg_replace('/[^a-z0-9\-]+/', '-', $slug) ?? '';
    $slug = trim($slug, '-');
    return $slug === '' ? null : $slug;
}

/**
 * Load a page by id or slug.
 *
 * @return stdClass|false
 */
function local_sitepages_get_page(int $id = 0, string $slug = '') {
    global $DB;
    if ($id > 0) {
        return $DB->get_record('local_sitepages', ['id' => $id]);
    }
    if ($slug !== '') {
        return $DB->get_record('local_sitepages', ['slug' => local_sitepages_normalize_slug($slug)]);
    }
    return false;
}

/**
 * Public URL for a site page (pretty /slug when set, otherwise view.php?id=).
 */
function local_sitepages_page_url(stdClass $page): moodle_url {
    if (!empty($page->slug)) {
        return new moodle_url('/' . $page->slug);
    }
    return new moodle_url('/local/sitepages/view.php', ['id' => $page->id]);
}

/**
 * Can the current user view this page?
 */
function local_sitepages_can_view(stdClass $page, ?context $context = null): bool {
    $context = $context ?? context_system::instance();

    if (!$page->visible && !has_capability('local/sitepages:manage', $context)) {
        return false;
    }

    if (isloggedin() && !isguestuser()) {
        return has_capability('local/sitepages:view', $context)
            || has_capability('local/sitepages:manage', $context);
    }

    // Guests / logged-out.
    return !empty($page->allowguest) && !empty($page->visible);
}

/**
 * Require view access or throw.
 */
function local_sitepages_require_view(stdClass $page): void {
    $context = context_system::instance();
    if (!isloggedin() || isguestuser()) {
        if (!local_sitepages_can_view($page, $context)) {
            require_login();
            require_capability('local/sitepages:view', $context);
        }
        return;
    }
    if (!local_sitepages_can_view($page, $context)) {
        throw new moodle_exception('pagenotvisible', 'local_sitepages');
    }
}

/**
 * Render page body HTML.
 */
function local_sitepages_render_content(stdClass $page): string {
    global $CFG;

    if (($page->editmode ?? 'editor') === 'pagetiler') {
        if (!local_sitepages_pagetiler_available()) {
            return html_writer::div(get_string('pagetilerunavailable', 'local_sitepages'), 'alert alert-warning');
        }
        require_once($CFG->dirroot . '/mod/pagetiler/includes/bootstrap.php');
        $raw = json_decode((string) ($page->contentjson ?? ''), true);
        if (!is_array($raw)) {
            return html_writer::div(get_string('emptypage', 'local_sitepages'), 'alert alert-info');
        }
        $doc = \PageTiler\Security\Sanitizer::sanitize_document($raw);
        $html = (new \PageTiler\Documents\Renderer())->render($doc);
        if ($html === '') {
            return html_writer::div(get_string('emptypage', 'local_sitepages'), 'alert alert-info');
        }
        return html_writer::div($html, 'pagetiler-view local-sitepages-pagetiler');
    }

    $content = (string) ($page->content ?? '');
    if (trim(strip_tags($content)) === '' && trim($content) === '') {
        return html_writer::div(get_string('emptypage', 'local_sitepages'), 'alert alert-info');
    }

    $context = context_system::instance();
    $content = file_rewrite_pluginfile_urls(
        $content,
        'pluginfile.php',
        $context->id,
        'local_sitepages',
        'content',
        $page->id
    );
    return format_text($content, (int) $page->contentformat, [
        'context' => $context,
        'overflowdiv' => true,
        'noclean' => true,
    ]);
}

/**
 * Editing controls shown on the page while Moodle editing is on.
 */
function local_sitepages_render_edit_controls(stdClass $page): string {
    global $OUTPUT, $PAGE;

    $context = context_system::instance();
    if (!$PAGE->user_is_editing() || !has_capability('local/sitepages:manage', $context)) {
        return '';
    }

    $buttons = [];
    $buttons[] = $OUTPUT->single_button(
        new moodle_url('/local/sitepages/edit.php', ['id' => $page->id]),
        get_string('editsettings', 'local_sitepages'),
        'get'
    );

    if (local_sitepages_pagetiler_available() && ($page->editmode ?? '') === 'pagetiler') {
        $buttons[] = $OUTPUT->single_button(
            new moodle_url('/local/sitepages/builder.php', ['id' => $page->id]),
            get_string('editwithpagetiler', 'local_sitepages'),
            'get'
        );
    }

    return html_writer::div(implode(' ', $buttons), 'mb-3 local-sitepages-edit-controls d-flex flex-wrap gap-2');
}

/**
 * Whether PageTiler/site page should replace the Moodle site homepage.
 */
function local_sitepages_homepage_enabled(): bool {
    return (bool) get_config('local_sitepages', 'useonhomepage');
}

/**
 * Whether the current viewer counts as a real logged-in user (not guest).
 */
function local_sitepages_viewer_is_logged_in(): bool {
    return isloggedin() && !isguestuser();
}

/**
 * Frontpage page id for guests / logged-out visitors (0 if unset).
 */
function local_sitepages_homepage_page_id_guest(): int {
    return (int) get_config('local_sitepages', 'homepagepageid');
}

/**
 * Frontpage page id for logged-in users (0 = same as guests).
 */
function local_sitepages_homepage_page_id_loggedin(): int {
    return (int) get_config('local_sitepages', 'homepagepageid_loggedin');
}

/**
 * Configured homepage page id for the current viewer (0 if unset).
 */
function local_sitepages_homepage_page_id(): int {
    if (local_sitepages_viewer_is_logged_in()) {
        $loggedin = local_sitepages_homepage_page_id_loggedin();
        if ($loggedin > 0) {
            return $loggedin;
        }
    }
    return local_sitepages_homepage_page_id_guest();
}

/**
 * All page ids currently used as frontpage (guest and/or logged-in).
 *
 * @return int[]
 */
function local_sitepages_homepage_page_ids(): array {
    $ids = [];
    $guest = local_sitepages_homepage_page_id_guest();
    if ($guest > 0) {
        $ids[] = $guest;
    }
    $loggedin = local_sitepages_homepage_page_id_loggedin();
    if ($loggedin > 0) {
        $ids[] = $loggedin;
    }
    return array_values(array_unique($ids));
}

/**
 * Whether this site page is designated as a frontpage document.
 */
function local_sitepages_is_homepage_page(stdClass $page): bool {
    return in_array((int) $page->id, local_sitepages_homepage_page_ids(), true);
}

/**
 * Choices for the guest frontpage page selector (id => name).
 *
 * @return array<int,string>
 */
function local_sitepages_homepage_page_options(): array {
    global $DB;
    $options = [0 => get_string('homepagepage_choose', 'local_sitepages')];
    $pages = $DB->get_records('local_sitepages', null, 'name ASC', 'id, name');
    foreach ($pages as $page) {
        $options[(int) $page->id] = format_string($page->name);
    }
    return $options;
}

/**
 * Choices for the logged-in frontpage page selector.
 *
 * @return array<int,string>
 */
function local_sitepages_homepage_page_options_loggedin(): array {
    $options = local_sitepages_homepage_page_options();
    $options[0] = get_string('homepagepage_sameasguest', 'local_sitepages');
    return $options;
}

/**
 * Load a homepage page by id; optionally keep guests allowed (public frontpage).
 *
 * @return stdClass|false
 */
function local_sitepages_prepare_homepage_page(int $id, bool $forguest) {
    global $DB, $USER;

    if ($id <= 0) {
        return false;
    }
    $page = local_sitepages_get_page($id);
    if (!$page) {
        return false;
    }

    $changed = false;
    if (empty($page->visible)) {
        $page->visible = 1;
        $changed = true;
    }
    if ($forguest && empty($page->allowguest)) {
        $page->allowguest = 1;
        $changed = true;
    }
    if ($changed) {
        $page->timemodified = time();
        $page->usermodified = $USER->id ?? 0;
        $DB->update_record('local_sitepages', $page);
    }
    return $page;
}

/**
 * Homepage page for the current viewer when override is enabled.
 *
 * @return stdClass|false
 */
function local_sitepages_get_homepage_page() {
    if (!local_sitepages_homepage_enabled()) {
        return false;
    }
    $id = local_sitepages_homepage_page_id();
    $forguest = !local_sitepages_viewer_is_logged_in();
    return local_sitepages_prepare_homepage_page($id, $forguest);
}

/**
 * True when the current request is Moodle's site index script.
 */
function local_sitepages_is_site_index_script(): bool {
    global $SCRIPT;
    if (empty($SCRIPT)) {
        return false;
    }
    $script = str_replace('\\', '/', (string) $SCRIPT);
    return $script === '/index.php' || $script === 'index.php' || $script === '/';
}

/**
 * Whether this request should serve the PageTiler/site-page homepage instead of core frontpage.
 *
 * Preserves Moodle dashboard / My courses redirects. Supports ?redirect=0 for Site home.
 * Admins can escape with ?classic=1.
 */
function local_sitepages_should_serve_homepage(): bool {
    global $CFG;

    if (!local_sitepages_homepage_enabled()) {
        return false;
    }
    if (CLI_SCRIPT || AJAX_SCRIPT || during_initial_install() || !empty($CFG->upgraderunning)) {
        return false;
    }
    if (defined('PHPUNIT_TEST') && PHPUNIT_TEST) {
        return false;
    }
    if (!local_sitepages_is_site_index_script()) {
        return false;
    }
    // Escape hatch back to classic Moodle frontpage.
    if (optional_param('classic', 0, PARAM_BOOL)) {
        return false;
    }

    $redirect = optional_param('redirect', 1, PARAM_BOOL);
    $homepage = get_home_page();
    if ($homepage != HOMEPAGE_SITE && $redirect) {
        // Let core index.php redirect to Dashboard / My courses / custom URL.
        return false;
    }

    return local_sitepages_get_homepage_page() !== false;
}

/**
 * Whether PageTiler/site page should replace My courses.
 */
function local_sitepages_mycourses_enabled(): bool {
    return (bool) get_config('local_sitepages', 'useonmycourses');
}

/**
 * Configured My courses page id (0 if unset).
 */
function local_sitepages_mycourses_page_id(): int {
    return (int) get_config('local_sitepages', 'mycoursespageid');
}

/**
 * Whether this site page is the designated My courses document.
 */
function local_sitepages_is_mycourses_page(stdClass $page): bool {
    $id = local_sitepages_mycourses_page_id();
    return local_sitepages_mycourses_enabled() && $id > 0 && (int) $page->id === $id;
}

/**
 * Whether this page is locked because it backs homepage and/or My courses.
 */
function local_sitepages_is_locked_system_page(stdClass $page): bool {
    return (local_sitepages_homepage_enabled() && local_sitepages_is_homepage_page($page))
        || local_sitepages_is_mycourses_page($page);
}

/**
 * My courses page when override is enabled and a page is selected.
 *
 * @return stdClass|false
 */
function local_sitepages_get_mycourses_page() {
    if (!local_sitepages_mycourses_enabled()) {
        return false;
    }
    // Logged-in users only — do not force guest visibility.
    return local_sitepages_prepare_homepage_page(local_sitepages_mycourses_page_id(), false);
}

/**
 * True when the current request is Moodle's My courses script.
 */
function local_sitepages_is_mycourses_script(): bool {
    global $SCRIPT;
    if (empty($SCRIPT)) {
        return false;
    }
    $script = str_replace('\\', '/', (string) $SCRIPT);
    return $script === '/my/courses.php' || $script === 'my/courses.php';
}

/**
 * Whether this request should serve a Site page instead of core My courses.
 *
 * Admins can escape with ?classic=1.
 */
function local_sitepages_should_serve_mycourses(): bool {
    global $CFG;

    if (!local_sitepages_mycourses_enabled()) {
        return false;
    }
    if (CLI_SCRIPT || AJAX_SCRIPT || during_initial_install() || !empty($CFG->upgraderunning)) {
        return false;
    }
    if (defined('PHPUNIT_TEST') && PHPUNIT_TEST) {
        return false;
    }
    if (!local_sitepages_is_mycourses_script()) {
        return false;
    }
    if (optional_param('classic', 0, PARAM_BOOL)) {
        return false;
    }
    // My courses is for real users; let core handle guests / logged-out.
    if (!local_sitepages_viewer_is_logged_in()) {
        return false;
    }

    return local_sitepages_get_mycourses_page() !== false;
}

/**
 * Editor options for the page content field (Moodle HTML editor / TinyMCE).
 *
 * @return array<string,mixed>
 */
function local_sitepages_editor_options(context $context): array {
    global $CFG;
    return [
        'subdirs' => 1,
        'maxbytes' => $CFG->maxbytes,
        'maxfiles' => -1,
        'changeformat' => 1,
        'context' => $context,
        'noclean' => 1,
        'trusttext' => 0,
        'enable_filemanagement' => true,
    ];
}
