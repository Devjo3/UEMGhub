function login() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    if(email == '' || password == '') {
        alert('O campo de email ou senha está vazio!');
        return false;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'login.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            // Verifica se a resposta do servidor é "Email ou senha incorretos!"
            if(this.responseText.trim() !== "Email ou senha incorretos!") {
                // Adiciona a variável ao localStorage quando o login for bem sucedido
                localStorage.setItem('loggedIn', 'true');
                // Redireciona para a página feed.html
                window.location.href = 'feed.html';
            } else {
                alert(this.responseText);
            }
        }
    }

    xhr.send("email=" + email + "&password=" + password);
}
