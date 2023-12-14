  // Incorporação do código do scripts.js

  document.addEventListener("DOMContentLoaded", function() {
    const minimizeButton = document.getElementById("minimize-button");
    const chatMessages = document.getElementById("chat-messages");

    minimizeButton.addEventListener("click", function() {
      chatMessages.classList.toggle("hidden");
    });

    loadMessages(); // Carregar as mensagens quando a página é carregada
    setInterval(loadMessages, 1000); // Atualizar as mensagens a cada segundo
  });

  function loadMessages() {
    const chatMessages = document.getElementById("chat-messages");
    // Fazer uma solicitação AJAX para buscar mensagens do servidor
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "get_messages.php", true);
    xhr.onload = function() {
      if (xhr.status === 200) {
        chatMessages.innerHTML = xhr.responseText;
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }
    };
    xhr.send();
  }

  function sendMessage() {
    const messageInput = document.getElementById("message-input");
    const message = messageInput.value.trim();
    if (message !== "") {
      // Enviar mensagem para o servidor usando AJAX
      const xhr = new XMLHttpRequest();
      xhr.open("POST", "send_message.php", true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.send("message=" + encodeURIComponent(message));
      messageInput.value = "";
    }
  }

  // Função para abrir a modal
  function openModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "block";
  }

  // Função para fechar a modal
  function closeModal() {
    var modal = document.getElementById("myModal");
    modal.style.display = "none";
  }

  // Função para alternar a visibilidade das mensagens
  function toggleMessages() {
    const chatMessages = document.getElementById("chat-messages");
    chatMessages.classList.toggle("hidden");
  }