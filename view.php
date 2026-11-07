<?php
/**
 * View a site page.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/config_bootstrap.php');
require_once($CFG->dirroot . '/local/sitepages/locallib.php');

$id = optional_param('id', 0, PARAM_INT);
$slug = optional_param('slug', '', PARAM_ALPHANUMEXT);

$context = context_system::instance();
$PAGE->set_context($context);

$page = local_sitepages_get_page($id, $slug);
if (!$page) {
    throw new moodle_exception('pagenotfound', 'local_sitepages');
}

// Canonical pretty URL: /welcome instead of view.php?id=… / ?slug=…
if (!empty($page->slug)) {
    $reqpath = parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH) ?: '';
    if (strpos($reqpath, '/local/sitepages/view.php') !== false) {
        redirect(local_sitepages_page_url($page));
    }
}

// Login only when required for this page.
if (!local_sitepages_can_view($page, $context)) {
    require_login();
    local_sitepages_require_view($page);
} else if (isloggedin() && !isguestuser()) {
    // Already allowed.
} else if (empty($page->allowguest)) {
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
