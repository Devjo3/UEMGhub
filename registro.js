function registrar() {
    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;
    var confirm_password = document.getElementById('confirm_password').value;

    if(password != confirm_password) {
        alert('As senhas não coincidem!');
        return;
    } else if(username == '' || password == '' || confirm_password == '') {
        alert('Preencha todos os campos!')
        return;
    } else {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", 'registrar.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert(this.responseText);
            }
        }
        xhr.send("username=" + username + "&password=" + password);
    }
}
