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

// counter count
let counter = 0;
io.on('connection', function (socket) {
	// emit to all client with a 'counter' listener
	io.emit('counter', { count: counter });
	// listener for click of clients, emits count update
	socket.on('clicked', function () {
		counter++;
		io.emit('counter', { count: counter });
	});
	// listener for reset click of clients, reset count
	socket.on('reset', function () {
		counter = 0;
		io.emit('counter', { count: counter });
	});
});
