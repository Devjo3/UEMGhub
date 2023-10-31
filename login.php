<?php
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
