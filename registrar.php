<?php
include 'conexao.php';

function gerarSalt() {
    return bin2hex(random_bytes(32));
}

function calcularHash($password) {
    return hash('sha256', $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email']; 

    $salt = gerarSalt();
    $password_hash = calcularHash($password . $salt);

    // Modificado para colocar o email antes do username
    $sql = "INSERT INTO usuarios (email, username, password_hash, salt) VALUES ('$email', '$username', '$password_hash', '$salt')"; 

    if ($conn->query($sql) === TRUE) {
        echo "Registro bem sucedido!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
