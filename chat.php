<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chat</title>
    <script src="scripts.js"></script>
</head>
<body>
    <?php
    session_start();
    if(isset($_SESSION['email'])) { // Verifica se a sessão está ativa
    ?>
        <h2>Bem-vindo ao Chat, <?php echo $_SESSION['email']; ?>!</h2>
        <div id="chat-box">
            <div id="chat-messages"></div>
            <input type="text" id="message-input" placeholder="Digite sua mensagem...">
            <button onclick="sendMessage()">Enviar</button>
        </div>
    <?php
    } else {
        header("Location: index.html"); // Redireciona para a página de login se a sessão não estiver ativa
        exit();
    }
    ?>
</body>
</html>
