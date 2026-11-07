<?php
/**
 * Upgrade steps for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

/**
 * @param int $oldversion
 * @return bool
 */
function xmldb_local_sitepages_upgrade($oldversion) {
    global $DB;

    $dbman = $DB->get_manager();

    if ($oldversion < 2026110700) {
        $table = new xmldb_table('local_sitepages');

        $field = new xmldb_field('pagewidth', XMLDB_TYPE_CHAR, '20', null, XMLDB_NOTNULL, null, 'limited', 'allowguest');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        $field = new xmldb_field('hideheader', XMLDB_TYPE_INTEGER, '1', null, XMLDB_NOTNULL, null, '0', 'pagewidth');
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        upgrade_plugin_savepoint(true, 2026110700, 'local', 'sitepages');
    }

    return true;
}
