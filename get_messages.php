<?php
include 'conexao.php';

// Buscar mensagens do banco de dados
$sql = "SELECT m.message_text, u.username AS sender_username 
        FROM messages m 
        INNER JOIN usuarios u ON m.user_id = u.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir as mensagens
    while ($row = $result->fetch_assoc()) {
        echo '<div><strong>' . htmlspecialchars($row['sender_username']) . '</strong>: ' . htmlspecialchars($row['message_text']) . '</div>';
    }
} else {
    echo "Nenhuma mensagem encontrada";
}
$conn->close();
?>
