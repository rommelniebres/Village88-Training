const express = require('express');
const app = express();

let path = require('path');
app.use(express.static(path.join(__dirname, './static')));
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');

/*	DOCU:	Arrays for members and circles
	OWNER: 	ROMMEL
*/
let members = [];
let circles = [];

const server = app.listen(8000);
console.log('Running in localhost at port 8000');

const io = require('socket.io')(server);

app.get('/', function (req, res) {
	res.render('index');
});

/*	DOCU:	initial connection listener for new socket connection
	OWNER: 	ROMMEL
*/
io.on('connection', function (socket) {
	/*	DOCU:	Emit existing circle from the array circles
		OWNER: 	ROMMEL
	*/
	io.emit('circle_update', circles);

	/*	DOCU:	Listener for new member sign in
		OWNER: 	ROMMEL
	*/
	socket.on('new_member', function (name) {
		let user = {
			id: socket.id,
			name: name,
		};
		members.push(user);
		io.emit('member_update', members);
		socket.emit('current_user', name);
	});

	/*	DOCU:	Listener for new circle created
		OWNER: 	ROMMEL
	*/
	socket.on('new_circle', function (data) {
		circles.push(data);
		io.emit('circle_update', data);
	});

	/*	DOCU:	Listener for clear click of the circles
				remove all circle from the array circles
		OWNER: 	ROMMEL
	*/
	socket.on('clear', function () {
		circles = [];
		io.emit('circle_clear');
	});

	/*	DOCU:	Listener for cursor movement of the users
		OWNER: 	ROMMEL
	*/
	socket.on('user_cursor', function (data) {
		socket.broadcast.emit('others_cursor', data);
	});

	/*	DOCU:	Listener for diconnected users
		OWNER: 	ROMMEL
	*/
	socket.on('disconnect', function () {
		for (let i = 0; i < members.length; i++) {
			if (members[i].id == socket.id) {
				members.splice(i, 1);
			}
		}
		io.emit('member_update', members);
	});
});
