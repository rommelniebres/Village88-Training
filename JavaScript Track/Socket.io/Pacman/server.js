const express = require('express');
const app = express();

let path = require('path');
app.use(express.static(path.join(__dirname, './static')));
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');

let conversations = [];
let users = [];

const server = app.listen(8000);
console.log('Running in localhost at port 8000');

const io = require('socket.io')(server);

app.get('/', function (req, res) {
	res.render('index');
});

io.on('connection', function (socket) {
	let other_player = [];
	io.emit('chat_update', conversations);
	io.emit('platform_update', users);

	socket.on('got_a_new_user', function (name) {
		player_info = {
			id: socket.id,
			name: name,
			score: 0,
			position: { x: 9, y: 9 },
			ghost: { x: 1, y: 1 },
			status: 'alive',
			game: 'not-ready',
		};
		console.log(users);
		for (let i = 0; i < users.length; i++) {
			if (users[i].id != socket.id) {
				other_player.push = users[i];
			}
		}
		users.push(player_info);
		conversations.push({ name: `NEW`, message: `${name} joined the chat!` });
		io.emit('chat_update', conversations);
		console.log(other_player);
		socket.broadcast.emit('mini_grid', other_player);
		socket.emit('current_user', player_info);
	});

	socket.on('posting_form', function (data) {
		conversations.push({ name: data.current_user, message: data.message });
		io.emit('chat_update', conversations);
	});
	socket.on('disconnect', function () {
		for (let i = 0; i < users.length; i++) {
			if (users[i] == socket.id) {
				users.splice(i, 1);
			}
		}
	});
});
