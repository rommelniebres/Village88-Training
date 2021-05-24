const express = require('express');
const app = express();

let path = require('path');
app.use(express.static(path.join(__dirname, './static')));
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');

app.get('/', function (req, res) {
	res.render('index');
});

const server = app.listen(1337);
console.log('Running in localhost at port 1337');

// require socket io module
const io = require('socket.io')(server);

io.on('connection', function (socket) {
	// set event listener for submitting a form from client
	socket.on('posting_form', function (data) {
		// emit data from form to the updated_message listener of the client
		socket.emit('updated_message', { msg: data.data });
		// emit data with a random number to the random_number listener of the client
		socket.emit('random_number', { random_number: Math.floor(Math.random() * 1000) });
	});
});
