document.addEventListener('DOMContentLoaded', () => {
    const socket = io('http://localhost:8000');
    const messageInput = document.getElementById('message-input');
    const chatHistory = document.getElementById('chat-history');

    function addMessageToChat(message, sender) {
        const messageElement = document.createElement('div');
        messageElement.textContent = `${sender}: ${message}`; // Aqui adicionamos o remetente à mensagem
        chatHistory.appendChild(messageElement);
        chatHistory.scrollTop = chatHistory.scrollHeight;
    }

    function sendMessage(sender) {
        const message = messageInput.value;
        if (message.trim()) {
            socket.emit('sendMessage', { message, sender });
            messageInput.value = '';
        }
    }

    socket.on('receiveMessage', (data) => {
        addMessageToChat(data.message, data.sender);
    });

    document.querySelector('.button-chat').addEventListener('click', () => sendMessage('Cliente'));
    messageInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            sendMessage('Cliente');
        }
    });
});