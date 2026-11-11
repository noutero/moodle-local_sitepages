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
 * French language strings for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessheader'] = 'Restrictions d’accès';
$string['actions'] = 'Actions';
$string['addpage'] = 'Ajouter une page';
$string['allowguest'] = 'Autoriser les invités';
$string['allowguest_help'] = 'Si activé, les invités non connectés peuvent consulter cette page sans la capacité de consultation. Ignoré si des restrictions de rôles ou de cohortes sont définies (les invités ne les satisfont pas).';
$string['content'] = 'Contenu de la page';
$string['deleteconfirm'] = 'Supprimer la page « {$a} » ?';
$string['deletepage'] = 'Supprimer la page';
$string['edithomepage'] = 'Modifier les paramètres de la page';
$string['editmode'] = 'Mode d’édition';
$string['editmode_editor'] = 'Éditeur HTML';
$string['editmode_pagetiler'] = 'PageTiler';
$string['editpage'] = 'Modifier la page';
$string['editsettings'] = 'Modifier les paramètres';
$string['editwitheditor'] = 'Modifier avec l’éditeur HTML';
$string['editwithpagetiler'] = 'Modifier avec PageTiler';
$string['emptypage'] = 'Cette page n’a pas encore de contenu.';
$string['eventpageviewed'] = 'Page de site consultée';
$string['hideheader'] = 'Masquer l’en-tête de page';
$string['hideheader_help'] = 'Masque le titre de la page au-dessus du contenu. La barre de navigation du site n’est pas retirée par ce réglage.';
$string['homepageactions'] = 'Actions de la page d’accueil';
$string['homepageactive'] = 'La page d’accueil du site utilise une page de site.';
$string['homepagebadge'] = 'Accueil';
$string['homepagebadge_guest'] = 'Accueil (invités)';
$string['homepagebadge_loggedin'] = 'Accueil (connectés)';
$string['homepagedeleteblocked'] = 'Modifier les paramètres des pages système pour supprimer';
$string['homepagedeleteerror'] = 'Cette page est utilisée comme page d’accueil du site ou page Mes cours. Modifiez les paramètres Pages du site avant de la supprimer.';
$string['homepagemissing'] = 'Le remplacement de la page d’accueil est activé, mais aucune page valide pour les invités n’est sélectionnée. Choisissez une page ci-dessus ou créez-en une sous Gérer les pages du site.';
$string['homepagepage'] = 'Page d’accueil pour les invités';
$string['homepagepage_choose'] = 'Choisir une page…';
$string['homepagepage_help'] = 'Page du site affichée aux visiteurs déconnectés (et invités) sur /. Créez des pages sous Pages → Gérer les pages du site si la liste est vide.';
$string['homepagepage_loggedin'] = 'Page d’accueil une fois connecté';
$string['homepagepage_loggedin_help'] = 'Facultatif. Page du site pour les utilisateurs connectés sur l’accueil du site. Choisissez « Identique aux invités » pour réutiliser la page invités. Les utilisateurs dont l’accueil par défaut est Tableau de bord / Mes cours y arrivent d’abord.';
$string['homepagepage_sameasguest'] = 'Identique aux invités';
$string['managepages'] = 'Gérer les pages du site';
$string['mycoursesactions'] = 'Actions Mes cours';
$string['mycoursesactive'] = 'Mes cours utilise une page du site.';
$string['mycoursesbadge'] = 'Mes cours';
$string['mycoursesmissing'] = 'Le remplacement de Mes cours est activé, mais aucune page du site valide n’est sélectionnée. Choisissez une page ci-dessus ou créez-en une sous Gérer les pages du site.';
$string['mycoursespage'] = 'Mes cours';
$string['mycoursespage_desc'] = 'Remplacez la page Mes cours de Moodle (/my/courses.php) par une page du site existante. Utilisateurs connectés uniquement. Créez d’abord la page sous Gérer les pages du site (vous pouvez inclure un widget Cours dans PageTiler).';
$string['mycoursespage_select'] = 'Page Mes cours';
$string['mycoursespage_select_help'] = 'Quelle page du site afficher sur /my/courses.php.';
$string['nopages'] = 'Pas encore de pages du site.';
$string['pagedeleted'] = 'Page supprimée.';
$string['pagename'] = 'Nom de la page';
$string['pagename_help'] = 'Titre affiché sur la page et dans la liste d’administration.';
$string['pagenotfound'] = 'Page introuvable.';
$string['pagenotvisible'] = 'Cette page n’est pas disponible.';
$string['pages'] = 'Pages';
$string['pagetilerunavailable'] = 'Cette page a été créée avec PageTiler, mais le plugin d’activité PageTiler n’est pas disponible.';
$string['pageupdated'] = 'Page enregistrée.';
$string['pagewidth'] = 'Largeur de page';
$string['pagewidth_full'] = 'Pleine largeur';
$string['pagewidth_help'] = 'Limitée correspond aux pages Moodle typiques (largeur limitée Boost). Pleine utilise toute la région de contenu principal — mieux pour les mises en page larges et multi-colonnes.';
$string['pagewidth_limited'] = 'Limitée (thème par défaut)';
$string['pluginname'] = 'Pages du site';
$string['prettyurlprefix'] = 'Préfixe d’URL jolie';
$string['prettyurlprefix_help'] = 'Segment de chemin optionnel avant le slug lorsque les URL jolies sont activées. Vide = /welcome. sites = /sites/welcome. Doit correspondre à la règle de réécriture du serveur.';
$string['privacy:metadata'] = 'Le plugin Pages du site stocke le contenu des pages créé par les administrateurs. Il ne stocke pas de données personnelles au-delà du champ standard usermodified.';
$string['requiredcohorts'] = 'Restreindre aux cohortes';
$string['requiredcohorts_help'] = 'Si des cohortes sont sélectionnées, le visiteur doit appartenir à au moins une. Vide = pas de limite de cohorte. Combiné aux rôles avec AND. Les gestionnaires ont toujours accès.';
$string['requiredcohorts_none'] = 'Pas de restriction de cohorte';
$string['requiredroles'] = 'Restreindre aux rôles';
$string['requiredroles_help'] = 'Si des rôles sont sélectionnés, le visiteur doit en avoir au moins un (tout contexte). Vide = pas de limite de rôle. Combiné aux cohortes avec AND. Les gestionnaires ont toujours accès. Refus global aussi possible via local/sitepages:view.';
$string['requiredroles_none'] = 'Pas de restriction de rôle';
$string['sitehomepage'] = 'Page d’accueil du site';
$string['sitehomepage_desc'] = 'Remplacez la page d’accueil Moodle par défaut par Pages du site. Vous pouvez utiliser des pages différentes pour visiteurs et utilisateurs connectés. Créez d’abord les pages sous Gérer les pages du site. Les redirections Tableau de bord / Mes cours sont inchangées — les utilisateurs connectés ne voient la page connectée que si Site est leur accueil, ou via Accueil du site (/?redirect=0).';
$string['sitepages:manage'] = 'Gérer les pages du site';
$string['sitepages:view'] = 'Voir les pages du site';
$string['slug'] = 'Slug d’URL';
$string['slug_help'] = 'Nom d’URL court facultatif (lettres, chiffres, tirets). Pages disponibles sur /local/sitepages/view.php?slug=nom. Avec URL jolies (et réécriture) aussi sur /nom ou /préfixe/nom.';
$string['useonhomepage'] = 'Utiliser une page du site sur la page d’accueil';
$string['useonhomepage_help'] = 'Lorsque c’est activé, l’accueil Moodle (/) affiche la ou les pages du site sélectionnées au lieu de la page classique. La page invités est rendue visible aux invités automatiquement. Désactivez pour restaurer l’accueil classique.';
$string['useonmycourses'] = 'Utiliser une page du site pour Mes cours';
$string['useonmycourses_help'] = 'Lorsque c’est activé, Mes cours affiche la page du site sélectionnée au lieu de l’aperçu des cours. Désactivez pour restaurer Mes cours classique.';
$string['useprettyurls'] = 'URL de page jolies';
$string['useprettyurls_help'] = 'Lorsque c’est activé, les pages avec slug utilisent un chemin court (/slug ou /préfixe/slug) au lieu de /local/sitepages/view.php?slug=…. Nécessite une réécriture correspondante (exemples Apache/Nginx dans le README et le guide). Laissez désactivé jusqu’à vérification de la réécriture.';
$string['viewclassichomepage'] = 'Aperçu de l’accueil classique';
$string['viewclassicmycourses'] = 'Aperçu de Mes cours classique';
$string['viewhomepage'] = 'Voir comme accueil invité';
$string['viewhomepage_loggedin'] = 'Voir comme accueil connecté';
$string['viewmycourses'] = 'Voir Mes cours';
$string['viewpage'] = 'Voir';
$string['visible'] = 'Visible';
$string['visible_help'] = 'Les pages masquées ne sont disponibles que pour les utilisateurs pouvant gérer les pages du site.';
