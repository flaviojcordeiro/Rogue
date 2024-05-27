const express = require("express");
const http = require("http");
const socketIo = require("socket.io");
var cors = require('cors');

const app = express();
const server = http.createServer(app);
const io = socketIo(server, {
  cors: {
    origin: "*",
    methods: ["GET", "POST"]
  }
});
app.use(cors());
io.on('connection', (socket) => {
    socket.on('sendMessage', (data) => {
        io.emit('receiveMessage', data);
    });    
});

server.listen(8000, () => console.log('Server is running on port 8000'));