<?php
// Inicia a sessão para gerenciar dados do usuário logado
session_start();
// Inclui o arquivo que contém a classe Login
require 'login/login.php';
// Inicializa a variável de erro como vazia
$erro = "";

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtém o valor do campo username, ou define como vazio se não existir
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    // Obtém o valor do campo password, ou define como vazio se não existir
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Verifica se ambos os campos estão preenchidos
    if (!empty($username) && !empty($password)) {
        // Cria uma nova instância da classe Login
        $login = new Login();
        // Valida as credenciais chamando o método validaUsuario
        $resultado = $login->validaUsuario($username, $password);
        
        // Se as credenciais forem válidas
        if ($resultado) {
            // Armazena o nome do usuário na sessão
            $_SESSION['nome'] = $resultado['nome'];
            // Armazena o "cid" (ID ou outro identificador) na sessão
            $_SESSION['cid'] = $resultado['cid'];
            // Redireciona para a página de menu
            header("Location: menu/menu.php");
            // Encerra o script após o redirecionamento
            exit();
        } else {
            // Define mensagem de erro para credenciais inválidas
            $erro = "Usuário ou senha inválidos.";
        }
    } else {
        // Define mensagem de erro para campos não preenchidos
        $erro = "Por favor, preencha todos os campos.";
    }
}
?>

<html>
<head lang="pt-br">
    <!-- Define o ícone da aba do navegador -->
    <link rel="shortcut-icon" href="LOGO_MADEPAR_bola.ico" type="image/x-icon">
    <!-- Define o título da página -->
    <title>Login</title>
    <!-- Define a codificação de caracteres -->
    <meta charset="UTF-8">
    <!-- Inclui o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Configura a responsividade para dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Inclui o arquivo CSS personalizado -->
    <link rel="stylesheet" type="text/css" href="login/login.css">
    <!-- Inclui os ícones do Linearicons -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
</head>

<body>
    <!-- Define o formulário com método POST -->
    <form method="POST" action="">
        <!-- Container para o logotipo e mensagem de boas-vindas -->
        <div id="welcome">
            <!-- Exibe o logotipo da empresa -->
            <img src="login/LOGO MADEPAR NOVA.png">
            <!-- Container para o título -->
            <div id="welcome-container">
                <!-- Título da seção -->
                <h5>SERVIÇOS MADEPAR</h5>
            </div>
            <!-- Rodapé com direitos autorais -->
            <div>
                <label style="color: #555;">©Madepar Indústria e Comércio de Madeiras LTDA. 2024.</label>
            </div>
        </div>
        <!-- Container para os campos do formulário -->
        <div id="form-container">
            <!-- Campo de entrada para o nome de usuário -->
            <input type="text" name="username" placeholder="Usuário" required>
            <!-- Container para o campo de senha e ícone -->
            <div id="senha">
                <!-- Campo de entrada para a senha -->
                <input id="senha-input" type="password" name="password" placeholder="Senha" required>
                <!-- Ícone de olho para mostrar/esconder a senha -->
                <span class="lnr lnr-eye"></span>
            </div>
            <!-- Botão de envio do formulário -->
            <input class="button-3" role="button" type="submit" value="Entrar">
            <!-- Exibe mensagem de erro, se houver -->
            <?php if ($erro): ?>
                <div style="margin-bottom: 0; margin-top:20px;" class="alert alert-danger"><?php echo $erro; ?></div>
            <?php endif; ?>
        </div>
    </form>
</body>
</html>

<script>
    // Seleciona o ícone de olho
    let btn = document.querySelector('.lnr-eye');

    // Adiciona um evento de clique ao ícone
    btn.addEventListener('click', function() {
        // Seleciona o campo de senha
        let input = document.querySelector('#senha-input');

        // Alterna o tipo do campo entre "password" e "text"
        if(input.getAttribute('type') == 'password') {
            input.setAttribute('type', 'text');
        } else {
            input.setAttribute('type', 'password');
        }
    });
</script>