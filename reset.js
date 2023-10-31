function resetPassword() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;


    if(email == '' || password == '') {
        alert('O campo de email ou senha está vazio!');
        return false;
    } 
    else {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", 'reset_password.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                alert(this.responseText);
            }
        }
        xhr.send("email=" + email);
    }
}
