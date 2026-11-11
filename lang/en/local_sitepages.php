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
 * English language strings for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessheader'] = 'Access restrictions';
$string['actions'] = 'Actions';
$string['addpage'] = 'Add page';
$string['allowguest'] = 'Allow guests';
$string['allowguest_help'] = 'If enabled, logged-out guests can view this page without the view capability. Ignored when role or cohort restrictions are set (guests cannot satisfy those).';
$string['content'] = 'Page content';
$string['deleteconfirm'] = 'Delete page "{$a}"?';
$string['deletepage'] = 'Delete page';
$string['edithomepage'] = 'Edit page settings';
$string['editmode'] = 'Editing mode';
$string['editmode_editor'] = 'HTML editor';
$string['editmode_pagetiler'] = 'PageTiler';
$string['editpage'] = 'Edit page';
$string['editsettings'] = 'Edit settings';
$string['editwitheditor'] = 'Edit with HTML editor';
$string['editwithpagetiler'] = 'Edit with PageTiler';
$string['emptypage'] = 'This page has no content yet.';
$string['eventpageviewed'] = 'Site page viewed';
$string['hideheader'] = 'Hide page header';
$string['hideheader_help'] = 'Hides the page title heading above the content. The site navigation bar is not removed by this setting.';
$string['homepageactions'] = 'Homepage actions';
$string['homepageactive'] = 'Site homepage is using a Site page.';
$string['homepagebadge'] = 'Homepage';
$string['homepagebadge_guest'] = 'Homepage (guests)';
$string['homepagebadge_loggedin'] = 'Homepage (logged in)';
$string['homepagedeleteblocked'] = 'Change system page settings to delete';
$string['homepagedeleteerror'] = 'This page is used as the site homepage or My courses page. Change Site pages settings before deleting it.';
$string['homepagemissing'] = 'Homepage override is on, but no valid guest frontpage page is selected. Pick a page above, or create one under Manage site pages.';
$string['homepagepage'] = 'Frontpage for guests';
$string['homepagepage_choose'] = 'Choose a page…';
$string['homepagepage_help'] = 'Site page shown to logged-out visitors (and guests) at /. Create pages under Pages → Manage site pages if the list is empty.';
$string['homepagepage_loggedin'] = 'Frontpage when logged in';
$string['homepagepage_loggedin_help'] = 'Optional. Site page shown to logged-in users on Site home. Choose “Same as guests” to reuse the guest page. Users whose default home is Dashboard / My courses still land there first.';
$string['homepagepage_sameasguest'] = 'Same as guests';
$string['managepages'] = 'Manage site pages';
$string['mycoursesactions'] = 'My courses actions';
$string['mycoursesactive'] = 'My courses is using a Site page.';
$string['mycoursesbadge'] = 'My courses';
$string['mycoursesmissing'] = 'My courses override is on, but no valid Site page is selected. Pick a page above, or create one under Manage site pages.';
$string['mycoursespage'] = 'My courses';
$string['mycoursespage_desc'] = 'Replace Moodle’s My courses page (/my/courses.php) with an existing Site page. Logged-in users only. Create the page under Manage site pages first (you can include a Courses widget in PageTiler).';
$string['mycoursespage_select'] = 'My courses page';
$string['mycoursespage_select_help'] = 'Which Site page to show at /my/courses.php.';
$string['nopages'] = 'No site pages yet.';
$string['pagedeleted'] = 'Page deleted.';
$string['pagename'] = 'Page name';
$string['pagename_help'] = 'Title shown on the page and in the admin list.';
$string['pagenotfound'] = 'Page not found.';
$string['pagenotvisible'] = 'This page is not available.';
$string['pages'] = 'Pages';
$string['pagetilerunavailable'] = 'This page was built with PageTiler, but the PageTiler activity plugin is not available.';
$string['pageupdated'] = 'Page saved.';
$string['pagewidth'] = 'Page width';
$string['pagewidth_full'] = 'Full width';
$string['pagewidth_help'] = 'Limited matches typical Moodle pages (Boost limited width). Full uses the whole main content region — better for wide layouts and multi-column designs.';
$string['pagewidth_limited'] = 'Limited (theme default)';
$string['pluginname'] = 'Site pages';
$string['prettyurlprefix'] = 'Pretty URL prefix';
$string['prettyurlprefix_help'] = 'Optional path segment before the slug when Pretty page URLs are on. Leave empty for /welcome. Set to sites for /sites/welcome. Must match your web-server rewrite rule.';
$string['privacy:metadata'] = 'The Site pages plugin stores page content created by administrators. It does not store personal user data beyond the standard usermodified field.';
$string['requiredcohorts'] = 'Restrict to cohorts';
$string['requiredcohorts_help'] = 'If any cohorts are selected, the viewer must be a member of at least one of them. Leave empty for no cohort limit. Combined with role restrictions using AND (both must pass). Managers always have access.';
$string['requiredcohorts_none'] = 'No cohort restriction';
$string['requiredroles'] = 'Restrict to roles';
$string['requiredroles_help'] = 'If any roles are selected, the viewer must have at least one of them assigned (in any context). Leave empty for no role limit. Combined with cohort restrictions using AND. Managers always have access. Site-wide deny is also possible via the local/sitepages:view capability.';
$string['requiredroles_none'] = 'No role restriction';
$string['sitehomepage'] = 'Site homepage';
$string['sitehomepage_desc'] = 'Replace the default Moodle site home with Site pages. You can use different pages for visitors and logged-in users. Create pages under Manage site pages first. Dashboard / My courses redirects are unchanged — logged-in users only see the logged-in frontpage when Site is their home page, or via Site home (/?redirect=0).';
$string['sitepages:manage'] = 'Manage site pages';
$string['sitepages:view'] = 'View site pages';
$string['slug'] = 'URL slug';
$string['slug_help'] = 'Optional short URL name (letters, numbers, hyphens). Pages are available at /local/sitepages/view.php?slug=name. With “Pretty URLs” enabled (and web-server rewrite), they are also available at /name or /prefix/name when a prefix is configured.';
$string['useonhomepage'] = 'Use a site page on the homepage';
$string['useonhomepage_help'] = 'When enabled, Moodle’s site home (/) shows the selected Site page(s) instead of the classic frontpage. The guest page is made guest-visible automatically. Turn off to restore the classic Moodle homepage.';
$string['useonmycourses'] = 'Use a site page for My courses';
$string['useonmycourses_help'] = 'When enabled, My courses shows the selected Site page instead of the default course overview. Turn off to restore the classic My courses page.';
$string['useprettyurls'] = 'Pretty page URLs';
$string['useprettyurls_help'] = 'When enabled, site pages with a slug use a short path (/slug or /prefix/slug) instead of /local/sitepages/view.php?slug=…. Requires a matching web-server rewrite (Apache/Nginx examples are in the README and admin guide). Leave off unless rewrite is configured.';
$string['viewclassichomepage'] = 'Preview classic homepage';
$string['viewclassicmycourses'] = 'Preview classic My courses';
$string['viewhomepage'] = 'View as guest home';
$string['viewhomepage_loggedin'] = 'View as logged-in home';
$string['viewmycourses'] = 'View My courses';
$string['viewpage'] = 'View';
$string['visible'] = 'Visible';
$string['visible_help'] = 'Hidden pages are only available to users who can manage site pages.';
