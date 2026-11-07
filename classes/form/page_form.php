<?php
/**
 * Create/edit form for a site page.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_sitepages\form;

defined('MOODLE_INTERNAL') || die();

global $CFG;
require_once($CFG->libdir . '/formslib.php');
require_once($CFG->dirroot . '/local/sitepages/locallib.php');

class page_form extends \moodleform {

    public function definition() {
        $mform = $this->_form;
        $context = $this->_customdata['context'];
        $haspagetiler = !empty($this->_customdata['haspagetiler']);

        $mform->addElement('text', 'name', get_string('pagename', 'local_sitepages'), ['size' => 64]);
        $mform->setType('name', PARAM_TEXT);
        $mform->addRule('name', null, 'required', null, 'client');
        $mform->addHelpButton('name', 'pagename', 'local_sitepages');

        $mform->addElement('text', 'slug', get_string('slug', 'local_sitepages'), ['size' => 40]);
        $mform->setType('slug', PARAM_ALPHANUMEXT);
        $mform->addHelpButton('slug', 'slug', 'local_sitepages');

        $mform->addElement('advcheckbox', 'visible', get_string('visible', 'local_sitepages'));
        $mform->setDefault('visible', 1);

        $mform->addElement('advcheckbox', 'allowguest', get_string('allowguest', 'local_sitepages'));
        $mform->addHelpButton('allowguest', 'allowguest', 'local_sitepages');

        $mform->addElement(
            'select',
            'pagewidth',
            get_string('pagewidth', 'local_sitepages'),
            [
                'limited' => get_string('pagewidth_limited', 'local_sitepages'),
                'full' => get_string('pagewidth_full', 'local_sitepages'),
            ]
        );
        $mform->setDefault('pagewidth', 'limited');
        $mform->setType('pagewidth', PARAM_ALPHA);
        $mform->addHelpButton('pagewidth', 'pagewidth', 'local_sitepages');

        $mform->addElement('advcheckbox', 'hideheader', get_string('hideheader', 'local_sitepages'));
        $mform->setDefault('hideheader', 0);
        $mform->setType('hideheader', PARAM_BOOL);
        $mform->addHelpButton('hideheader', 'hideheader', 'local_sitepages');

        if ($haspagetiler) {
            $modes = [
                'editor' => get_string('editmode_editor', 'local_sitepages'),
                'pagetiler' => get_string('editmode_pagetiler', 'local_sitepages'),
            ];
            $mform->addElement('select', 'editmode', get_string('editmode', 'local_sitepages'), $modes);
            $mform->setDefault('editmode', 'editor');
        } else {
            $mform->addElement('hidden', 'editmode', 'editor');
            $mform->setType('editmode', PARAM_ALPHA);
        }

        // Moodle HTML editor (TinyMCE / Atto) — same element type as mod_page.
        $mform->addElement(
            'editor',
            'content_editor',
            get_string('content', 'local_sitepages'),
            ['rows' => 20],
            local_sitepages_editor_options($context)
        );
        $mform->setType('content_editor', PARAM_RAW);
        if ($haspagetiler) {
            $mform->hideIf('content_editor', 'editmode', 'eq', 'pagetiler');
        }

        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_INT);

        $this->add_action_buttons(true, get_string('savechanges'));
    }

    public function validation($data, $files) {
        global $DB;
        $errors = parent::validation($data, $files);

        $slug = local_sitepages_normalize_slug($data['slug'] ?? '');
        if ($slug !== null) {
            $select = 'slug = :slug';
            $params = ['slug' => $slug];
            if (!empty($data['id'])) {
                $select .= ' AND id <> :id';
                $params['id'] = (int) $data['id'];
            }
            if ($DB->record_exists_select('local_sitepages', $select, $params)) {
                $errors['slug'] = get_string('error');
            }
        }

        return $errors;
    }
}
