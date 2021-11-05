const express = require('express');
const app = express();
const http = require('http');
const cors = require('cors');

const server = http.createServer(app);

var https = require("https"),
    fs = require("fs"),
    server = https.createServer(
        {
            key: fs.readFileSync("/ssl.key"),
            cert: fs.readFileSync("/te-auxilium.se.crt"),
            ca: [fs.readFileSync("/te-auxilium.se.ca-bundle")]
        }, app);

const io = require("socket.io")(server, {
    cors: {
        origin: '*',
    }
});
app.use(cors());

app.get('/', (req, res) => {
    res.send('Hello');
});

io.on('connection', (socket) => {
    console.log('a user connected id:' + socket.id);

    socket.on('room', (data) => {
        socket.join(data);
    });

    socket.on('update_from_server', (data) => {
        console.log(data);
        io.to(data).emit('update', socket.id);
    });
});

server.listen(8080, () => {
    console.log('listening on *:8080');
});