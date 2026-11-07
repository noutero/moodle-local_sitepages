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
 * Locate and load Moodle config.php when this plugin is symlinked
 * from outside dirroot (PHP resolves __DIR__ to the real path).
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

declare(strict_types=1);

$pagetilerConfigCandidates = [];

if (!empty($_SERVER['DOCUMENT_ROOT'])) {
	$pagetilerConfigCandidates[] = rtrim((string) $_SERVER['DOCUMENT_ROOT'], "/\\") . DIRECTORY_SEPARATOR . 'config.php';
}

foreach ([$_SERVER['SCRIPT_FILENAME'] ?? '', __FILE__] as $pagetilerStart) {
	if ($pagetilerStart === '') {
		continue;
	}
	$pagetilerDir = dirname(str_replace('\\', '/', (string) $pagetilerStart));
	for ($pagetilerI = 0; $pagetilerI < 8; $pagetilerI++) {
		$pagetilerConfigCandidates[] = $pagetilerDir . '/config.php';
		$pagetilerParent = dirname($pagetilerDir);
		if ($pagetilerParent === $pagetilerDir) {
			break;
		}
		$pagetilerDir = $pagetilerParent;
	}
}

$pagetilerSeen = [];
foreach ($pagetilerConfigCandidates as $pagetilerConfig) {
	$pagetilerConfig = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, $pagetilerConfig);
	if (isset($pagetilerSeen[$pagetilerConfig])) {
		continue;
	}
	$pagetilerSeen[$pagetilerConfig] = true;
	$pagetilerRoot = dirname($pagetilerConfig);
	if (is_readable($pagetilerConfig) && is_readable($pagetilerRoot . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'moodlelib.php')) {
		require $pagetilerConfig;
		return;
	}
}

http_response_code(500);
echo 'PageTiler could not locate Moodle config.php. Is the plugin installed under a Moodle dirroot?';
exit(1);
