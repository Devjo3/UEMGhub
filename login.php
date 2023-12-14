<?php
session_start(); // Inicia a sessão no início do arquivo
include 'conexao.php';

function calcularHash($password, $salt) {
    return hash('sha256', $password . $salt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if (calcularHash($password, $row["salt"]) == $row["password_hash"]) {
                $_SESSION['loggedin'] = true; // Adiciona a variável de sessão quando o login for bem sucedido
                $_SESSION['user_id'] = $row['id']; // Adiciona o ID do usuário na sessão
                echo "Login bem sucedido!";
            } else {
                echo "Email ou senha incorretos!";
            }
        }
    } else {
        echo "Email ou senha incorretos!";
    }
}

$conn->close();
?>
