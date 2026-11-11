<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Italian language strings for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Azioni';
$string['addpage'] = 'Aggiungi pagina';
$string['allowguest'] = 'Consenti ospiti';
$string['allowguest_help'] = 'Se abilitato, gli ospiti non autenticati possono visualizzare questa pagina senza la capacità di visualizzazione.';
$string['content'] = 'Contenuto della pagina';
$string['deleteconfirm'] = 'Eliminare la pagina «{$a}»?';
$string['deletepage'] = 'Elimina pagina';
$string['edithomepage'] = 'Modifica impostazioni pagina';
$string['editmode'] = 'Modalità di modifica';
$string['editmode_editor'] = 'Editor HTML';
$string['editmode_pagetiler'] = 'PageTiler';
$string['editpage'] = 'Modifica pagina';
$string['editsettings'] = 'Modifica impostazioni';
$string['editwitheditor'] = 'Modifica con editor HTML';
$string['editwithpagetiler'] = 'Modifica con PageTiler';
$string['emptypage'] = 'Questa pagina non ha ancora contenuti.';
$string['eventpageviewed'] = 'Pagina del sito visualizzata';
$string['hideheader'] = 'Nascondi intestazione pagina';
$string['hideheader_help'] = 'Nasconde il titolo della pagina sopra il contenuto. La barra di navigazione del sito non viene rimossa da questa impostazione.';
$string['homepageactions'] = 'Azioni homepage';
$string['homepageactive'] = 'La homepage del sito usa una pagina del sito.';
$string['homepagebadge'] = 'Homepage';
$string['homepagebadge_guest'] = 'Homepage (ospiti)';
$string['homepagebadge_loggedin'] = 'Homepage (autenticati)';
$string['homepagedeleteblocked'] = 'Modifica le impostazioni delle pagine di sistema per eliminare';
$string['homepagedeleteerror'] = 'Questa pagina è usata come homepage del sito o pagina I miei corsi. Modifica le impostazioni delle Pagine del sito prima di eliminarla.';
$string['homepagemissing'] = 'La sostituzione della homepage è attiva, ma non è selezionata una pagina di frontespizio valida per gli ospiti. Scegli una pagina sopra oppure creane una in Gestisci pagine del sito.';
$string['homepagepage'] = 'Frontespizio per gli ospiti';
$string['homepagepage_choose'] = 'Scegli una pagina…';
$string['homepagepage_help'] = 'Pagina del sito mostrata ai visitatori non autenticati (e agli ospiti) su /. Crea pagine in Pagine → Gestisci pagine del sito se l’elenco è vuoto.';
$string['homepagepage_loggedin'] = 'Frontespizio quando autenticati';
$string['homepagepage_loggedin_help'] = 'Facoltativo. Pagina del sito mostrata agli utenti autenticati sulla home del sito. Scegli «Come per gli ospiti» per riutilizzare la pagina ospiti. Gli utenti la cui home predefinita è Dashboard / I miei corsi arrivano prima lì.';
$string['homepagepage_sameasguest'] = 'Come per gli ospiti';
$string['managepages'] = 'Gestisci pagine del sito';
$string['mycoursesactions'] = 'Azioni I miei corsi';
$string['mycoursesactive'] = 'I miei corsi usa una pagina del sito.';
$string['mycoursesbadge'] = 'I miei corsi';
$string['mycoursesmissing'] = 'La sostituzione di I miei corsi è attiva, ma non è selezionata una pagina del sito valida. Scegli una pagina sopra oppure creane una in Gestisci pagine del sito.';
$string['mycoursespage'] = 'I miei corsi';
$string['mycoursespage_desc'] = 'Sostituisci la pagina I miei corsi di Moodle (/my/courses.php) con una pagina del sito esistente. Solo utenti autenticati. Crea prima la pagina in Gestisci pagine del sito (puoi includere un widget Corsi in PageTiler).';
$string['mycoursespage_select'] = 'Pagina I miei corsi';
$string['mycoursespage_select_help'] = 'Quale pagina del sito mostrare su /my/courses.php.';
$string['nopages'] = 'Nessuna pagina del sito ancora.';
$string['pagedeleted'] = 'Pagina eliminata.';
$string['pagename'] = 'Nome pagina';
$string['pagename_help'] = 'Titolo mostrato sulla pagina e nell’elenco di amministrazione.';
$string['pagenotfound'] = 'Pagina non trovata.';
$string['pagenotvisible'] = 'Questa pagina non è disponibile.';
$string['pages'] = 'Pagine';
$string['pagetilerunavailable'] = 'Questa pagina è stata creata con PageTiler, ma il plugin attività PageTiler non è disponibile.';
$string['pageupdated'] = 'Pagina salvata.';
$string['pagewidth'] = 'Larghezza pagina';
$string['pagewidth_full'] = 'Larghezza intera';
$string['pagewidth_help'] = 'Limitata corrisponde alle pagine Moodle tipiche (larghezza limitata di Boost). Intera usa tutta l’area di contenuto principale — migliore per layout ampi e a più colonne.';
$string['pagewidth_limited'] = 'Limitata (predefinita del tema)';
$string['pluginname'] = 'Pagine del sito';
$string['privacy:metadata'] = 'Il plugin Pagine del sito memorizza il contenuto delle pagine creato dagli amministratori. Non memorizza dati personali degli utenti oltre al campo standard usermodified.';
$string['sitehomepage'] = 'Homepage del sito';
$string['sitehomepage_desc'] = 'Sostituisci la homepage Moodle predefinita con pagine del sito. Puoi usare pagine diverse per visitatori e utenti autenticati. Crea prima le pagine in Gestisci pagine del sito. I reindirizzamenti Dashboard / I miei corsi restano invariati — gli utenti autenticati vedono il frontespizio autenticato solo se Sito è la loro home, oppure tramite Home del sito (/?redirect=0).';
$string['sitepages:manage'] = 'Gestire le pagine del sito';
$string['sitepages:view'] = 'Visualizzare le pagine del sito';
$string['slug'] = 'Slug URL';
$string['slug_help'] = 'Nome URL breve facoltativo (lettere, numeri, trattini). Le pagine sono disponibili su /local/sitepages/view.php?slug=nome. Con «URL amichevoli» abilitate (e rewrite del server), anche su /nome.';
$string['useprettyurls'] = 'URL pagina amichevoli (/slug)';
$string['useprettyurls_help'] = 'Se abilitato, le pagine del sito con slug usano /slug invece di /local/sitepages/view.php?slug=…. Richiede una regola di rewrite che mappa /slug a view.php. Lascia disattivato se il rewrite non è configurato.';
$string['useonhomepage'] = 'Usa una pagina del sito sulla homepage';
$string['useonhomepage_help'] = 'Se abilitato, la home del sito Moodle (/) mostra la/e pagina/e del sito selezionata/e al posto del frontespizio classico. La pagina ospiti viene resa automaticamente visibile agli ospiti. Disattiva per ripristinare la homepage Moodle classica.';
$string['useonmycourses'] = 'Usa una pagina del sito per I miei corsi';
$string['useonmycourses_help'] = 'Se abilitato, I miei corsi mostra la pagina del sito selezionata al posto della panoramica corsi predefinita. Disattiva per ripristinare la pagina classica I miei corsi.';
$string['viewclassichomepage'] = 'Anteprima homepage classica';
$string['viewclassicmycourses'] = 'Anteprima I miei corsi classico';
$string['viewhomepage'] = 'Visualizza come home ospiti';
$string['viewhomepage_loggedin'] = 'Visualizza come home autenticati';
$string['viewmycourses'] = 'Visualizza I miei corsi';
$string['viewpage'] = 'Visualizza';
$string['visible'] = 'Visibile';
