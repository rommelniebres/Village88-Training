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

// require socket io module
const io = require('socket.io')(server);

// initial color
let color = 'green';
io.on('connection', function (socket) {
	// emit to all client with a 'color' listener
	socket.emit('color', { color: color });
	// listener for click of clients, emits color update
	socket.on('clicked', function (data) {
		console.log(data);
		color = data;
		io.emit('color', { color: data });
	});
});
