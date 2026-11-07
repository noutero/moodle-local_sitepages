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
 * Create or edit a site page (Moodle HTML editor / optional PageTiler).
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// phpcs:disable moodle.Files.MoodleInternal.MoodleInternalGlobalState
require_once(__DIR__ . '/config_bootstrap.php'); // Loads Moodle config.php (symlink-safe).
// phpcs:enable
require_once($CFG->libdir . '/filelib.php');
require_once($CFG->dirroot . '/local/sitepages/locallib.php');
require_once($CFG->dirroot . '/local/sitepages/classes/form/page_form.php');

$id = optional_param('id', 0, PARAM_INT);

$context = context_system::instance();
require_login();
require_capability('local/sitepages:manage', $context);

$PAGE->set_url(new moodle_url('/local/sitepages/edit.php', $id ? ['id' => $id] : []));
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_title($id ? get_string('editpage', 'local_sitepages') : get_string('addpage', 'local_sitepages'));
$PAGE->set_heading($PAGE->title);

$editoroptions = local_sitepages_editor_options($context);
$haspagetiler = local_sitepages_pagetiler_available();

$page = null;
if ($id) {
    $page = local_sitepages_get_page($id);
    if (!$page) {
        throw new moodle_exception('pagenotfound', 'local_sitepages');
    }
}

$mform = new \local_sitepages\form\page_form(null, [
    'context' => $context,
    'haspagetiler' => $haspagetiler,
]);

if ($page) {
    $data = file_prepare_standard_editor(
        $page,
        'content',
        $editoroptions,
        $context,
        'local_sitepages',
        'content',
        $page->id
    );
    $mform->set_data($data);
} else {
    $empty = (object) [
        'id' => null,
        'name' => '',
        'slug' => '',
        'visible' => 1,
        'allowguest' => 0,
        'pagewidth' => 'limited',
        'hideheader' => 0,
        'editmode' => 'editor',
        'content' => '',
        'contentformat' => FORMAT_HTML,
    ];
    $empty = file_prepare_standard_editor(
        $empty,
        'content',
        $editoroptions,
        $context,
        'local_sitepages',
        'content',
        0
    );
    $mform->set_data($empty);
}

if ($mform->is_cancelled()) {
    redirect(new moodle_url('/local/sitepages/index.php'));
}

if ($data = $mform->get_data()) {
    $now = time();
    $waspagetiler = $page && ($page->editmode ?? '') === 'pagetiler';
    $record = new stdClass();
    $record->name = trim($data->name);
    $record->slug = local_sitepages_normalize_slug($data->slug ?? '');
    $record->visible = empty($data->visible) ? 0 : 1;
    $record->allowguest = empty($data->allowguest) ? 0 : 1;
    $record->pagewidth = local_sitepages_normalize_pagewidth($data->pagewidth ?? 'limited');
    $record->hideheader = empty($data->hideheader) ? 0 : 1;
    $record->editmode = ($haspagetiler && ($data->editmode ?? '') === 'pagetiler') ? 'pagetiler' : 'editor';
    $record->timemodified = $now;
    $record->usermodified = $USER->id;

    if (!empty($data->id)) {
        $record->id = (int) $data->id;
        $DB->update_record('local_sitepages', $record);
        $pageid = $record->id;
    } else {
        $record->timecreated = $now;
        $record->content = '';
        $record->contentformat = FORMAT_HTML;
        $record->contentjson = null;
        $pageid = $DB->insert_record('local_sitepages', $record);
    }

    if ($record->editmode === 'editor') {
        $data->id = $pageid;
        $data = file_postupdate_standard_editor(
            $data,
            'content',
            $editoroptions,
            $context,
            'local_sitepages',
            'content',
            $pageid
        );
        $DB->update_record('local_sitepages', (object) [
            'id' => $pageid,
            'content' => $data->content,
            'contentformat' => $data->contentformat,
            'timemodified' => $now,
        ]);
    }

    // Open the builder only when first creating/switching to PageTiler mode.
    // Settings saves on an existing PageTiler page return to the manage list.
    if ($record->editmode === 'pagetiler' && !$waspagetiler) {
        redirect(new moodle_url('/local/sitepages/builder.php', ['id' => $pageid]));
    }

    redirect(
        new moodle_url('/local/sitepages/index.php'),
        get_string('pageupdated', 'local_sitepages'),
        null,
        \core\output\notification::NOTIFY_SUCCESS
    );
}

echo $OUTPUT->header();
echo $OUTPUT->heading($PAGE->heading);

if ($page) {
    $actionbuttons = [];
    $actionbuttons[] = $OUTPUT->single_button(
        local_sitepages_page_url($page),
        get_string('viewpage', 'local_sitepages'),
        'get'
    );
    if ($haspagetiler && ($page->editmode ?? '') === 'pagetiler') {
        $actionbuttons[] = $OUTPUT->single_button(
            new moodle_url('/local/sitepages/builder.php', ['id' => $page->id]),
            get_string('editwithpagetiler', 'local_sitepages'),
            'get'
        );
    }
    echo html_writer::div(
        implode(' ', $actionbuttons),
        'mb-3 local-sitepages-edit-actions d-flex flex-wrap gap-2'
    );
}

$mform->display();
echo $OUTPUT->footer();
