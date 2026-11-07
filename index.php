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
 * Admin list of site pages.
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
require_login();
require_capability('local/sitepages:manage', $context);

$PAGE->set_url(new moodle_url('/local/sitepages/index.php'));
$PAGE->set_context($context);
$PAGE->set_pagelayout('admin');
$PAGE->set_title(get_string('managepages', 'local_sitepages'));
$PAGE->set_heading(get_string('managepages', 'local_sitepages'));


$pages = $DB->get_records('local_sitepages', null, 'name ASC');
$haspagetiler = local_sitepages_pagetiler_available();
$homeenabled = local_sitepages_homepage_enabled();
$homeguestid = local_sitepages_homepage_page_id_guest();
$homeloggedinid = local_sitepages_homepage_page_id_loggedin();
$homeids = local_sitepages_homepage_page_ids();
$mycoursesenabled = local_sitepages_mycourses_enabled();
$mycoursesid = local_sitepages_mycourses_page_id();

echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('managepages', 'local_sitepages'));

if ($homeenabled && $homeids) {
    $homelinks = [
        html_writer::link(new moodle_url('/'), get_string('viewhomepage', 'local_sitepages')),
        html_writer::link(
            new moodle_url('/admin/settings.php', ['section' => 'local_sitepages_homepage']),
            get_string('sitehomepage', 'local_sitepages')
        ),
    ];
    echo $OUTPUT->notification(
        get_string('homepageactive', 'local_sitepages') . ' ' . implode(' · ', $homelinks),
        'info'
    );
}

if ($mycoursesenabled && $mycoursesid) {
    $mylinks = [
        html_writer::link(new moodle_url('/my/courses.php'), get_string('viewmycourses', 'local_sitepages')),
        html_writer::link(
            new moodle_url('/admin/settings.php', ['section' => 'local_sitepages_mycourses']),
            get_string('mycoursespage', 'local_sitepages')
        ),
    ];
    echo $OUTPUT->notification(
        get_string('mycoursesactive', 'local_sitepages') . ' ' . implode(' · ', $mylinks),
        'info'
    );
}

echo $OUTPUT->single_button(
    new moodle_url('/local/sitepages/edit.php'),
    get_string('addpage', 'local_sitepages'),
    'get'
);

if (!$pages) {
    echo $OUTPUT->notification(get_string('nopages', 'local_sitepages'), 'info');
} else {
    $table = new html_table();
    $table->head = [
        get_string('pagename', 'local_sitepages'),
        get_string('slug', 'local_sitepages'),
        get_string('editmode', 'local_sitepages'),
        get_string('visible', 'local_sitepages'),
        get_string('actions', 'local_sitepages'),
    ];
    $table->data = [];

    foreach ($pages as $page) {
        $viewurl = local_sitepages_page_url($page);
        $editurl = new moodle_url('/local/sitepages/edit.php', ['id' => $page->id]);
        $deleteurl = new moodle_url('/local/sitepages/delete.php', ['id' => $page->id, 'sesskey' => sesskey()]);

        $actions = [];
        $isguesthome = $homeenabled && $homeguestid && (int) $page->id === $homeguestid;
        $isloggedinhome = $homeenabled && $homeloggedinid && (int) $page->id === $homeloggedinid;
        $ismycourses = $mycoursesenabled && $mycoursesid && (int) $page->id === $mycoursesid;
        $islocked = $isguesthome || $isloggedinhome || $ismycourses;
        if ($isguesthome) {
            $pageviewurl = new moodle_url('/');
        } else if ($isloggedinhome) {
            $pageviewurl = new moodle_url('/', ['redirect' => 0]);
        } else if ($ismycourses) {
            $pageviewurl = new moodle_url('/my/courses.php');
        } else {
            $pageviewurl = $viewurl;
        }
        $actions[] = html_writer::link($pageviewurl, get_string('viewpage', 'local_sitepages'));
        $actions[] = html_writer::link($editurl, get_string('edit'));
        if ($haspagetiler && ($page->editmode ?? '') === 'pagetiler') {
            $actions[] = html_writer::link(
                new moodle_url('/local/sitepages/builder.php', ['id' => $page->id]),
                get_string('editwithpagetiler', 'local_sitepages')
            );
        }
        if ($islocked) {
            $actions[] = html_writer::span(get_string('homepagedeleteblocked', 'local_sitepages'), 'text-muted');
        } else {
            $actions[] = html_writer::link($deleteurl, get_string('delete'), [
                'onclick' => 'return confirm(' . json_encode(get_string('deleteconfirm', 'local_sitepages', format_string($page->name))) . ');',
            ]);
        }

        $mode = ($page->editmode ?? 'editor') === 'pagetiler'
            ? get_string('editmode_pagetiler', 'local_sitepages')
            : get_string('editmode_editor', 'local_sitepages');

        $namecell = format_string($page->name);
        if ($isguesthome && $isloggedinhome) {
            $namecell .= ' ' . html_writer::tag('span', get_string('homepagebadge', 'local_sitepages'), [
                'class' => 'badge bg-primary text-white',
            ]);
        } else if ($isguesthome) {
            $namecell .= ' ' . html_writer::tag('span', get_string('homepagebadge_guest', 'local_sitepages'), [
                'class' => 'badge bg-primary text-white',
            ]);
        } else if ($isloggedinhome) {
            $namecell .= ' ' . html_writer::tag('span', get_string('homepagebadge_loggedin', 'local_sitepages'), [
                'class' => 'badge bg-secondary text-dark',
            ]);
        }
        if ($ismycourses) {
            $namecell .= ' ' . html_writer::tag('span', get_string('mycoursesbadge', 'local_sitepages'), [
                'class' => 'badge bg-info text-dark',
            ]);
        }

        $table->data[] = [
            $namecell,
            s($page->slug ?? ''),
            $mode,
            $page->visible ? get_string('yes') : get_string('no'),
            implode(' | ', $actions),
        ];
    }
    echo html_writer::table($table);
}

echo $OUTPUT->footer();
