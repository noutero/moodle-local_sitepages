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
 * Optional PageTiler builder shell for a site page.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(__DIR__ . '/config_bootstrap.php');
require_once($CFG->dirroot . '/local/sitepages/locallib.php');

$id = required_param('id', PARAM_INT);

$context = context_system::instance();
require_login();
require_capability('local/sitepages:manage', $context);

if (!local_sitepages_pagetiler_available()) {
    throw new moodle_exception('pagetilerunavailable', 'local_sitepages');
}

$page = local_sitepages_get_page($id);
if (!$page) {
    throw new moodle_exception('pagenotfound', 'local_sitepages');
}

// Ensure PageTiler mode + empty document if needed.
if (($page->editmode ?? '') !== 'pagetiler' || empty($page->contentjson)) {
    require_once($CFG->dirroot . '/mod/pagetiler/includes/bootstrap.php');
    $update = (object) [
        'id' => $page->id,
        'editmode' => 'pagetiler',
        'timemodified' => time(),
        'usermodified' => $USER->id,
    ];
    if (empty($page->contentjson)) {
        $update->contentjson = json_encode(
            \PageTiler\Documents\Document::empty(),
            JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE
        );
    }
    $DB->update_record('local_sitepages', $update);
    $page = local_sitepages_get_page($id);
}

require_once($CFG->dirroot . '/mod/pagetiler/locallib.php');
require_once($CFG->dirroot . '/mod/pagetiler/includes/bootstrap.php');

$maxbytes = \mod_pagetiler\local\media_uploader::max_bytes($context);
$config = [
    'restUrl' => (new moodle_url('/local/sitepages/api.php'))->out(false) . '?r=',
    'nonce' => sesskey(),
    'postId' => (int) $page->id,
    'adminUrl' => (new moodle_url('/local/sitepages/edit.php', ['id' => $page->id]))->out(false),
    'viewUrl' => local_sitepages_page_url($page)->out(false),
    'widgets' => \PageTiler\Widgets\WidgetRegistry::schemas_for_client(),
    'media' => [
        'uploadUrl' => (new moodle_url('/local/sitepages/api.php', ['r' => '/media/upload']))->out(false),
        'maxBytes' => $maxbytes,
        'accept' => '.jpg,.jpeg,.png,.gif,.webp,image/jpeg,image/png,image/gif,image/webp',
        'allowExternalUrl' => true,
    ],
    'i18n' => [
        'hideSave' => true,
        'save' => 'Save',
        'publish' => 'Save',
        'exit' => 'Exit',
        'view' => get_string('viewpage', 'local_sitepages'),
        'undo' => 'Undo',
        'redo' => 'Redo',
        'addSection' => 'Add Section',
        'widgets' => 'Widgets',
        'settings' => 'Settings',
        'saving' => 'Saving…',
        'saved' => 'Saved',
        'error' => 'Something went wrong.',
        'mediaUpload' => get_string('mediaupload', 'pagetiler'),
        'mediaUploadHelp' => get_string('mediauploadhelp', 'pagetiler', display_size($maxbytes)),
        'mediaOrUrl' => get_string('mediaorurl', 'pagetiler'),
        'mediaPick' => get_string('mediapick', 'pagetiler'),
        'mediaCancel' => get_string('mediacancel', 'pagetiler'),
        'mediaUploading' => get_string('mediauploading', 'pagetiler'),
        'mediaUploadFailed' => get_string('mediauploadfailed', 'pagetiler'),
        'mediaInvalidType' => get_string('mediainvalidtype', 'pagetiler'),
        'mediaFileSize' => get_string('mediafilesize', 'pagetiler'),
    ],
];

$buildercss = pagetiler_asset_url('builder.css')->out(false);
$frontendcss = pagetiler_asset_url('frontend.css')->out(false);
$builderjs = pagetiler_asset_url('builder.js')->out(false);
$mediajs = pagetiler_asset_url('moodle-media.js')->out(false);
$configjson = json_encode($config, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP);

header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="<?php echo substr(current_language(), 0, 2); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo s(format_string($page->name) . ' — PageTiler'); ?></title>
    <link rel="stylesheet" href="<?php echo s($frontendcss); ?>">
    <link rel="stylesheet" href="<?php echo s($buildercss); ?>">
    <style>
        html, body { margin: 0; padding: 0; height: 100%; }
        body.pagetiler-builder-body { overflow: hidden; }
        #pagetiler-app { min-height: 100vh; }
        .pt-canvas .pagetiler-courses,
        .pt-canvas .pagetiler-course-cats,
        .pt-canvas .pagetiler-badges,
        .pt-canvas .pagetiler-featured-course,
        .pt-canvas .pagetiler-events,
        .pt-canvas .pagetiler-announcements { font-size: 13px; }
    </style>
</head>
<body class="pagetiler-builder-body">
    <div id="pagetiler-app"></div>
    <script>window.PageTilerConfig = <?php echo $configjson; ?>;</script>
    <script src="<?php echo s($mediajs); ?>"></script>
    <script src="<?php echo s($builderjs); ?>"></script>
</body>
</html>
<?php
exit;
