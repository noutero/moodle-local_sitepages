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
 * Admin settings / management entry for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    // Top-level Site administration category between Courses and Grades.
    // Nested category so Moodle treats this as a full tab (not a "short branch").
    $ADMIN->add(
        'root',
        new admin_category('local_sitepages', get_string('pages', 'local_sitepages')),
        'grades'
    );
    $ADMIN->add(
        'local_sitepages',
        new admin_category('local_sitepages_pages', get_string('managepages', 'local_sitepages'))
    );
    $ADMIN->add(
        'local_sitepages_pages',
        new admin_externalpage(
            'local_sitepages_manage',
            get_string('managepages', 'local_sitepages'),
            new moodle_url('/local/sitepages/index.php'),
            'local/sitepages:manage'
        )
    );

    require_once($CFG->dirroot . '/local/sitepages/locallib.php');

    $homesettings = new admin_settingpage(
        'local_sitepages_homepage',
        get_string('sitehomepage', 'local_sitepages'),
        'local/sitepages:manage'
    );

    $homesettings->add(new admin_setting_heading(
        'local_sitepages/homepageheading',
        get_string('sitehomepage', 'local_sitepages'),
        get_string('sitehomepage_desc', 'local_sitepages')
    ));

    $homesettings->add(new admin_setting_configcheckbox(
        'local_sitepages/useonhomepage',
        get_string('useonhomepage', 'local_sitepages'),
        get_string('useonhomepage_help', 'local_sitepages'),
        0
    ));

    $homesettings->add(new admin_setting_configselect(
        'local_sitepages/homepagepageid',
        get_string('homepagepage', 'local_sitepages'),
        get_string('homepagepage_help', 'local_sitepages'),
        0,
        local_sitepages_homepage_page_options()
    ));

    $homesettings->add(new admin_setting_configselect(
        'local_sitepages/homepagepageid_loggedin',
        get_string('homepagepage_loggedin', 'local_sitepages'),
        get_string('homepagepage_loggedin_help', 'local_sitepages'),
        0,
        local_sitepages_homepage_page_options_loggedin()
    ));

    $homeenabled = (bool) get_config('local_sitepages', 'useonhomepage');
    $guestid = (int) get_config('local_sitepages', 'homepagepageid');
    $loggedinid = (int) get_config('local_sitepages', 'homepagepageid_loggedin');
    $guestpage = ($guestid > 0) ? local_sitepages_get_page($guestid) : false;
    $loggedinpage = ($loggedinid > 0) ? local_sitepages_get_page($loggedinid) : false;

    if ($homeenabled && !$guestpage) {
        $homesettings->add(new admin_setting_heading(
            'local_sitepages/homepagemissing',
            get_string('homepageactions', 'local_sitepages'),
            get_string('homepagemissing', 'local_sitepages')
        ));
    } else if ($homeenabled && $guestpage) {
        $chunks = [];

        $guestlinks = [
            html_writer::link(new moodle_url('/'), get_string('viewhomepage', 'local_sitepages')),
            html_writer::link(
                new moodle_url('/local/sitepages/edit.php', ['id' => $guestpage->id]),
                get_string('edithomepage', 'local_sitepages')
            ),
        ];
        if (local_sitepages_pagetiler_available() && ($guestpage->editmode ?? '') === 'pagetiler') {
            $guestlinks[] = html_writer::link(
                new moodle_url('/local/sitepages/builder.php', ['id' => $guestpage->id]),
                get_string('editwithpagetiler', 'local_sitepages')
            );
        }
        $chunks[] = html_writer::div(
            html_writer::tag('strong', get_string('homepagepage', 'local_sitepages') . ': ')
                . format_string($guestpage->name) . ' — ' . implode(' · ', $guestlinks)
        );

        if ($loggedinpage) {
            $inlinks = [
                html_writer::link(
                    new moodle_url('/', ['redirect' => 0]),
                    get_string('viewhomepage_loggedin', 'local_sitepages')
                ),
                html_writer::link(
                    new moodle_url('/local/sitepages/edit.php', ['id' => $loggedinpage->id]),
                    get_string('edithomepage', 'local_sitepages')
                ),
            ];
            if (local_sitepages_pagetiler_available() && ($loggedinpage->editmode ?? '') === 'pagetiler') {
                $inlinks[] = html_writer::link(
                    new moodle_url('/local/sitepages/builder.php', ['id' => $loggedinpage->id]),
                    get_string('editwithpagetiler', 'local_sitepages')
                );
            }
            $chunks[] = html_writer::div(
                html_writer::tag('strong', get_string('homepagepage_loggedin', 'local_sitepages') . ': ')
                    . format_string($loggedinpage->name) . ' — ' . implode(' · ', $inlinks)
            );
        }

        $chunks[] = html_writer::div(html_writer::link(
            new moodle_url('/', ['classic' => 1]),
            get_string('viewclassichomepage', 'local_sitepages')
        ));

        $homesettings->add(new admin_setting_heading(
            'local_sitepages/homepageactions',
            get_string('homepageactions', 'local_sitepages'),
            implode('', $chunks)
        ));
    }

    $ADMIN->add('local_sitepages', $homesettings);

    $mycoursessettings = new admin_settingpage(
        'local_sitepages_mycourses',
        get_string('mycoursespage', 'local_sitepages'),
        'local/sitepages:manage'
    );

    $mycoursessettings->add(new admin_setting_heading(
        'local_sitepages/mycoursesheading',
        get_string('mycoursespage', 'local_sitepages'),
        get_string('mycoursespage_desc', 'local_sitepages')
    ));

    $mycoursessettings->add(new admin_setting_configcheckbox(
        'local_sitepages/useonmycourses',
        get_string('useonmycourses', 'local_sitepages'),
        get_string('useonmycourses_help', 'local_sitepages'),
        0
    ));

    $mycoursessettings->add(new admin_setting_configselect(
        'local_sitepages/mycoursespageid',
        get_string('mycoursespage_select', 'local_sitepages'),
        get_string('mycoursespage_select_help', 'local_sitepages'),
        0,
        local_sitepages_homepage_page_options()
    ));

    $mycoursesenabled = (bool) get_config('local_sitepages', 'useonmycourses');
    $mycoursesid = (int) get_config('local_sitepages', 'mycoursespageid');
    $mycoursespage = ($mycoursesid > 0) ? local_sitepages_get_page($mycoursesid) : false;

    if ($mycoursesenabled && !$mycoursespage) {
        $mycoursessettings->add(new admin_setting_heading(
            'local_sitepages/mycoursesmissing',
            get_string('mycoursesactions', 'local_sitepages'),
            get_string('mycoursesmissing', 'local_sitepages')
        ));
    } else if ($mycoursesenabled && $mycoursespage) {
        $mylinks = [
            html_writer::link(
                new moodle_url('/my/courses.php'),
                get_string('viewmycourses', 'local_sitepages')
            ),
            html_writer::link(
                new moodle_url('/local/sitepages/edit.php', ['id' => $mycoursespage->id]),
                get_string('edithomepage', 'local_sitepages')
            ),
        ];
        if (local_sitepages_pagetiler_available() && ($mycoursespage->editmode ?? '') === 'pagetiler') {
            $mylinks[] = html_writer::link(
                new moodle_url('/local/sitepages/builder.php', ['id' => $mycoursespage->id]),
                get_string('editwithpagetiler', 'local_sitepages')
            );
        }
        $mylinks[] = html_writer::link(
            new moodle_url('/my/courses.php', ['classic' => 1]),
            get_string('viewclassicmycourses', 'local_sitepages')
        );
        $mycoursessettings->add(new admin_setting_heading(
            'local_sitepages/mycoursesactions',
            get_string('mycoursesactions', 'local_sitepages'),
            format_string($mycoursespage->name) . ' — ' . implode(' · ', $mylinks)
        ));
    }

    $ADMIN->add('local_sitepages', $mycoursessettings);
}
