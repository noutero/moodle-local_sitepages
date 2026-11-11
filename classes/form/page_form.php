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

/**
 * Moodle form to create or edit a site page.
 */
class page_form extends \moodleform {
    /**
     * Form definition.
     */
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
        $mform->addHelpButton('visible', 'visible', 'local_sitepages');

        $mform->addElement('advcheckbox', 'allowguest', get_string('allowguest', 'local_sitepages'));
        $mform->addHelpButton('allowguest', 'allowguest', 'local_sitepages');

        $mform->addElement('header', 'accessheader', get_string('accessheader', 'local_sitepages'));

        $roleoptions = local_sitepages_role_options();
        $mform->addElement(
            'autocomplete',
            'requiredroles',
            get_string('requiredroles', 'local_sitepages'),
            $roleoptions,
            [
                'multiple' => true,
                'noselectionstring' => get_string('requiredroles_none', 'local_sitepages'),
            ]
        );
        $mform->addHelpButton('requiredroles', 'requiredroles', 'local_sitepages');

        $cohortoptions = local_sitepages_cohort_options();
        $mform->addElement(
            'autocomplete',
            'requiredcohorts',
            get_string('requiredcohorts', 'local_sitepages'),
            $cohortoptions,
            [
                'multiple' => true,
                'noselectionstring' => get_string('requiredcohorts_none', 'local_sitepages'),
            ]
        );
        $mform->addHelpButton('requiredcohorts', 'requiredcohorts', 'local_sitepages');

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

    /**
     * Validate slug uniqueness.
     *
     * @param array $data
     * @param array $files
     * @return array
     */
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
