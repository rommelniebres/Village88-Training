const express = require('express');
const app = express();

let path = require('path');
app.use(express.static(path.join(__dirname, './static')));
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');

// conversations array
let conversations = [];
const server = app.listen(8000);
console.log('Running in localhost at port 8000');

const io = require('socket.io')(server);

app.get('/', function (req, res) {
	res.render('index');
});

io.on('connection', function (socket) {
	io.emit('chat_update', conversations);

	socket.on('got_a_new_user', function (name) {
		socket.broadcast.emit('new_user', name);
		socket.emit('current_user', name);
	});

	socket.on('posting_form', function (data) {
		conversations.push({ name: data.current_user, message: data.message });
		io.emit('chat_update', conversations);
	});
});
