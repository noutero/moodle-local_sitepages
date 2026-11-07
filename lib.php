<?php
/**
 * Library callbacks for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * Remember / recall the site page currently being viewed (for navbar callbacks).
 *
 * @param stdClass|null $page Pass a page to store; omit/null to read.
 * @return stdClass|null
 */
function local_sitepages_current_page(?stdClass $page = null): ?stdClass {
    static $current = null;
    if ($page !== null) {
        $current = $page;
    }
    return $current;
}

/**
 * Whether the PageTiler activity plugin is available for optional builder mode.
 */
function local_sitepages_pagetiler_available(): bool {
    global $CFG;
    static $available = null;
    if ($available !== null) {
        return $available;
    }
    $available = false;
    if (!file_exists($CFG->dirroot . '/mod/pagetiler/version.php')) {
        return false;
    }
    $info = core_plugin_manager::instance()->get_plugin_info('mod_pagetiler');
    $available = $info && $info->is_enabled();
    return $available;
}

/**
 * Serve files from the site page content editor.
 *
 * @param stdClass $course
 * @param stdClass $cm
 * @param context $context
 * @param string $filearea
 * @param array $args
 * @param bool $forcedownload
 * @param array $options
 * @return bool
 */
/**
 * Inject "Edit with PageTiler" into the top usernavigation bar on site pages.
 *
 * @param renderer_base $renderer
 * @return string
 */
function local_sitepages_render_navbar_output(\renderer_base $renderer): string {
    // Edit controls render next to “Edit settings” on the page body while editing.
    return '';
}

function local_sitepages_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options = []): bool {
    if ($context->contextlevel != CONTEXT_SYSTEM) {
        return false;
    }
    // Editor HTML embeds use "content"; PageTiler JSON images use "images".
    if ($filearea !== 'content' && $filearea !== 'images') {
        return false;
    }

    require_once($CFG->dirroot . '/local/sitepages/locallib.php');

    $itemid = (int) array_shift($args);
    $page = local_sitepages_get_page($itemid);
    if (!$page) {
        return false;
    }
    local_sitepages_require_view($page);

    $filename = array_pop($args);
    $filepath = $args ? '/' . implode('/', $args) . '/' : '/';

    $fs = get_file_storage();
    $file = $fs->get_file($context->id, 'local_sitepages', $filearea, $itemid, $filepath, $filename);
    if (!$file || $file->is_directory()) {
        return false;
    }

    send_stored_file($file, $filearea === 'images' ? 60 * 60 : 0, 0, $forcedownload, $options);
    return true;
}
