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
 * Site homepage override — renders the designated site page at /.
 *
 * Included from after_config when homepage mode is enabled. Does not go through
 * core index.php frontpage() content (news, course lists, etc.).
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

global $CFG, $PAGE, $OUTPUT, $USER, $DB;

require_once($CFG->dirroot . '/local/sitepages/locallib.php');

$page = local_sitepages_get_homepage_page();
if (!$page) {
    // Config race: fall through to core (caller should not include us in this case).
    return;
}

$context = context_system::instance();
$PAGE->set_context($context);

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

$urlparams = [];
$redirect = optional_param('redirect', 1, PARAM_BOOL);
if (!empty($CFG->defaulthomepage) &&
        ($CFG->defaulthomepage == HOMEPAGE_MY || $CFG->defaulthomepage == HOMEPAGE_MYCOURSES) &&
        $redirect === 0
) {
    $urlparams['redirect'] = 0;
}
$PAGE->set_url('/', $urlparams);
// Use standard (not frontpage): themes like Moove/Trema inject slider, marketing
// boxes, and “site numbers” only in the frontpage layout for guests.
$PAGE->set_pagelayout('standard');
$PAGE->set_pagetype('site-index');
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
if (local_sitepages_normalize_pagewidth($page->pagewidth ?? 'limited') === 'full') {
    $PAGE->add_body_class('local-sitepages-fullwidth');
} else {
    $PAGE->add_body_class('limitedwidth');
}
$PAGE->add_body_class('local-sitepages-homepage');
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
exit;
