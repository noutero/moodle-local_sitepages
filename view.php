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
 * View a site page.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// phpcs:disable moodle.Files.MoodleInternal.MoodleInternalGlobalState
require_once(__DIR__ . '/config_bootstrap.php'); // Loads Moodle config.php (symlink-safe).
// phpcs:enable
require_once($CFG->dirroot . '/local/sitepages/locallib.php');

$id = optional_param('id', 0, PARAM_INT);
$slug = optional_param('slug', '', PARAM_ALPHANUMEXT);

$context = context_system::instance();
$PAGE->set_context($context);

$page = local_sitepages_get_page($id, $slug);
if (!$page) {
    throw new moodle_exception('pagenotfound', 'local_sitepages');
}

// Canonical pretty URL when rewrite is available (skip under Behat — no rewrite).
if (!empty($page->slug) && !(defined('BEHAT_SITE_RUNNING') && BEHAT_SITE_RUNNING)) {
    $reqpath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '';
    if (strpos($reqpath, '/local/sitepages/view.php') !== false) {
        redirect(local_sitepages_page_url($page));
    }
}

// Login only when required for this page.
if (!local_sitepages_can_view($page, $context)) {
    require_login();
    local_sitepages_require_view($page);
}

$PAGE->set_url(local_sitepages_page_url($page));
$PAGE->set_pagelayout('standard');
$PAGE->set_title(format_string($page->name));
if (has_capability('local/sitepages:manage', $context)) {
    $PAGE->set_other_editing_capability('local/sitepages:manage');
}
if (!empty($page->hideheader)) {
    $PAGE->set_heading('');
    $PAGE->add_body_class('local-sitepages-hideheader');
} else {
    $PAGE->set_heading(format_string($page->name));
}
// Boost caps .pagelayout-standard .main-inner; full width needs a body class + styles.css override.
if (local_sitepages_normalize_pagewidth($page->pagewidth ?? 'limited') === 'full') {
    $PAGE->add_body_class('local-sitepages-fullwidth');
} else {
    $PAGE->add_body_class('limitedwidth');
}
local_sitepages_current_page($page);

if (($page->editmode ?? '') === 'pagetiler' && local_sitepages_pagetiler_available()) {
    require_once($CFG->dirroot . '/mod/pagetiler/locallib.php');
    $PAGE->requires->css(pagetiler_asset_url('frontend.css'));
    $PAGE->requires->js(pagetiler_asset_url('frontend.js'), true);
}

echo $OUTPUT->header();
echo local_sitepages_render_edit_controls($page);
echo html_writer::div(local_sitepages_render_content($page), 'local-sitepages-content');

echo $OUTPUT->footer();
