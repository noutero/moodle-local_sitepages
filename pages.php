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
 * Public list of site pages (primary nav "Pages" tab).
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// phpcs:disable moodle.Files.MoodleInternal.MoodleInternalGlobalState
require_once(__DIR__ . '/config_bootstrap.php'); // Loads Moodle config.php (symlink-safe).
// phpcs:enable
require_once($CFG->dirroot . '/local/sitepages/locallib.php');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/sitepages/pages.php'));
$PAGE->set_pagelayout('standard');
$PAGE->set_title(get_string('pages', 'local_sitepages'));
$PAGE->set_heading(get_string('pages', 'local_sitepages'));

$canmanage = has_capability('local/sitepages:manage', $context);

$allpages = $DB->get_records('local_sitepages', null, 'name ASC');
$pages = [];
foreach ($allpages as $page) {
    if (local_sitepages_can_view($page, $context)) {
        $pages[$page->id] = $page;
    }
}

if (!$pages && !$canmanage) {
    require_login();
    require_capability('local/sitepages:view', $context);
}

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pages', 'local_sitepages'));

if ($canmanage) {
    echo $OUTPUT->single_button(
        new moodle_url('/local/sitepages/index.php'),
        get_string('managepages', 'local_sitepages'),
        'get'
    );
}

if (!$pages) {
    echo $OUTPUT->notification(get_string('nopages', 'local_sitepages'), 'info');
} else {
    echo html_writer::start_tag('ul', ['class' => 'list-unstyled local-sitepages-list']);
    foreach ($pages as $page) {
        $url = local_sitepages_page_url($page);
        echo html_writer::tag(
            'li',
            html_writer::link($url, format_string($page->name), ['class' => 'h5']),
            ['class' => 'mb-2']
        );
    }
    echo html_writer::end_tag('ul');
}

echo $OUTPUT->footer();
