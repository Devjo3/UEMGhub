<?php
include 'conexao.php';

// Buscar mensagens do banco de dados
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir as mensagens
    while ($row = $result->fetch_assoc()) {
        echo '<div>' . htmlspecialchars($row['message_text']) . '</div>';
    }
} else {
    echo "Nenhuma mensagem encontrada";
}
$conn->close();
?>
