<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Portuguese language strings for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Ações';
$string['addpage'] = 'Adicionar página';
$string['allowguest'] = 'Permitir convidados';
$string['allowguest_help'] = 'Se ativado, os convidados sem sessão iniciada podem ver esta página sem a capacidade de visualizar.';
$string['content'] = 'Conteúdo da página';
$string['deleteconfirm'] = 'Eliminar a página «{$a}»?';
$string['deletepage'] = 'Eliminar página';
$string['edithomepage'] = 'Editar definições da página';
$string['editmode'] = 'Modo de edição';
$string['editmode_editor'] = 'Editor HTML';
$string['editmode_pagetiler'] = 'PageTiler';
$string['editpage'] = 'Editar página';
$string['editsettings'] = 'Editar definições';
$string['editwitheditor'] = 'Editar com o editor HTML';
$string['editwithpagetiler'] = 'Editar com PageTiler';
$string['emptypage'] = 'Esta página ainda não tem conteúdo.';
$string['eventpageviewed'] = 'Página do site visualizada';
$string['hideheader'] = 'Ocultar cabeçalho da página';
$string['hideheader_help'] = 'Oculta o título da página acima do conteúdo. A barra de navegação do site não é removida por esta definição.';
$string['homepageactions'] = 'Ações da página inicial';
$string['homepageactive'] = 'A página inicial do site está a usar uma página do site.';
$string['homepagebadge'] = 'Página inicial';
$string['homepagebadge_guest'] = 'Início (convidados)';
$string['homepagebadge_loggedin'] = 'Início (autenticados)';
$string['homepagedeleteblocked'] = 'Alterar as definições das páginas do sistema para eliminar';
$string['homepagedeleteerror'] = 'Esta página é usada como página inicial do site ou página Os meus cursos. Altere as definições de Páginas do site antes de a eliminar.';
$string['homepagemissing'] = 'A substituição da página inicial está ativa, mas não está selecionada uma página de capa válida para convidados. Escolha uma página acima ou crie uma em Gerir páginas do site.';
$string['homepagepage'] = 'Capa para convidados';
$string['homepagepage_choose'] = 'Escolher uma página…';
$string['homepagepage_help'] = 'Página do site mostrada a visitantes sem sessão (e convidados) em /. Crie páginas em Páginas → Gerir páginas do site se a lista estiver vazia.';
$string['homepagepage_loggedin'] = 'Capa quando autenticado';
$string['homepagepage_loggedin_help'] = 'Opcional. Página do site mostrada a utilizadores autenticados no início do site. Escolha «Igual aos convidados» para reutilizar a página de convidados. Utilizadores cuja página inicial predefinida é Painel / Os meus cursos continuam a ir para aí primeiro.';
$string['homepagepage_sameasguest'] = 'Igual aos convidados';
$string['managepages'] = 'Gerir páginas do site';
$string['mycoursesactions'] = 'Ações Os meus cursos';
$string['mycoursesactive'] = 'Os meus cursos está a usar uma página do site.';
$string['mycoursesbadge'] = 'Os meus cursos';
$string['mycoursesmissing'] = 'A substituição de Os meus cursos está ativa, mas não está selecionada uma página do site válida. Escolha uma página acima ou crie uma em Gerir páginas do site.';
$string['mycoursespage'] = 'Os meus cursos';
$string['mycoursespage_desc'] = 'Substitua a página Os meus cursos do Moodle (/my/courses.php) por uma página do site existente. Apenas utilizadores autenticados. Crie primeiro a página em Gerir páginas do site (pode incluir um widget Cursos no PageTiler).';
$string['mycoursespage_select'] = 'Página Os meus cursos';
$string['mycoursespage_select_help'] = 'Qual página do site mostrar em /my/courses.php.';
$string['nopages'] = 'Ainda não há páginas do site.';
$string['pagedeleted'] = 'Página eliminada.';
$string['pagename'] = 'Nome da página';
$string['pagename_help'] = 'Título mostrado na página e na lista de administração.';
$string['pagenotfound'] = 'Página não encontrada.';
$string['pagenotvisible'] = 'Esta página não está disponível.';
$string['pages'] = 'Páginas';
$string['pagetilerunavailable'] = 'Esta página foi criada com o PageTiler, mas o plugin de atividade PageTiler não está disponível.';
$string['pageupdated'] = 'Página guardada.';
$string['pagewidth'] = 'Largura da página';
$string['pagewidth_full'] = 'Largura total';
$string['pagewidth_help'] = 'Limitada corresponde a páginas Moodle típicas (largura limitada do Boost). Total usa toda a região de conteúdo principal — melhor para layouts largos e de várias colunas.';
$string['pagewidth_limited'] = 'Limitada (predefinição do tema)';
$string['pluginname'] = 'Páginas do site';
$string['privacy:metadata'] = 'O plugin Páginas do site guarda o conteúdo das páginas criado por administradores. Não guarda dados pessoais de utilizadores além do campo padrão usermodified.';
$string['sitehomepage'] = 'Página inicial do site';
$string['sitehomepage_desc'] = 'Substitua a página inicial predefinida do Moodle por páginas do site. Pode usar páginas diferentes para visitantes e utilizadores autenticados. Crie primeiro as páginas em Gerir páginas do site. Os redirecionamentos Painel / Os meus cursos não mudam — utilizadores autenticados só veem a capa autenticada quando Site é a sua página inicial, ou via Início do site (/?redirect=0).';
$string['sitepages:manage'] = 'Gerir páginas do site';
$string['sitepages:view'] = 'Ver páginas do site';
$string['slug'] = 'Slug do URL';
$string['slug_help'] = 'Nome curto opcional de URL (letras, números, hífenes). As páginas estão em /local/sitepages/view.php?slug=nome. Com «URLs amigáveis» ativadas (e reescrita do servidor), também em /nome.';
$string['useprettyurls'] = 'URLs amigáveis de página (/slug)';
$string['useprettyurls_help'] = 'Quando ativado, as páginas do site com slug usam /slug em vez de /local/sitepages/view.php?slug=…. Requer uma regra de reescrita que mapeie /slug para view.php. Deixe desativado se a reescrita não estiver configurada.';
$string['useonhomepage'] = 'Usar uma página do site na página inicial';
$string['useonhomepage_help'] = 'Quando ativado, o início do site Moodle (/) mostra a(s) página(s) do site selecionada(s) em vez da capa clássica. A página de convidados fica automaticamente visível a convidados. Desative para restaurar a página inicial clássica do Moodle.';
$string['useonmycourses'] = 'Usar uma página do site para Os meus cursos';
$string['useonmycourses_help'] = 'Quando ativado, Os meus cursos mostra a página do site selecionada em vez da vista geral de cursos predefinida. Desative para restaurar a página clássica Os meus cursos.';
$string['viewclassichomepage'] = 'Pré-visualizar página inicial clássica';
$string['viewclassicmycourses'] = 'Pré-visualizar Os meus cursos clássico';
$string['viewhomepage'] = 'Ver como início de convidado';
$string['viewhomepage_loggedin'] = 'Ver como início autenticado';
$string['viewmycourses'] = 'Ver Os meus cursos';
$string['viewpage'] = 'Ver';
$string['visible'] = 'Visível';
