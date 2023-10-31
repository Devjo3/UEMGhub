window.onload = function() {
    // Verifique se o usuário está logado
    if (localStorage.getItem('loggedIn') !== 'true') {
        window.location.href = 'index.html';
        return;
    }

    // Adicione um ouvinte de evento ao link "Sair"
    document.getElementById('logout').addEventListener('click', function() {
        // Limpa a variável loggedIn do localStorage
        localStorage.removeItem('loggedIn');
        // Redireciona o usuário para a página de login
        window.location.href = 'login.html';
    });

    // Carregue o feed
    var xhr = new XMLHttpRequest();
    xhr.open("GET", 'feed.php', true);

    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Insira o feed na página
            var feedContainer = document.querySelector('.feed-container');
            feedContainer.innerHTML = this.responseText;
        }
    }

    xhr.send();
}
