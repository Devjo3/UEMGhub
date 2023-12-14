<?php
session_start(); // Inicia a sessão no início do arquivo
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message'])) {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $newMessage = $_POST['message'];

            // Inserir a nova mensagem no banco de dados com o ID do remetente
            $sql = "INSERT INTO messages (user_id, message_text) VALUES ('$userId', '$newMessage')";
            if ($conn->query($sql) === TRUE) {
                echo "Mensagem enviada com sucesso";
            } else {
                echo "Erro ao enviar mensagem: " . $conn->error;
            }
        } else {
            echo "ID do usuário não encontrado na sessão";
        }
    }
}
$conn->close();

?>
