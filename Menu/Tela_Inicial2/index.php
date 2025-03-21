<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="full-screen">
    <div id="text">
            <img id="logo" src="config.png" >
            <div id="section">
                <div id="welcome">BEM VINDO <span> <?php print_r($_SESSION['nome'])?></span></div>
                <div id="instru">Através do menu à esquerda, você pode explorar todos os recursos disponíveis.</div>
            </div>
    </div>
    <div id="test">
        <img id="julio" src="Julio_direito.gif" alt="Imagem do Julio">
    </div>
</body>
<script>
    window.addEventListener('load', () => {
    // Calcula 1% da altura da viewport
    const vh = window.innerHeight * 0.01;
    // Define o valor para a variável --vh
    document.documentElement.style.setProperty('--vh', `${vh}px`);
});
window.addEventListener('resize', () => {
  // Executa o mesmo script de antes
  let vh = window.innerHeight * 0.01;
  document.documentElement.style.setProperty('--vh', `${vh}px`);
});
</script>
</html>