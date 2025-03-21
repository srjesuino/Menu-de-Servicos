// Adiciona um listener para o evento 'load' da janela
window.addEventListener('load', () => {
    // Calcula 1% da altura da viewport
    const vh = window.innerHeight * 0.01;
    // Define o valor para a variável CSS --vh no elemento raiz
    document.documentElement.style.setProperty('--vh', `${vh}px`);
});

// Adiciona um listener para o evento 'resize' da janela
window.addEventListener('resize', () => {
    // Recalcula 1% da altura da viewport
    let vh = window.innerHeight * 0.01;
    // Atualiza o valor da variável CSS --vh no elemento raiz
    document.documentElement.style.setProperty('--vh', `${vh}px`);
});

// Declara uma variável global para armazenar o texto anterior
var previousText;

// Função para expandir ou recolher uma aba
function expandeAba(id1, id2) {
    // Obtém o elemento da aba pelo ID
    var aba = document.getElementById(id1);
    // Obtém o elemento de seleção pelo ID
    var selecao = document.getElementById(id2);
    // Obtém todos os elementos com a classe 'option'
    var option = document.getElementsByClassName('option');
    
    // Salva o texto original se não for "VOLTAR"
    if (selecao.textContent != "VOLTAR") {
        previousText = selecao.innerText;
    }
    
    // Verifica se a aba está oculta ou sem estilo de display
    if (aba.style.display === "none" || aba.style.display === "") {
        // Esconde todas as opções exceto a selecionada
        for (var i = 0; i < option.length; i++) {
            if (option[i].id != id2) {
                option[i].style.display = "none";
            }
        }
        // Adiciona bordas brancas à seleção
        selecao.style.borderBottom = "3px white solid";
        selecao.style.borderTop = "3px white solid";
        // Altera o texto para "VOLTAR"
        selecao.textContent = "VOLTAR";
        // Exibe a aba
        aba.style.display = "block";
    } else {
        // Oculta a aba
        aba.style.display = "none";
        // Exibe novamente todas as opções exceto a selecionada
        for (var i = 0; i < option.length; i++) {
            if (option[i].id != id2) {
                option[i].style.display = "block";
            }
        }
        // Restaura o texto original
        selecao.textContent = previousText;
        // Remove as bordas da seleção
        selecao.style.border = "none";
    }
}

// Função para alternar o estado do pin (fixar/desfixar a barra lateral)
function togglePin() {
    // Obtém o elemento do pin pelo ID
    var pin = document.getElementById("pin");
    // Obtém o elemento da barra lateral pelo ID
    var sidebar = document.getElementById("sidebar");
    // Obtém o elemento de conteúdo pelo ID
    var conteudo = document.getElementById("conteudo");
    // Obtém o elemento de login pelo ID
    var login = document.getElementById("login");
    // Obtém o elemento de opções pelo ID
    var options = document.getElementById("options");
    
    // Verifica se o pin está no estado "ext" (não fixado)
    if (pin.getAttribute('src') === "pin-ext.png") {
        // Altera a imagem para o estado "fixed"
        pin.setAttribute('src', 'pin-fixed.png');
        // Fixa a barra lateral na posição visível
        sidebar.style.left = '0';
        // Ajusta a margem do conteúdo com base no tamanho da tela
        if (window.innerWidth <= 570) {
            conteudo.style.marginLeft = "150px";
        } else {
            conteudo.style.marginLeft = "200px";
        }
        // Define opacidade total para login, opções e pin
        login.style.opacity = "1";
        options.style.opacity = "1";
        pin.style.opacity = "1";
    } else {
        // Restaura a imagem para o estado "ext"
        pin.setAttribute('src', "pin-ext.png");
        // Remove a propriedade left para voltar ao estado padrão
        sidebar.style.removeProperty('left');
        // Restaura a margem padrão do conteúdo
        conteudo.style.marginLeft = '';
        // Restaura a opacidade padrão de opções, login e pin
        options.style.opacity = "";
        login.style.opacity = "";
        pin.style.opacity = "";
    }
}

// Função para alternar a interação com os links
function mudaLink() {
    // Obtém o elemento de opções pelo ID
    element = document.getElementById("options");
    // Verifica o estado atual de pointer-events
    if (window.getComputedStyle(element).pointerEvents == 'none') {
        // Adiciona um atraso de 30ms para ativar os eventos de clique
        setTimeout(function() {
            element.style.pointerEvents = "auto";
        }, 30);
    } else {
        // Desativa os eventos de clique
        element.style.pointerEvents = 'none';
    }
}