<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Gere um token único
    $token = bin2hex(random_bytes(50));

    // Armazene o token no banco de dados...

    // Envie o link de redefinição de senha por email
    $to = $email;
    $subject = "Redefinição de Senha";
    $message = "Para redefinir sua senha, clique no seguinte link: \n\n";
    $message .= "http://seusite.com/redefinir_senha.php?token=$token";
    mail($to, $subject, $message);

    echo "Um link para redefinir sua senha foi enviado para seu email.";
}

$conn->close();
?>
