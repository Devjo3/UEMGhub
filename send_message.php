<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message'])) {
        $newMessage = $_POST['message'];
        
        // Inserir a nova mensagem no banco de dados
        $sql = "INSERT INTO messages (user_id, message_text) VALUES (1, '$newMessage')"; // Aqui, 1 é um exemplo de ID de usuário; você usaria o ID real do usuário logado
        if ($conn->query($sql) === TRUE) {
            echo "Mensagem enviada com sucesso";
        } else {
            echo "Erro ao enviar mensagem: " . $conn->error;
        }
    }
}
$conn->close();
?>
