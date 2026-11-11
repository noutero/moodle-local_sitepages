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
 * Italian language strings for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessheader'] = 'Restrizioni di accesso';
$string['actions'] = 'Azioni';
$string['addpage'] = 'Aggiungi pagina';
$string['allowguest'] = 'Consenti ospiti';
$string['allowguest_help'] = 'Se abilitato, gli ospiti non autenticati possono visualizzare questa pagina senza la capacità di visualizzazione. Ignorato se sono impostate restrizioni di ruolo o coorte (gli ospiti non le soddisfano).';
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
$string['homepagebadge_loggedin'] = 'Homepage (connessi)';
$string['homepagedeleteblocked'] = 'Modifica le impostazioni delle pagine di sistema per eliminare';
$string['homepagedeleteerror'] = 'Questa pagina è usata come homepage del sito o pagina I miei corsi. Modifica le impostazioni Pagine del sito prima di eliminarla.';
$string['homepagemissing'] = 'La sostituzione della homepage è attiva, ma non è selezionata una pagina valida per gli ospiti. Scegline una sopra o creala in Gestisci pagine del sito.';
$string['homepagepage'] = 'Frontpage per gli ospiti';
$string['homepagepage_choose'] = 'Scegli una pagina…';
$string['homepagepage_help'] = 'Pagina del sito mostrata ai visitatori disconnessi (e ospiti) su /. Crea pagine in Pagine → Gestisci pagine del sito se l’elenco è vuoto.';
$string['homepagepage_loggedin'] = 'Frontpage da connessi';
$string['homepagepage_loggedin_help'] = 'Facoltativo. Pagina del sito per utenti connessi sull’home del sito. Scegli «Come per gli ospiti» per riusare la pagina ospiti. Chi ha Dashboard / I miei corsi come home arriva lì prima.';
$string['homepagepage_sameasguest'] = 'Come per gli ospiti';
$string['managepages'] = 'Gestisci pagine del sito';
$string['mycoursesactions'] = 'Azioni I miei corsi';
$string['mycoursesactive'] = 'I miei corsi usa una pagina del sito.';
$string['mycoursesbadge'] = 'I miei corsi';
$string['mycoursesmissing'] = 'La sostituzione di I miei corsi è attiva, ma non è selezionata una pagina del sito valida. Scegline una sopra o creala in Gestisci pagine del sito.';
$string['mycoursespage'] = 'I miei corsi';
$string['mycoursespage_desc'] = 'Sostituisci la pagina I miei corsi di Moodle (/my/courses.php) con una pagina del sito esistente. Solo utenti connessi. Crea prima la pagina in Gestisci pagine del sito (puoi includere un widget Corsi in PageTiler).';
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
$string['pagewidth_help'] = 'Limitata corrisponde alle tipiche pagine Moodle (larghezza limitata Boost). Intera usa tutta l’area di contenuto principale — meglio per layout ampi e multi-colonna.';
$string['pagewidth_limited'] = 'Limitata (predefinito del tema)';
$string['pluginname'] = 'Pagine del sito';
$string['prettyurlprefix'] = 'Prefisso URL amichevole';
$string['prettyurlprefix_help'] = 'Segmento di percorso opzionale prima dello slug con URL amichevoli attive. Vuoto = /welcome. sites = /sites/welcome. Deve corrispondere alla regola di rewrite del server.';
$string['privacy:metadata'] = 'Il plugin Pagine del sito memorizza il contenuto delle pagine creato dagli amministratori. Non memorizza dati personali degli utenti oltre al campo standard usermodified.';
$string['requiredcohorts'] = 'Limita alle coorti';
$string['requiredcohorts_help'] = 'Se sono selezionate coorti, il visitatore deve appartenere ad almeno una. Vuoto = nessun limite di coorte. Combinato con i ruoli con AND. I manager hanno sempre accesso.';
$string['requiredcohorts_none'] = 'Nessuna restrizione di coorte';
$string['requiredroles'] = 'Limita ai ruoli';
$string['requiredroles_help'] = 'Se sono selezionati ruoli, il visitatore deve averne almeno uno (qualsiasi contesto). Vuoto = nessun limite di ruolo. Combinato con le coorti con AND. I manager hanno sempre accesso. Divieto a livello di sito anche via local/sitepages:view.';
$string['requiredroles_none'] = 'Nessuna restrizione di ruolo';
$string['sitehomepage'] = 'Homepage del sito';
$string['sitehomepage_desc'] = 'Sostituisci la homepage Moodle predefinita con Pagine del sito. Puoi usare pagine diverse per visitatori e utenti connessi. Crea prima le pagine in Gestisci pagine del sito. I redirect a Dashboard / I miei corsi restano invariati — gli utenti connessi vedono la frontpage connessa solo se Sito è la loro home, o via Home del sito (/?redirect=0).';
$string['sitepages:manage'] = 'Gestisci pagine del sito';
$string['sitepages:view'] = 'Visualizza pagine del sito';
$string['slug'] = 'Slug URL';
$string['slug_help'] = 'Nome URL breve facoltativo (lettere, numeri, trattini). Le pagine sono su /local/sitepages/view.php?slug=nome. Con URL amichevoli (e rewrite) anche su /nome o /prefisso/nome.';
$string['useonhomepage'] = 'Usa una pagina del sito sulla homepage';
$string['useonhomepage_help'] = 'Se abilitato, la home Moodle (/) mostra la/e pagina/e del sito selezionata/e al posto della frontpage classica. La pagina ospiti è resa visibile agli ospiti automaticamente. Disattiva per ripristinare la homepage classica.';
$string['useonmycourses'] = 'Usa una pagina del sito per I miei corsi';
$string['useonmycourses_help'] = 'Se abilitato, I miei corsi mostra la pagina del sito selezionata al posto della panoramica corsi predefinita. Disattiva per ripristinare I miei corsi classico.';
$string['useprettyurls'] = 'URL pagina amichevoli';
$string['useprettyurls_help'] = 'Se abilitato, le pagine con slug usano un percorso breve (/slug o /prefisso/slug) invece di /local/sitepages/view.php?slug=…. Richiede una regola di rewrite corrispondente (esempi Apache/Nginx in README e guida). Lascia disattivato finché il rewrite non è verificato.';
$string['viewclassichomepage'] = 'Anteprima homepage classica';
$string['viewclassicmycourses'] = 'Anteprima I miei corsi classico';
$string['viewhomepage'] = 'Vedi come home ospiti';
$string['viewhomepage_loggedin'] = 'Vedi come home connessi';
$string['viewmycourses'] = 'Vedi I miei corsi';
$string['viewpage'] = 'Visualizza';
$string['visible'] = 'Visibile';
$string['visible_help'] = 'Le pagine nascoste sono disponibili solo agli utenti che possono gestire le pagine del sito.';
