<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Spanish language strings for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Acciones';
$string['addpage'] = 'Añadir página';
$string['allowguest'] = 'Permitir invitados';
$string['allowguest_help'] = 'Si está habilitado, los invitados no autenticados pueden ver esta página sin el permiso de ver.';
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
$string['homepageactive'] = 'La página de inicio del sitio usa una página del sitio.';
$string['homepagebadge'] = 'Página de inicio';
$string['homepagebadge_guest'] = 'Inicio (invitados)';
$string['homepagebadge_loggedin'] = 'Inicio (conectados)';
$string['homepagedeleteblocked'] = 'Cambiar los ajustes de páginas del sistema para eliminar';
$string['homepagedeleteerror'] = 'Esta página se usa como página de inicio del sitio o como página Mis cursos. Cambie los ajustes de Páginas del sitio antes de eliminarla.';
$string['homepagemissing'] = 'La sustitución de la página de inicio está activada, pero no hay una página de portada válida para invitados. Elija una página arriba o cree una en Gestionar páginas del sitio.';
$string['homepagepage'] = 'Portada para invitados';
$string['homepagepage_choose'] = 'Elegir una página…';
$string['homepagepage_help'] = 'Página del sitio mostrada a visitantes desconectados (e invitados) en /. Cree páginas en Páginas → Gestionar páginas del sitio si la lista está vacía.';
$string['homepagepage_loggedin'] = 'Portada al iniciar sesión';
$string['homepagepage_loggedin_help'] = 'Opcional. Página del sitio mostrada a usuarios conectados en Inicio del sitio. Elija «Igual que invitados» para reutilizar la página de invitados. Los usuarios cuya página de inicio predeterminada sea Tablero / Mis cursos siguen yendo allí primero.';
$string['homepagepage_sameasguest'] = 'Igual que invitados';
$string['managepages'] = 'Gestionar páginas del sitio';
$string['mycoursesactions'] = 'Acciones de Mis cursos';
$string['mycoursesactive'] = 'Mis cursos usa una página del sitio.';
$string['mycoursesbadge'] = 'Mis cursos';
$string['mycoursesmissing'] = 'La sustitución de Mis cursos está activada, pero no hay una página del sitio válida. Elija una página arriba o cree una en Gestionar páginas del sitio.';
$string['mycoursespage'] = 'Mis cursos';
$string['mycoursespage_desc'] = 'Sustituya la página Mis cursos de Moodle (/my/courses.php) por una página del sitio existente. Solo usuarios conectados. Cree primero la página en Gestionar páginas del sitio (puede incluir un widget de Cursos en PageTiler).';
$string['mycoursespage_select'] = 'Página Mis cursos';
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
$string['pagewidth_help'] = 'Limitado coincide con las páginas típicas de Moodle (ancho limitado de Boost). Completo usa toda la región de contenido principal — mejor para diseños anchos y de varias columnas.';
$string['pagewidth_limited'] = 'Limitado (predeterminado del tema)';
$string['pluginname'] = 'Páginas del sitio';
$string['privacy:metadata'] = 'El complemento Páginas del sitio almacena el contenido de páginas creado por administradores. No almacena datos personales de usuarios más allá del campo estándar usermodified.';
$string['sitehomepage'] = 'Página de inicio del sitio';
$string['sitehomepage_desc'] = 'Sustituya la página de inicio predeterminada de Moodle por páginas del sitio. Puede usar páginas distintas para visitantes y usuarios conectados. Cree primero las páginas en Gestionar páginas del sitio. Las redirecciones de Tablero / Mis cursos no cambian: los usuarios conectados solo ven la portada al iniciar sesión cuando el Sitio es su página de inicio, o mediante Inicio del sitio (/?redirect=0).';
$string['sitepages:manage'] = 'Gestionar páginas del sitio';
$string['sitepages:view'] = 'Ver páginas del sitio';
$string['slug'] = 'Slug de URL';
$string['slug_help'] = 'Nombre corto opcional de URL (letras, números, guiones). Las páginas están en /local/sitepages/view.php?slug=nombre. Con «URL amigables» activadas (y reescritura del servidor), también en /nombre.';
$string['useprettyurls'] = 'URL amigables de página (/slug)';
$string['useprettyurls_help'] = 'Cuando está habilitado, las páginas del sitio con slug usan /slug en lugar de /local/sitepages/view.php?slug=…. Requiere una regla de reescritura que mapee /slug a view.php. Déjelo desactivado si la reescritura no está configurada.';
$string['useonhomepage'] = 'Usar una página del sitio en la página de inicio';
$string['useonhomepage_help'] = 'Cuando está habilitado, el inicio del sitio de Moodle (/) muestra la(s) página(s) del sitio seleccionada(s) en lugar de la portada clásica. La página de invitados se hace visible para invitados automáticamente. Desactive para restaurar la página de inicio clásica de Moodle.';
$string['useonmycourses'] = 'Usar una página del sitio para Mis cursos';
$string['useonmycourses_help'] = 'Cuando está habilitado, Mis cursos muestra la página del sitio seleccionada en lugar de la vista general de cursos predeterminada. Desactive para restaurar la página clásica Mis cursos.';
$string['viewclassichomepage'] = 'Vista previa de la página de inicio clásica';
$string['viewclassicmycourses'] = 'Vista previa de Mis cursos clásico';
$string['viewhomepage'] = 'Ver como inicio de invitado';
$string['viewhomepage_loggedin'] = 'Ver como inicio conectado';
$string['viewmycourses'] = 'Ver Mis cursos';
$string['viewpage'] = 'Ver';
$string['visible'] = 'Visible';
