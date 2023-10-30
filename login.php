<?php
include 'conexao.php';

function calcularHash($password, $salt) {
    return hash('sha256', $password . $salt);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if (calcularHash($password, $row["salt"]) == $row["password_hash"]) {
                echo "Login bem sucedido!";
            } else {
                echo "Usuário ou senha incorretos!";
            }
        }
    } else {
        echo "Usuário ou senha incorretos!";
    }
}

$conn->close();
?>
