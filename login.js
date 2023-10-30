function login() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    if(username == '' || password == '') {
        alert('O campo de usuário ou senha está vazio!');
        return false;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("POST", 'login.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
            alert(this.responseText);
        }
    }

    xhr.send("username=" + username + "&password=" + password);
}
