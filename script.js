const actionButton = document.querySelector('.action-button');
const miniMenu = document.querySelector('.nav-items-mini');

if (miniMenu) {
    actionButton.addEventListener('click', function() {
        miniMenu.classList.toggle('show');
    });
} else {
    console.log('Mini menu not found.');
}




// Conectar ao servidor de socket
const socket = io('localhost:8000');

// Função para exibir mensagem no histórico
function displayMessage(message) {
    const chatHistory = $('.chat-history');
    chatHistory.append('<div class="message">' + message + '</div>');
    chatHistory.scrollTop(chatHistory[0].scrollHeight);
}

// Função para enviar mensagem
function sendMessage() {
    const messageInput = $('#message-input');
    const message = messageInput.val();

    if (message) {
        socket.emit('message', message);
        messageInput.val('');

        // Exibir mensagem do usuário no histórico
        displayMessage('Eu: ' + message);
    }
}

// Receber mensagem do servidor
socket.on('message', function(message) {
    displayMessage(message);
});