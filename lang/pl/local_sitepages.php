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
 * Polish language strings for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessheader'] = 'Ograniczenia dostępu';
$string['actions'] = 'Akcje';
$string['addpage'] = 'Dodaj stronę';
$string['allowguest'] = 'Zezwól gościom';
$string['allowguest_help'] = 'Jeśli włączone, wylogowani goście mogą przeglądać tę stronę bez uprawnienia do przeglądania. Ignorowane, gdy ustawiono ograniczenia ról lub kohort (goście ich nie spełniają).';
$string['content'] = 'Treść strony';
$string['deleteconfirm'] = 'Usunąć stronę „{$a}”?';
$string['deletepage'] = 'Usuń stronę';
$string['edithomepage'] = 'Edytuj ustawienia strony';
$string['editmode'] = 'Tryb edycji';
$string['editmode_editor'] = 'Edytor HTML';
$string['editmode_pagetiler'] = 'PageTiler';
$string['editpage'] = 'Edytuj stronę';
$string['editsettings'] = 'Edytuj ustawienia';
$string['editwitheditor'] = 'Edytuj w edytorze HTML';
$string['editwithpagetiler'] = 'Edytuj w PageTiler';
$string['emptypage'] = 'Ta strona nie ma jeszcze treści.';
$string['eventpageviewed'] = 'Wyświetlono stronę witryny';
$string['hideheader'] = 'Ukryj nagłówek strony';
$string['hideheader_help'] = 'Ukrywa tytuł strony nad treścią. Pasek nawigacji witryny nie jest usuwany przez to ustawienie.';
$string['homepageactions'] = 'Akcje strony głównej';
$string['homepageactive'] = 'Strona główna witryny używa strony witryny.';
$string['homepagebadge'] = 'Strona główna';
$string['homepagebadge_guest'] = 'Strona główna (goście)';
$string['homepagebadge_loggedin'] = 'Strona główna (zalogowani)';
$string['homepagedeleteblocked'] = 'Zmień ustawienia stron systemu, aby usunąć';
$string['homepagedeleteerror'] = 'Ta strona jest używana jako strona główna witryny lub strona Moje kursy. Zmień ustawienia Stron witryny przed jej usunięciem.';
$string['homepagemissing'] = 'Nadpisanie strony głównej jest włączone, ale nie wybrano prawidłowej strony startowej dla gości. Wybierz stronę powyżej lub utwórz ją w Zarządzaj stronami witryny.';
$string['homepagepage'] = 'Strona startowa dla gości';
$string['homepagepage_choose'] = 'Wybierz stronę…';
$string['homepagepage_help'] = 'Strona witryny wyświetlana wylogowanym odwiedzającym (i gościom) pod /. Twórz strony w Strony → Zarządzaj stronami witryny, jeśli lista jest pusta.';
$string['homepagepage_loggedin'] = 'Strona startowa po zalogowaniu';
$string['homepagepage_loggedin_help'] = 'Opcjonalne. Strona witryny pokazywana zalogowanym użytkownikom na stronie głównej witryny. Wybierz „Tak samo jak dla gości”, aby użyć strony gości. Użytkownicy z domyślnym domem Pulpit / Moje kursy nadal trafiają tam najpierw.';
$string['homepagepage_sameasguest'] = 'Tak samo jak dla gości';
$string['managepages'] = 'Zarządzaj stronami witryny';
$string['mycoursesactions'] = 'Akcje Moje kursy';
$string['mycoursesactive'] = 'Moje kursy używają strony witryny.';
$string['mycoursesbadge'] = 'Moje kursy';
$string['mycoursesmissing'] = 'Nadpisanie Moje kursy jest włączone, ale nie wybrano prawidłowej strony witryny. Wybierz stronę powyżej lub utwórz ją w Zarządzaj stronami witryny.';
$string['mycoursespage'] = 'Moje kursy';
$string['mycoursespage_desc'] = 'Zastąp stronę Moje kursy Moodle (/my/courses.php) istniejącą stroną witryny. Tylko dla zalogowanych użytkowników. Najpierw utwórz stronę w Zarządzaj stronami witryny (możesz dodać widżet Kursy w PageTiler).';
$string['mycoursespage_select'] = 'Strona Moje kursy';
$string['mycoursespage_select_help'] = 'Która strona witryny ma być pokazywana pod /my/courses.php.';
$string['nopages'] = 'Nie ma jeszcze stron witryny.';
$string['pagedeleted'] = 'Strona usunięta.';
$string['pagename'] = 'Nazwa strony';
$string['pagename_help'] = 'Tytuł wyświetlany na stronie i na liście administracyjnej.';
$string['pagenotfound'] = 'Nie znaleziono strony.';
$string['pagenotvisible'] = 'Ta strona jest niedostępna.';
$string['pages'] = 'Strony';
$string['pagetilerunavailable'] = 'Ta strona została zbudowana w PageTiler, ale wtyczka aktywności PageTiler jest niedostępna.';
$string['pageupdated'] = 'Strona zapisana.';
$string['pagewidth'] = 'Szerokość strony';
$string['pagewidth_full'] = 'Pełna szerokość';
$string['pagewidth_help'] = 'Ograniczona odpowiada typowym stronom Moodle (ograniczona szerokość w Boost). Pełna wykorzystuje cały główny obszar treści — lepsza do szerokich układów i wielu kolumn.';
$string['pagewidth_limited'] = 'Ograniczona (domyślna motywu)';
$string['pluginname'] = 'Strony witryny';
$string['prettyurlprefix'] = 'Prefiks ładnego URL';
$string['prettyurlprefix_help'] = 'Opcjonalny segment ścieżki przed slugiem, gdy włączone są ładne URL. Puste = /welcome. Wartość sites = /sites/welcome. Musi zgadzać się z regułą przepisywania serwera.';
$string['privacy:metadata'] = 'Wtyczka Strony witryny przechowuje treść stron utworzonych przez administratorów. Nie przechowuje danych osobowych użytkowników poza standardowym polem usermodified.';
$string['requiredcohorts'] = 'Ogranicz do kohort';
$string['requiredcohorts_help'] = 'Jeśli wybrano kohorty, użytkownik musi należeć do co najmniej jednej z nich. Puste = bez limitu kohort. Z ograniczeniem ról działa jako AND (oba muszą przejść). Zarządzający zawsze mają dostęp.';
$string['requiredcohorts_none'] = 'Bez ograniczenia kohort';
$string['requiredroles'] = 'Ogranicz do ról';
$string['requiredroles_help'] = 'Jeśli wybrano role, użytkownik musi mieć co najmniej jedną z nich (w dowolnym kontekście). Puste = bez limitu ról. Z ograniczeniem kohort działa jako AND. Zarządzający zawsze mają dostęp. Odmowa dla całej witryny jest też możliwa przez uprawnienie local/sitepages:view.';
$string['requiredroles_none'] = 'Bez ograniczenia ról';
$string['sitehomepage'] = 'Strona główna witryny';
$string['sitehomepage_desc'] = 'Zastąp domyślną stronę główną Moodle stronami witryny. Możesz użyć różnych stron dla odwiedzających i zalogowanych użytkowników. Najpierw utwórz strony w Zarządzaj stronami witryny. Przekierowania Pulpit / Moje kursy pozostają bez zmian — zalogowani użytkownicy widzą stronę startową po zalogowaniu tylko gdy Witryna jest ich stroną główną lub przez Strona główna witryny (/?redirect=0).';
$string['sitepages:manage'] = 'Zarządzaj stronami witryny';
$string['sitepages:view'] = 'Zobacz strony witryny';
$string['slug'] = 'Slug URL';
$string['slug_help'] = 'Opcjonalna krótka nazwa URL (litery, cyfry, myślniki). Strony są dostępne pod /local/sitepages/view.php?slug=nazwa. Przy włączonych „ładnych URL” (i regule przepisywania) także pod /nazwa lub /prefiks/nazwa.';
$string['useonhomepage'] = 'Użyj strony witryny jako strony głównej';
$string['useonhomepage_help'] = 'Gdy włączone, strona główna Moodle (/) pokazuje wybrane strony witryny zamiast klasycznej strony startowej. Strona gości jest automatycznie udostępniana gościom. Wyłącz, aby przywrócić klasyczną stronę główną Moodle.';
$string['useonmycourses'] = 'Użyj strony witryny dla Moje kursy';
$string['useonmycourses_help'] = 'Gdy włączone, Moje kursy pokazuje wybraną stronę witryny zamiast domyślnego przeglądu kursów. Wyłącz, aby przywrócić klasyczną stronę Moje kursy.';
$string['useprettyurls'] = 'Ładne adresy URL stron';
$string['useprettyurls_help'] = 'Gdy włączone, strony ze slugiem używają krótkiej ścieżki (/slug lub /prefiks/slug) zamiast /local/sitepages/view.php?slug=…. Wymaga pasującej reguły przepisywania (przykłady w README i przewodniku). Pozostaw wyłączone, dopóki przepisywanie nie działa.';
$string['viewclassichomepage'] = 'Podgląd klasycznej strony głównej';
$string['viewclassicmycourses'] = 'Podgląd klasycznych Moje kursy';
$string['viewhomepage'] = 'Zobacz jako strona główna gościa';
$string['viewhomepage_loggedin'] = 'Zobacz jako strona główna zalogowanego';
$string['viewmycourses'] = 'Zobacz Moje kursy';
$string['viewpage'] = 'Zobacz';
$string['visible'] = 'Widoczna';
$string['visible_help'] = 'Ukryte strony są dostępne tylko dla użytkowników z uprawnieniem do zarządzania stronami witryny.';
