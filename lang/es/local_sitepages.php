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
 * Spanish language strings for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessheader'] = 'Restricciones de acceso';
$string['actions'] = 'Acciones';
$string['addpage'] = 'Añadir página';
$string['allowguest'] = 'Permitir invitados';
$string['allowguest_help'] = 'Si está habilitado, los invitados no autenticados pueden ver esta página sin el permiso de ver. Se ignora cuando hay restricciones de roles o cohortes (los invitados no las cumplen).';
$string['content'] = 'Contenido de la página';
$string['deleteconfirm'] = '¿Eliminar la página «{$a}»?';
$string['deletepage'] = 'Eliminar página';
$string['edithomepage'] = 'Editar ajustes de la página';
$string['editmode'] = 'Modo de edición';
$string['editmode_editor'] = 'Editor HTML';
$string['editmode_pagetiler'] = 'PageTiler';
$string['editpage'] = 'Editar página';
$string['editsettings'] = 'Editar ajustes';
$string['editwitheditor'] = 'Editar con el editor HTML';
$string['editwithpagetiler'] = 'Editar con PageTiler';
$string['emptypage'] = 'Esta página aún no tiene contenido.';
$string['eventpageviewed'] = 'Página del sitio vista';
$string['hideheader'] = 'Ocultar cabecera de la página';
$string['hideheader_help'] = 'Oculta el título de la página encima del contenido. La barra de navegación del sitio no se elimina con este ajuste.';
$string['homepageactions'] = 'Acciones de la página de inicio';
$string['homepageactive'] = 'La página de inicio del sitio usa una página de sitio.';
$string['homepagebadge'] = 'Inicio';
$string['homepagebadge_guest'] = 'Inicio (invitados)';
$string['homepagebadge_loggedin'] = 'Inicio (conectados)';
$string['homepagedeleteblocked'] = 'Cambie los ajustes de páginas del sistema para eliminar';
$string['homepagedeleteerror'] = 'Esta página se usa como inicio del sitio o como Mis cursos. Cambie los ajustes de Páginas del sitio antes de eliminarla.';
$string['homepagemissing'] = 'La sustitución de la página de inicio está activa, pero no hay una página válida para invitados. Elija una arriba o créela en Administrar páginas del sitio.';
$string['homepagepage'] = 'Portada para invitados';
$string['homepagepage_choose'] = 'Elegir una página…';
$string['homepagepage_help'] = 'Página del sitio mostrada a visitantes desconectados (e invitados) en /. Cree páginas en Páginas → Administrar páginas del sitio si la lista está vacía.';
$string['homepagepage_loggedin'] = 'Portada al iniciar sesión';
$string['homepagepage_loggedin_help'] = 'Opcional. Página del sitio para usuarios conectados en el inicio del sitio. Elija «Igual que invitados» para reutilizar la de invitados. Quienes tengan Panel / Mis cursos como inicio siguen yendo allí primero.';
$string['homepagepage_sameasguest'] = 'Igual que invitados';
$string['managepages'] = 'Administrar páginas del sitio';
$string['mycoursesactions'] = 'Acciones de Mis cursos';
$string['mycoursesactive'] = 'Mis cursos usa una página del sitio.';
$string['mycoursesbadge'] = 'Mis cursos';
$string['mycoursesmissing'] = 'La sustitución de Mis cursos está activa, pero no hay una página del sitio válida. Elija una arriba o créela en Administrar páginas del sitio.';
$string['mycoursespage'] = 'Mis cursos';
$string['mycoursespage_desc'] = 'Sustituya la página Mis cursos de Moodle (/my/courses.php) por una página del sitio existente. Solo usuarios conectados. Cree la página primero en Administrar páginas del sitio (puede incluir un widget de cursos en PageTiler).';
$string['mycoursespage_select'] = 'Página de Mis cursos';
$string['mycoursespage_select_help'] = 'Qué página del sitio mostrar en /my/courses.php.';
$string['nopages'] = 'Aún no hay páginas del sitio.';
$string['pagedeleted'] = 'Página eliminada.';
$string['pagename'] = 'Nombre de la página';
$string['pagename_help'] = 'Título mostrado en la página y en la lista de administración.';
$string['pagenotfound'] = 'Página no encontrada.';
$string['pagenotvisible'] = 'Esta página no está disponible.';
$string['pages'] = 'Páginas';
$string['pagetilerunavailable'] = 'Esta página se creó con PageTiler, pero el complemento de actividad PageTiler no está disponible.';
$string['pageupdated'] = 'Página guardada.';
$string['pagewidth'] = 'Ancho de página';
$string['pagewidth_full'] = 'Ancho completo';
$string['pagewidth_help'] = 'Limitado coincide con las páginas típicas de Moodle (ancho limitado en Boost). Completo usa toda la región de contenido principal — mejor para diseños anchos y de varias columnas.';
$string['pagewidth_limited'] = 'Limitado (predeterminado del tema)';
$string['pluginname'] = 'Páginas del sitio';
$string['prettyurlprefix'] = 'Prefijo de URL amigable';
$string['prettyurlprefix_help'] = 'Segmento de ruta opcional antes del slug cuando las URL amigables están activas. Vacío = /welcome. sites = /sites/welcome. Debe coincidir con la regla de reescritura del servidor.';
$string['privacy:metadata'] = 'El complemento Páginas del sitio almacena el contenido de páginas creado por administradores. No almacena datos personales de usuarios más allá del campo estándar usermodified.';
$string['requiredcohorts'] = 'Restringir a cohortes';
$string['requiredcohorts_help'] = 'Si se seleccionan cohortes, el visitante debe pertenecer al menos a una. Vacío = sin límite de cohortes. Con restricciones de roles se combina con AND. Los gestores siempre tienen acceso.';
$string['requiredcohorts_none'] = 'Sin restricción de cohortes';
$string['requiredroles'] = 'Restringir a roles';
$string['requiredroles_help'] = 'Si se seleccionan roles, el visitante debe tener al menos uno (en cualquier contexto). Vacío = sin límite de roles. Con cohortes se combina con AND. Los gestores siempre tienen acceso. También se puede denegar en todo el sitio con local/sitepages:view.';
$string['requiredroles_none'] = 'Sin restricción de roles';
$string['sitehomepage'] = 'Página de inicio del sitio';
$string['sitehomepage_desc'] = 'Sustituya la página de inicio predeterminada de Moodle por Páginas del sitio. Puede usar páginas distintas para visitantes y usuarios conectados. Cree páginas primero en Administrar páginas del sitio. Las redirecciones a Panel / Mis cursos no cambian — los usuarios conectados solo ven la portada conectada si Sitio es su inicio, o vía Inicio del sitio (/?redirect=0).';
$string['sitepages:manage'] = 'Administrar páginas del sitio';
$string['sitepages:view'] = 'Ver páginas del sitio';
$string['slug'] = 'Slug de URL';
$string['slug_help'] = 'Nombre corto de URL opcional (letras, números, guiones). Las páginas están en /local/sitepages/view.php?slug=nombre. Con URL amigables (y reescritura) también en /nombre o /prefijo/nombre.';
$string['useonhomepage'] = 'Usar una página del sitio en la página de inicio';
$string['useonhomepage_help'] = 'Si está habilitado, el inicio de Moodle (/) muestra la(s) página(s) del sitio seleccionada(s) en lugar de la portada clásica. La página de invitados se hace visible para invitados automáticamente. Desactívelo para restaurar el inicio clásico.';
$string['useonmycourses'] = 'Usar una página del sitio para Mis cursos';
$string['useonmycourses_help'] = 'Si está habilitado, Mis cursos muestra la página del sitio seleccionada en lugar del resumen de cursos predeterminado. Desactívelo para restaurar Mis cursos clásico.';
$string['useprettyurls'] = 'URL amigables de página';
$string['useprettyurls_help'] = 'Cuando está habilitado, las páginas con slug usan una ruta corta (/slug o /prefijo/slug) en lugar de /local/sitepages/view.php?slug=…. Requiere una reescritura coincidente (ejemplos Apache/Nginx en el README y la guía). Déjelo desactivado hasta verificar la reescritura.';
$string['viewclassichomepage'] = 'Vista previa del inicio clásico';
$string['viewclassicmycourses'] = 'Vista previa de Mis cursos clásico';
$string['viewhomepage'] = 'Ver como inicio de invitados';
$string['viewhomepage_loggedin'] = 'Ver como inicio conectado';
$string['viewmycourses'] = 'Ver Mis cursos';
$string['viewpage'] = 'Ver';
$string['visible'] = 'Visible';
$string['visible_help'] = 'Las páginas ocultas solo están disponibles para usuarios que pueden administrar páginas del sitio.';
