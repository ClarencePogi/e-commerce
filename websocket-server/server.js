const express = require('express');
const http = require('http');
const { Server } = require('socket.io');
const cors = require('cors'); // Add this

const app = express();
const server = http.createServer(app);
const io = new Server(server, {
  cors: {
    origin: "http://127.0.0.1:8000", // Allow this origin to access the Socket.IO server
    methods: ["GET", "POST"],
    allowedHeaders: ["my-custom-header"],
    credentials: true
  }
});

app.use(cors()); // Add this to handle CORS for the Express app

io.on('connection', (socket) => {
  console.log('A user connected');

  // socket.join('room1');

  socket.on('room1', ({ roomID, role }) => {
    // io.to('room1').emit('message', msg);

    socket.join(userName);

    console.log(`${role} joined room: ${userName}`);

    socket.broadcast.to(userName).emit('message', `${role} joined the room`);
  });
  

  socket.on('chatMessage', ({ message, userName, role }) => {
    // Broadcast the message to everyone in the room
    socket.broadcast.to(userName).emit('message', `${role}: ${message}`);
  });

  socket.on('disconnect', () => {
    console.log('User disconnected');
  });
});

server.listen(3000, () => {
  console.log('Socket.IO server running on http://localhost:3000');
});