<?php
// Inicia a sessão para gerenciar dados do usuário
session_start();
// Verifica se o usuário está logado; se não, redireciona para a página inicial
if (!isset($_SESSION['nome'])) {
    header("Location: ../index.php");
    exit();
}
// Verifica se o botão de logout foi clicado
if (isset($_POST['Logout'])) {
    // Destroi a sessão ao fazer logout
    session_destroy();
    // Redireciona para a página inicial
    header("Location: ../index.php");
}
// Inclui o arquivo que contém a classe DatabaseQuery
require '../apontamento/producao/consulta.php';
// Cria uma instância da classe DatabaseQuery
$dbQuery = new DatabaseQuery();
// Executa uma consulta específica usando o "cid" da sessão
$status = $dbQuery->executeThirdyQuery($_SESSION['cid']);
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <!-- Define a codificação de caracteres -->
    <meta charset="UTF-8">
    <!-- Configura a responsividade para dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Define o título da página -->
    <title>Menu Madepar</title>
    <!-- Inclui o arquivo CSS personalizado -->
    <link rel="stylesheet" type="text/css" href="menu.css">
    <!-- Pré-conecta ao Google Fonts para carregar fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- Inclui a fonte Nunito Sans do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <!-- Inclui o arquivo JavaScript personalizado -->
    <script src="script.js"></script>
</head>

<body>
    <!-- Barra lateral com eventos de mouse para interatividade -->
    <div id="sidebar" onmouseenter="mudaLink()" onmouseleave="mudaLink()">
        <div>
            <!-- Logotipo da empresa -->
            <img src="logo-bola.png" alt="logo" id="logo">
            <!-- Ícone de pin com função de toggle -->
            <img src="pin-ext.png" alt="pin" id="pin" onclick="togglePin()">
        </div>
        <!-- Container para as opções do menu -->
        <div id="options">
            <!-- Link para a tela inicial -->
            <a href="Tela_Inicial2/index.php" target="conteudoFrame" id="optionHome">
                <div class="option">
                    Home
                </div>
            </a>
            <!-- Condição para exibir a opção "Apontamento" se $status for um array -->
            <?php if (is_array($status)) { ?>
                <a href="../apontamento/PRODUCAO/apontamento.php" target="conteudoFrame" id="optionAponta">
                    <div class="option">
                        Apontamento
                    </div>
                </a>
            <?php } ?>
            <!-- Link para a página de qualidade -->
            <a href="../apontamento/QUALIDADE/ApontarQualidade.php" target="conteudoFrame" id="optionAponta">
                <div class="option">
                    Qualidade
                </div>
            </a>
            <!-- Link para chamados TI, abrindo em nova aba -->
            <a href="http://192.168.10.191" target="_blank" id="optionChamados">
                <div class="option">
                    Chamados TI
                </div>
            </a>
            <!-- Link para o webmail, abrindo em nova aba -->
            <a href="https://email.platonic.cloud/interface/root#/login" target="_blank" id="optionWebmail">
                <div class="option">
                    WebMail
                </div>
            </a>
            <!-- Link para o portal de OPS, abrindo em nova aba -->
            <a href="http://192.168.10.194:8080/madepar/" target="_blank" id="optionPortalOPS">
                <div class="option">
                    Portal de OPS
                </div>
            </a>
            <!-- Link para a planilha de contatos -->
            <a href="https://docs.google.com/spreadsheets/d/1PhLK3syyhPXGQ_ZjwqYMr7V1xY5shw49myfyFRpWyEs/edit?usp=sharing" target="conteudoFrame" id="optionContatos">
                <div class="option">
                    Contatos
                </div>
            </a>
            <!-- Opção expansível para Salas de Reunião -->
            <div class="option" onclick="expandeAba('subOptionsSalas', 'optionSala')" id="optionSala">
                Salas de Reunião
            </div>
            <!-- Opção expansível para Veículos -->
            <div class="option" onclick="expandeAba('subOptionsVeiculos', 'optionVeiculos')" id="optionVeiculos">
                Veículos
            </div>
            <!-- Opção expansível para Projetos de Investimento -->
            <div class="option" onclick="expandeAba('subOptionsProjetos', 'optionProjetos')" id="optionProjetos">
                Projetos de Investimento
            </div>
            <!-- Opção expansível para Solicitações -->
            <div class="option" onclick="expandeAba('subOptionsSolicita', 'optionSolicita')" id="optionSolicita">
                Solicitações
            </div>
            <!-- Opção expansível para Prestação de Contas -->
            <div class="option" onclick="expandeAba('subOptionsPrestacao', 'optionPrestacao')" id="optionPrestacao">
                Prestação de Contas
            </div>
            <!-- Subopções para Prestação de Contas -->
            <div class="subOptions" id="subOptionsPrestacao">
                <a href="https://docs.google.com/spreadsheets/d/1dJDTv2lBK29A4JLgGTdFLZ9Tz7HO4hqa/edit?usp=drive_link&ouid=103798828877664708307&rtpof=true&sd=true" target="conteudoFrame">
                    <div class="subOption">
                        MadeparDoors
                    </div>
                </a>
                <a href="https://docs.google.com/spreadsheets/d/1HgqU_fTB3mwShJBbAyFnzlpEu0w5331p/edit?usp=drive_link&ouid=103798828877664708307&rtpof=true&sd=true" target="conteudoFrame">
                    <div class="subOption">
                        Brasdoor
                    </div>
                </a>
            </div>
            <!-- Subopções para Projetos de Investimento -->
            <div class="subOptions" id="subOptionsProjetos">
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSebQ0JnqoEH8Om11OrcBfViUaJwvBVtqiSRhgkCqWnQ4cdQqA/viewform?usp=header" target="conteudoFrame">
                    <div class="subOption">
                        Solicitação
                    </div>
                </a>
                <a href="https://docs.google.com/spreadsheets/d/1XMCIt5DSx9qTY08P43c77iXVafb5hP8lhbVC_ObSIo0/edit?usp=sharing" target="conteudoFrame">
                    <div class="subOption">
                        Consulta
                    </div>
                </a>
            </div>
            <!-- Subopções para Veículos -->
            <div class="subOptions" id="subOptionsVeiculos">
                <a href="https://forms.gle/pZkmNx7gMhyirKRY9" target="conteudoFrame">
                    <div class="subOption">
                        Agendamento
                    </div>
                </a>
                <a href="https://calendar.google.com/calendar/u/0/embed?src=madeparcontrole@gmail.com&ctz=America/Sao_Paulo" target="conteudoFrame">
                    <div class="subOption">
                        Consulta
                    </div>
                </a>
            </div>
            <!-- Subopções para Salas de Reunião -->
            <div class="subOptions" id="subOptionsSalas">
                <a href="https://forms.gle/dzvWPUp6MV6aEwpA9" target="conteudoFrame">
                    <div class="subOption">
                        Agendamento
                    </div>
                </a>
                <a href="https://abre.ai/aoqV" target="conteudoFrame">
                    <div class="subOption">
                        Consulta
                    </div>
                </a>
            </div>
            <!-- Subopções para Solicitações -->
            <div class="subOptions" id="subOptionsSolicita">
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSeVH_mOyD2pwlBW0jEpBjV5wlLbNN7jK5zXnibP1_2uQbqIRg/viewform?usp=dialog" target="conteudoFrame">
                    <div class="subOption">
                        Solicitação Almoço/Lanche
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSdLHk0RNk3b3OXKpL_57FuOxmZkTIf07BMXG71jI1H2M3Kd7w/viewform" target="conteudoFrame">
                    <div class="subOption">
                        Cadastro Fornecedor Cliente
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfq2WXP6jCYmEujpdRJCbus9fwuDGAhzqHMOf7Wtiy0r0CNzA/viewform" target="conteudoFrame">
                    <div class="subOption">
                        Cadastro de Produto
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSceMrj4hKP34zHZcJEVAhwPX5nBRyDAgMESm1vO1LRxWRVeEw/formResponse" target="conteudoFrame">
                    <div class="subOption">
                        Cadastro Transportador
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfS8_4zMW0YOhccC4TMsXBy7BwSUjXDMiQXfd8hGn8cg3HAxQ/viewform" target="conteudoFrame">
                    <div class="subOption">
                        NF Devolução
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSexHCZoXJaH3J8gyFPLoRJY2aJItywn664m04FmT6I-boV1NQ/viewform" target="conteudoFrame">
                    <div class="subOption">
                        NF Remessa
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSdAVJ-hiQFoz7Ud4y6L37F5GjT4RHR-8UcPMZibXsGSEChH5g/viewform?vc=0&c=0&w=1&flr=0" target="conteudoFrame">
                    <div class="subOption">
                        NF Toras
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLScCzdVjgwUoPsHXZ95gKwc-dn5cdjH_0hZnWnCSt8PvwhFayg/viewform?usp=sf_link" target="conteudoFrame">
                    <div class="subOption">
                        NF Vendas Diversas
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSeiP7xDbO40-35slY0qVZk6FiqpsThQlxLmgqXGKioPkkcAJA/viewform" target="conteudoFrame">
                    <div class="subOption">
                        NF Mercado Interno
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSe_Ei-nW2t26ozmytW_SAdFOr8QkYLM_3Jidu4jA7H2GimLVA/viewform" target="conteudoFrame">
                    <div class="subOption">
                        Recusa e Cancelamento NFe
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfZiuxXWu_cJuHVBLPbCb1Qn7WJypmKAc2Te09DQcy1lsoZ6A/viewform" target="conteudoFrame">
                    <div class="subOption">
                        Carta Correção NFe
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfIa-YpdLmITaFwu_7lsxz_YvlDhUL9BIpa7Lqtw2Edf1unzg/viewform" target="conteudoFrame">
                    <div class="subOption">
                        Condição de Pagamento
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLScSkPrDiMcadKLjgfO7RErg0OlCrltR9zAGlQXIH3A7qnRPfQ/viewform" target="conteudoFrame">
                    <div class="subOption">
                        Exceção Janela Fiscal
                    </div>
                </a>
                <a href="https://docs.google.com/forms/d/1jRWyAHb3sFSISEcDVNKkPrJ4oOMDnOj8qteJ10C1BVY/viewform?edit_requested=true" target="conteudoFrame">
                    <div class="subOption">
                        Entrada Portaria
                    </div>
                </a>
            </div>
        </div>
        <!-- Container para informações de login e logout -->
        <div>
            <!-- Formulário para logout -->
            <form id="login" method="POST">
                <!-- Exibe o nome e o "cid" do usuário logado -->
                <div id="data-login"><?php print_r($_SESSION['nome']) ?> - <?php print_r($_SESSION['cid']) ?></div>
                <!-- Botão de logout com ícone -->
                <button type="submit" name="Logout" id="logout"><img src="logout-svgrepo-com.png" alt=""></button>
            </form>
        </div>
    </div>
    <!-- Container para o conteúdo exibido no iframe -->
    <div id="conteudo">
        <!-- Iframe que exibe o conteúdo das páginas vinculadas -->
        <iframe src="Tela_Inicial2/index.php" id="conteudoFrame" name="conteudoFrame"></iframe>
    </div>
</body>
</html>