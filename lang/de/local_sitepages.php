<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * German language strings for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Aktionen';
$string['addpage'] = 'Seite hinzufügen';
$string['allowguest'] = 'Gäste zulassen';
$string['allowguest_help'] = 'Wenn aktiviert, können abgemeldete Gäste diese Seite ohne die Anzeigeberechtigung sehen.';
$string['content'] = 'Seiteninhalt';
$string['deleteconfirm'] = 'Seite „{$a}“ löschen?';
$string['deletepage'] = 'Seite löschen';
$string['edithomepage'] = 'Seiteneinstellungen bearbeiten';
$string['editmode'] = 'Bearbeitungsmodus';
$string['editmode_editor'] = 'HTML-Editor';
$string['editmode_pagetiler'] = 'PageTiler';
$string['editpage'] = 'Seite bearbeiten';
$string['editsettings'] = 'Einstellungen bearbeiten';
$string['editwitheditor'] = 'Mit HTML-Editor bearbeiten';
$string['editwithpagetiler'] = 'Mit PageTiler bearbeiten';
$string['emptypage'] = 'Diese Seite hat noch keinen Inhalt.';
$string['eventpageviewed'] = 'Website-Seite angezeigt';
$string['hideheader'] = 'Seitenkopf ausblenden';
$string['hideheader_help'] = 'Blendet die Seitentitelüberschrift über dem Inhalt aus. Die Website-Navigationsleiste wird durch diese Einstellung nicht entfernt.';
$string['homepageactions'] = 'Startseiten-Aktionen';
$string['homepageactive'] = 'Die Website-Startseite verwendet eine Website-Seite.';
$string['homepagebadge'] = 'Startseite';
$string['homepagebadge_guest'] = 'Startseite (Gäste)';
$string['homepagebadge_loggedin'] = 'Startseite (angemeldet)';
$string['homepagedeleteblocked'] = 'Systemseiteneinstellungen ändern zum Löschen';
$string['homepagedeleteerror'] = 'Diese Seite wird als Website-Startseite oder Meine Kurse-Seite verwendet. Ändern Sie die Einstellungen für Website-Seiten, bevor Sie sie löschen.';
$string['homepagemissing'] = 'Die Startseiten-Überschreibung ist aktiv, aber es ist keine gültige Gast-Startseite ausgewählt. Wählen Sie oben eine Seite oder erstellen Sie eine unter Website-Seiten verwalten.';
$string['homepagepage'] = 'Startseite für Gäste';
$string['homepagepage_choose'] = 'Seite wählen…';
$string['homepagepage_help'] = 'Website-Seite, die abgemeldeten Besuchern (und Gästen) unter / angezeigt wird. Erstellen Sie Seiten unter Seiten → Website-Seiten verwalten, wenn die Liste leer ist.';
$string['homepagepage_loggedin'] = 'Startseite bei Anmeldung';
$string['homepagepage_loggedin_help'] = 'Optional. Website-Seite für angemeldete Nutzer auf der Website-Startseite. Wählen Sie „Wie für Gäste“, um die Gastseite wiederzuverwenden. Nutzer, deren Standardstart Dashboard / Meine Kurse ist, landen dort zuerst.';
$string['homepagepage_sameasguest'] = 'Wie für Gäste';
$string['managepages'] = 'Website-Seiten verwalten';
$string['mycoursesactions'] = 'Meine-Kurse-Aktionen';
$string['mycoursesactive'] = 'Meine Kurse verwendet eine Website-Seite.';
$string['mycoursesbadge'] = 'Meine Kurse';
$string['mycoursesmissing'] = 'Die Meine-Kurse-Überschreibung ist aktiv, aber es ist keine gültige Website-Seite ausgewählt. Wählen Sie oben eine Seite oder erstellen Sie eine unter Website-Seiten verwalten.';
$string['mycoursespage'] = 'Meine Kurse';
$string['mycoursespage_desc'] = 'Ersetzen Sie Moodles Meine-Kurse-Seite (/my/courses.php) durch eine vorhandene Website-Seite. Nur für angemeldete Nutzer. Erstellen Sie die Seite zuerst unter Website-Seiten verwalten (Sie können ein Kurs-Widget in PageTiler einbinden).';
$string['mycoursespage_select'] = 'Meine-Kurse-Seite';
$string['mycoursespage_select_help'] = 'Welche Website-Seite unter /my/courses.php angezeigt wird.';
$string['nopages'] = 'Noch keine Website-Seiten.';
$string['pagedeleted'] = 'Seite gelöscht.';
$string['pagename'] = 'Seitenname';
$string['pagename_help'] = 'Titel, der auf der Seite und in der Admin-Liste angezeigt wird.';
$string['pagenotfound'] = 'Seite nicht gefunden.';
$string['pagenotvisible'] = 'Diese Seite ist nicht verfügbar.';
$string['pages'] = 'Seiten';
$string['pagetilerunavailable'] = 'Diese Seite wurde mit PageTiler erstellt, aber das PageTiler-Aktivitätsplugin ist nicht verfügbar.';
$string['pageupdated'] = 'Seite gespeichert.';
$string['pagewidth'] = 'Seitenbreite';
$string['pagewidth_full'] = 'Volle Breite';
$string['pagewidth_help'] = 'Begrenzt entspricht typischen Moodle-Seiten (begrenzte Breite in Boost). Voll nutzt den gesamten Hauptinhaltsbereich — besser für breite Layouts und Mehrspalten-Designs.';
$string['pagewidth_limited'] = 'Begrenzt (Theme-Standard)';
$string['pluginname'] = 'Website-Seiten';
$string['privacy:metadata'] = 'Das Plugin Website-Seiten speichert von Administratoren erstellte Seiteninhalte. Es speichert keine personenbezogenen Nutzerdaten außer dem Standardfeld usermodified.';
$string['sitehomepage'] = 'Website-Startseite';
$string['sitehomepage_desc'] = 'Ersetzen Sie die Standard-Moodle-Website-Startseite durch Website-Seiten. Sie können unterschiedliche Seiten für Besucher und angemeldete Nutzer verwenden. Erstellen Sie Seiten zuerst unter Website-Seiten verwalten. Dashboard- / Meine-Kurse-Weiterleitungen bleiben unverändert — angemeldete Nutzer sehen die angemeldete Startseite nur, wenn Website ihre Startseite ist, oder über Website-Startseite (/?redirect=0).';
$string['sitepages:manage'] = 'Website-Seiten verwalten';
$string['sitepages:view'] = 'Website-Seiten anzeigen';
$string['slug'] = 'URL-Slug';
$string['slug_help'] = 'Optionaler kurzer URL-Name (Buchstaben, Zahlen, Bindestriche). Seiten sind unter /local/sitepages/view.php?slug=name erreichbar. Mit aktivierten „Pretty URLs“ (und Server-Rewrite) auch unter /name.';
$string['useprettyurls'] = 'Hübsche Seiten-URLs (/slug)';
$string['useprettyurls_help'] = 'Wenn aktiviert, verwenden Website-Seiten mit Slug /slug statt /local/sitepages/view.php?slug=…. Erfordert eine Rewrite-Regel, die /slug auf view.php abbildet. Ausgeschaltet lassen, sofern kein Rewrite konfiguriert ist.';
$string['useonhomepage'] = 'Website-Seite auf der Startseite verwenden';
$string['useonhomepage_help'] = 'Wenn aktiviert, zeigt Moodles Website-Startseite (/) die ausgewählte(n) Website-Seite(n) statt der klassischen Startseite. Die Gastseite wird automatisch gastsichtbar gemacht. Deaktivieren, um die klassische Moodle-Startseite wiederherzustellen.';
$string['useonmycourses'] = 'Website-Seite für Meine Kurse verwenden';
$string['useonmycourses_help'] = 'Wenn aktiviert, zeigt Meine Kurse die ausgewählte Website-Seite statt der Standard-Kursübersicht. Deaktivieren, um die klassische Meine-Kurse-Seite wiederherzustellen.';
$string['viewclassichomepage'] = 'Klassische Startseite anzeigen';
$string['viewclassicmycourses'] = 'Klassische Meine Kurse anzeigen';
$string['viewhomepage'] = 'Als Gast-Startseite anzeigen';
$string['viewhomepage_loggedin'] = 'Als angemeldete Startseite anzeigen';
$string['viewmycourses'] = 'Meine Kurse anzeigen';
$string['viewpage'] = 'Anzeigen';
$string['visible'] = 'Sichtbar';
