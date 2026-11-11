<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Brazilian Portuguese language strings for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['actions'] = 'Ações';
$string['addpage'] = 'Adicionar página';
$string['allowguest'] = 'Permitir visitantes';
$string['allowguest_help'] = 'Se ativado, visitantes desconectados podem ver esta página sem a capacidade de visualizar.';
$string['content'] = 'Conteúdo da página';
$string['deleteconfirm'] = 'Excluir a página «{$a}»?';
$string['deletepage'] = 'Excluir página';
$string['edithomepage'] = 'Editar configurações da página';
$string['editmode'] = 'Modo de edição';
$string['editmode_editor'] = 'Editor HTML';
$string['editmode_pagetiler'] = 'PageTiler';
$string['editpage'] = 'Editar página';
$string['editsettings'] = 'Editar configurações';
$string['editwitheditor'] = 'Editar com o editor HTML';
$string['editwithpagetiler'] = 'Editar com PageTiler';
$string['emptypage'] = 'Esta página ainda não tem conteúdo.';
$string['eventpageviewed'] = 'Página do site visualizada';
$string['hideheader'] = 'Ocultar cabeçalho da página';
$string['hideheader_help'] = 'Oculta o título da página acima do conteúdo. A barra de navegação do site não é removida por esta configuração.';
$string['homepageactions'] = 'Ações da página inicial';
$string['homepageactive'] = 'A página inicial do site está usando uma página do site.';
$string['homepagebadge'] = 'Página inicial';
$string['homepagebadge_guest'] = 'Início (visitantes)';
$string['homepagebadge_loggedin'] = 'Início (autenticados)';
$string['homepagedeleteblocked'] = 'Alterar as configurações das páginas do sistema para excluir';
$string['homepagedeleteerror'] = 'Esta página é usada como página inicial do site ou página Meus cursos. Altere as configurações de Páginas do site antes de excluí-la.';
$string['homepagemissing'] = 'A substituição da página inicial está ativa, mas nenhuma página de capa válida para visitantes está selecionada. Escolha uma página acima ou crie uma em Gerenciar páginas do site.';
$string['homepagepage'] = 'Capa para visitantes';
$string['homepagepage_choose'] = 'Escolher uma página…';
$string['homepagepage_help'] = 'Página do site mostrada a visitantes desconectados (e convidados) em /. Crie páginas em Páginas → Gerenciar páginas do site se a lista estiver vazia.';
$string['homepagepage_loggedin'] = 'Capa quando autenticado';
$string['homepagepage_loggedin_help'] = 'Opcional. Página do site mostrada a usuários autenticados na página inicial do site. Escolha «Igual aos visitantes» para reutilizar a página de visitantes. Usuários cuja página inicial padrão é Painel / Meus cursos ainda vão para lá primeiro.';
$string['homepagepage_sameasguest'] = 'Igual aos visitantes';
$string['managepages'] = 'Gerenciar páginas do site';
$string['mycoursesactions'] = 'Ações Meus cursos';
$string['mycoursesactive'] = 'Meus cursos está usando uma página do site.';
$string['mycoursesbadge'] = 'Meus cursos';
$string['mycoursesmissing'] = 'A substituição de Meus cursos está ativa, mas nenhuma página do site válida está selecionada. Escolha uma página acima ou crie uma em Gerenciar páginas do site.';
$string['mycoursespage'] = 'Meus cursos';
$string['mycoursespage_desc'] = 'Substitua a página Meus cursos do Moodle (/my/courses.php) por uma página do site existente. Somente usuários autenticados. Crie primeiro a página em Gerenciar páginas do site (você pode incluir um widget Cursos no PageTiler).';
$string['mycoursespage_select'] = 'Página Meus cursos';
$string['mycoursespage_select_help'] = 'Qual página do site mostrar em /my/courses.php.';
$string['nopages'] = 'Ainda não há páginas do site.';
$string['pagedeleted'] = 'Página excluída.';
$string['pagename'] = 'Nome da página';
$string['pagename_help'] = 'Título mostrado na página e na lista de administração.';
$string['pagenotfound'] = 'Página não encontrada.';
$string['pagenotvisible'] = 'Esta página não está disponível.';
$string['pages'] = 'Páginas';
$string['pagetilerunavailable'] = 'Esta página foi criada com o PageTiler, mas o plugin de atividade PageTiler não está disponível.';
$string['pageupdated'] = 'Página salva.';
$string['pagewidth'] = 'Largura da página';
$string['pagewidth_full'] = 'Largura total';
$string['pagewidth_help'] = 'Limitada corresponde a páginas Moodle típicas (largura limitada do Boost). Total usa toda a região de conteúdo principal — melhor para layouts largos e de várias colunas.';
$string['pagewidth_limited'] = 'Limitada (padrão do tema)';
$string['pluginname'] = 'Páginas do site';
$string['privacy:metadata'] = 'O plugin Páginas do site armazena o conteúdo das páginas criado por administradores. Não armazena dados pessoais de usuários além do campo padrão usermodified.';
$string['sitehomepage'] = 'Página inicial do site';
$string['sitehomepage_desc'] = 'Substitua a página inicial padrão do Moodle por páginas do site. Você pode usar páginas diferentes para visitantes e usuários autenticados. Crie primeiro as páginas em Gerenciar páginas do site. Os redirecionamentos Painel / Meus cursos não mudam — usuários autenticados só veem a capa autenticada quando Site é a página inicial deles, ou via Início do site (/?redirect=0).';
$string['sitepages:manage'] = 'Gerenciar páginas do site';
$string['sitepages:view'] = 'Ver páginas do site';
$string['slug'] = 'Slug da URL';
$string['slug_help'] = 'Nome curto opcional de URL (letras, números, hífens). As páginas estão em /local/sitepages/view.php?slug=nome. Com «URLs amigáveis» ativadas (e reescrita do servidor), também em /nome.';
$string['useprettyurls'] = 'URLs amigáveis de página (/slug)';
$string['useprettyurls_help'] = 'Quando ativado, as páginas do site com slug usam /slug em vez de /local/sitepages/view.php?slug=…. Requer uma regra de reescrita que mapeie /slug para view.php. Deixe desativado se a reescrita não estiver configurada.';
$string['useonhomepage'] = 'Usar uma página do site na página inicial';
$string['useonhomepage_help'] = 'Quando ativado, o início do site Moodle (/) mostra a(s) página(s) do site selecionada(s) em vez da capa clássica. A página de visitantes fica automaticamente visível a visitantes. Desative para restaurar a página inicial clássica do Moodle.';
$string['useonmycourses'] = 'Usar uma página do site para Meus cursos';
$string['useonmycourses_help'] = 'Quando ativado, Meus cursos mostra a página do site selecionada em vez da visão geral de cursos padrão. Desative para restaurar a página clássica Meus cursos.';
$string['viewclassichomepage'] = 'Visualizar página inicial clássica';
$string['viewclassicmycourses'] = 'Visualizar Meus cursos clássico';
$string['viewhomepage'] = 'Ver como início de visitante';
$string['viewhomepage_loggedin'] = 'Ver como início autenticado';
$string['viewmycourses'] = 'Ver Meus cursos';
$string['viewpage'] = 'Ver';
$string['visible'] = 'Visível';
