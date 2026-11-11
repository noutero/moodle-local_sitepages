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
 * Brazilian Portuguese language strings for local_sitepages.
 *
 * @package    local_sitepages
 * @copyright  2026 Bartłomiej Ścibior
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['accessheader'] = 'Restrições de acesso';
$string['actions'] = 'Ações';
$string['addpage'] = 'Adicionar página';
$string['allowguest'] = 'Permitir visitantes';
$string['allowguest_help'] = 'Se ativado, visitantes desconectados podem ver esta página sem a capacidade de visualizar. Ignorado quando há restrições de papéis ou coortes (visitantes não as atendem).';
$string['content'] = 'Conteúdo da página';
$string['deleteconfirm'] = 'Excluir a página "{$a}"?';
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
$string['homepagebadge'] = 'Início';
$string['homepagebadge_guest'] = 'Início (visitantes)';
$string['homepagebadge_loggedin'] = 'Início (conectados)';
$string['homepagedeleteblocked'] = 'Altere as configurações de páginas do sistema para excluir';
$string['homepagedeleteerror'] = 'Esta página é usada como página inicial do site ou Meus cursos. Altere as configurações de Páginas do site antes de excluí-la.';
$string['homepagemissing'] = 'A substituição da página inicial está ativa, mas não há uma página válida para visitantes. Escolha uma acima ou crie em Gerenciar páginas do site.';
$string['homepagepage'] = 'Página inicial para visitantes';
$string['homepagepage_choose'] = 'Escolher uma página…';
$string['homepagepage_help'] = 'Página do site mostrada a visitantes desconectados (e convidados) em /. Crie páginas em Páginas → Gerenciar páginas do site se a lista estiver vazia.';
$string['homepagepage_loggedin'] = 'Página inicial quando conectado';
$string['homepagepage_loggedin_help'] = 'Opcional. Página do site para usuários conectados no início do site. Escolha "Igual aos visitantes" para reutilizar a dos visitantes. Usuários com Painel / Meus cursos como início ainda chegam lá primeiro.';
$string['homepagepage_sameasguest'] = 'Igual aos visitantes';
$string['managepages'] = 'Gerenciar páginas do site';
$string['mycoursesactions'] = 'Ações Meus cursos';
$string['mycoursesactive'] = 'Meus cursos está usando uma página do site.';
$string['mycoursesbadge'] = 'Meus cursos';
$string['mycoursesmissing'] = 'A substituição de Meus cursos está ativa, mas não há uma página do site válida. Escolha uma acima ou crie em Gerenciar páginas do site.';
$string['mycoursespage'] = 'Meus cursos';
$string['mycoursespage_desc'] = 'Substitua a página Meus cursos do Moodle (/my/courses.php) por uma página do site existente. Apenas usuários conectados. Crie primeiro a página em Gerenciar páginas do site (você pode incluir um widget de Cursos no PageTiler).';
$string['mycoursespage_select'] = 'Página Meus cursos';
$string['mycoursespage_select_help'] = 'Qual página do site mostrar em /my/courses.php.';
$string['nopages'] = 'Ainda não há páginas do site.';
$string['pagedeleted'] = 'Página excluída.';
$string['pagename'] = 'Nome da página';
$string['pagename_help'] = 'Título mostrado na página e na lista de administração.';
$string['pagenotfound'] = 'Página não encontrada.';
$string['pagenotvisible'] = 'Esta página não está disponível.';
$string['pages'] = 'Páginas';
$string['pagetilerunavailable'] = 'Esta página foi criada com PageTiler, mas o plugin de atividade PageTiler não está disponível.';
$string['pageupdated'] = 'Página salva.';
$string['pagewidth'] = 'Largura da página';
$string['pagewidth_full'] = 'Largura total';
$string['pagewidth_help'] = 'Limitada corresponde às páginas típicas do Moodle (largura limitada no Boost). Total usa toda a região de conteúdo principal — melhor para layouts largos e multi-coluna.';
$string['pagewidth_limited'] = 'Limitada (padrão do tema)';
$string['pluginname'] = 'Páginas do site';
$string['prettyurlprefix'] = 'Prefixo de URL amigável';
$string['prettyurlprefix_help'] = 'Segmento de caminho opcional antes do slug com URLs amigáveis ativas. Vazio = /welcome. sites = /sites/welcome. Deve coincidir com a regra de reescrita do servidor.';
$string['privacy:metadata'] = 'O plugin Páginas do site armazena o conteúdo das páginas criado por administradores. Não armazena dados pessoais de usuários além do campo padrão usermodified.';
$string['requiredcohorts'] = 'Restringir a coortes';
$string['requiredcohorts_help'] = 'Se coortes forem selecionadas, o visitante deve pertencer a pelo menos uma. Vazio = sem limite de coortes. Combinado com papéis com AND. Gestores sempre têm acesso.';
$string['requiredcohorts_none'] = 'Sem restrição de coortes';
$string['requiredroles'] = 'Restringir a papéis';
$string['requiredroles_help'] = 'Se papéis forem selecionados, o visitante deve ter pelo menos um (em qualquer contexto). Vazio = sem limite de papéis. Combinado com coortes com AND. Gestores sempre têm acesso. Negação em todo o site também via local/sitepages:view.';
$string['requiredroles_none'] = 'Sem restrição de papéis';
$string['sitehomepage'] = 'Página inicial do site';
$string['sitehomepage_desc'] = 'Substitua a página inicial padrão do Moodle por Páginas do site. Você pode usar páginas diferentes para visitantes e usuários conectados. Crie primeiro as páginas em Gerenciar páginas do site. Os redirecionamentos Painel / Meus cursos permanecem — usuários conectados só veem a página conectada se Site for o início deles, ou via Início do site (/?redirect=0).';
$string['sitepages:manage'] = 'Gerenciar páginas do site';
$string['sitepages:view'] = 'Ver páginas do site';
$string['slug'] = 'Slug de URL';
$string['slug_help'] = 'Nome curto de URL opcional (letras, números, hífens). As páginas ficam em /local/sitepages/view.php?slug=nome. Com URLs amigáveis (e reescrita) também em /nome ou /prefixo/nome.';
$string['useonhomepage'] = 'Usar uma página do site na página inicial';
$string['useonhomepage_help'] = 'Quando ativado, o início do Moodle (/) mostra a(s) página(s) do site selecionada(s) em vez da página clássica. A página de visitantes fica visível a visitantes automaticamente. Desative para restaurar o início clássico.';
$string['useonmycourses'] = 'Usar uma página do site para Meus cursos';
$string['useonmycourses_help'] = 'Quando ativado, Meus cursos mostra a página do site selecionada em vez da visão geral de cursos. Desative para restaurar Meus cursos clássico.';
$string['useprettyurls'] = 'URLs amigáveis de página';
$string['useprettyurls_help'] = 'Quando ativado, as páginas com slug usam um caminho curto (/slug ou /prefixo/slug) em vez de /local/sitepages/view.php?slug=…. Requer uma reescrita correspondente (exemplos Apache/Nginx no README e guia). Deixe desativado até verificar a reescrita.';
$string['viewclassichomepage'] = 'Pré-visualizar início clássico';
$string['viewclassicmycourses'] = 'Pré-visualizar Meus cursos clássico';
$string['viewhomepage'] = 'Ver como início de visitantes';
$string['viewhomepage_loggedin'] = 'Ver como início conectado';
$string['viewmycourses'] = 'Ver Meus cursos';
$string['viewpage'] = 'Ver';
$string['visible'] = 'Visível';
$string['visible_help'] = 'Páginas ocultas só estão disponíveis para usuários que podem gerenciar páginas do site.';
