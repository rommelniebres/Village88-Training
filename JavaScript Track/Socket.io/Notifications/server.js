const express = require('express');
const app = express();

let path = require('path');
app.use(express.static(path.join(__dirname, './static')));
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');

app.get('/', function (req, res) {
	res.render('index');
});

const server = app.listen(8000);
console.log('Running in localhost at port 8000');

const io = require('socket.io')(server);

io.on('connection', function (socket) {
	io.emit('join', socket.id);
	// listener for click of clients, emits client/socket id
	socket.on('clicked', function () {
		io.emit('notify', socket.id);
	});
	socket.on('disconnect', function () {
		io.emit('left', socket.id);
	});
});
