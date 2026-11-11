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
 * Hook callbacks for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_sitepages;

defined('MOODLE_INTERNAL') || die();

require_once(__DIR__ . '/../locallib.php');

/**
 * Navigation and other hooks.
 */
class hook_callbacks {
    /**
     * Replace Moodle site homepage (/) with the designated site page when enabled.
     *
     * @param \core\hook\after_config $hook
     */
    public static function after_config(\core\hook\after_config $hook): void {
        global $CFG;

        if (during_initial_install() || !empty($CFG->upgraderunning)) {
            return;
        }

        // Included files declare their own globals; exit lives inside each override.
        if (local_sitepages_should_serve_homepage()) {
            require($CFG->dirroot . '/local/sitepages/frontpage.php');
            return;
        }
        if (local_sitepages_should_serve_mycourses()) {
            require($CFG->dirroot . '/local/sitepages/mycourses.php');
        }
    }

    /**
     * Add "Pages" to primary navigation after My courses.
     *
     * @param \core\hook\navigation\primary_extend $hook
     */
    public static function primary_extend(\core\hook\navigation\primary_extend $hook): void {
        global $DB;

        $context = \context_system::instance();
        $allpages = $DB->get_records('local_sitepages', null, 'name ASC');
        $pages = [];
        foreach ($allpages as $page) {
            if (local_sitepages_can_view($page, $context)) {
                $pages[$page->id] = $page;
            }
        }

        if (!$pages && !has_capability('local/sitepages:manage', $context)) {
            return;
        }

        $primary = $hook->get_primaryview();
        $node = \navigation_node::create(
            get_string('pages', 'local_sitepages'),
            new \moodle_url('/local/sitepages/pages.php'),
            \navigation_node::TYPE_CUSTOM,
            null,
            'sitepages',
            new \pix_icon('icon', get_string('pages', 'local_sitepages'), 'local_sitepages')
        );

        // Child links for pages the current viewer may open.
        foreach ($pages as $page) {
            // Skip homepage / My courses targets and legacy welcome slug — already in primary/custom menu.
            if (local_sitepages_is_homepage_page($page) || local_sitepages_is_mycourses_page($page)) {
                continue;
            }
            $slug = (string) ($page->slug ?? '');
            if (in_array($slug, ['welcome', 'home'], true)) {
                continue;
            }
            $node->add(
                format_string($page->name),
                local_sitepages_page_url($page),
                \navigation_node::TYPE_CUSTOM,
                null,
                'sitepage-' . $page->id
            );
        }

        // Place after My courses: before Site administration when present.
        $beforekey = null;
        $keys = $primary->get_children_key_list();
        if (in_array('siteadminnode', $keys, true)) {
            $beforekey = 'siteadminnode';
        } else if (in_array('calendar', $keys, true)) {
            $beforekey = 'calendar';
        }

        $primary->add_node($node, $beforekey);
    }
}
