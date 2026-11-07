<?php
/**
 * Delete a site page.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/config_bootstrap.php');
require_once($CFG->dirroot . '/local/sitepages/locallib.php');

$id = required_param('id', PARAM_INT);
confirm_sesskey();

$context = context_system::instance();
require_login();
require_capability('local/sitepages:manage', $context);

$page = local_sitepages_get_page($id);
if (!$page) {
    throw new moodle_exception('pagenotfound', 'local_sitepages');
}

if (local_sitepages_is_locked_system_page($page)) {
    redirect(
        new moodle_url('/local/sitepages/index.php'),
        get_string('homepagedeleteerror', 'local_sitepages'),
        null,
        \core\output\notification::NOTIFY_ERROR
    );
}

$fs = get_file_storage();
$fs->delete_area_files($context->id, 'local_sitepages', 'content', $id);
$fs->delete_area_files($context->id, 'local_sitepages', 'images', $id);

$DB->delete_records('local_sitepages', ['id' => $id]);

redirect(
    new moodle_url('/local/sitepages/index.php'),
    get_string('pagedeleted', 'local_sitepages'),
    null,
    \core\output\notification::NOTIFY_SUCCESS
);
