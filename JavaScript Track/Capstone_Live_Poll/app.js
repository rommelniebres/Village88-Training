const express = require('express');
const app = express();
const path = require('path');
const server = app.listen(8000);
const io = require('socket.io')(server);
let session = require('express-session');

app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, 'assets')));
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
app.use(
	session({
		secret: 'secret',
		resave: false,
		saveUninitialized: true,
		cookie: { maxAge: 600000 },
	})
);
require('./routes.js')(app);

/*	DOCU: 	Array for the data of the poll.
	OWNER: 	ROMMEL */
let student_ids = [];
let votes = [];

io.on('connection', function (socket) {
	/*	DOCU: 	Socket listener for new clients.
				Emit to all the current student count.
		OWNER: 	ROMMEL */
	socket.on('new_student', function () {
		student_ids.push(socket.id);
		io.emit('student_count', student_ids.length);
	});

	/*	DOCU: 	Socket listener for poll updates.
				Emit to others the current poll updates.
		OWNER: 	ROMMEL */
	socket.on('poll_update', function (data) {
		socket.broadcast.emit('poll_update_student', data);
	});

	/*	DOCU: 	Socket listener for options update.
				Emit to others the current poll options update.
		OWNER: 	ROMMEL */
	socket.on('option_update', function (data) {
		socket.broadcast.emit('option_update_student', data);
	});

	/*	DOCU: 	Socket listener for deleting options.
				Emit to others the current options.
		OWNER: 	ROMMEL */
	socket.on('delete_option', function (data) {
		socket.broadcast.emit('delete_option_student', data);
	});

	/*	DOCU: 	Socket listener for starting the poll.
				Emit to all the current number of students.
		OWNER: 	ROMMEL */
	socket.on('poll_start', function () {
		socket.broadcast.emit('poll_start_student');
		io.emit('student_count', student_ids.length);
	});

	/*	DOCU: 	Socket listener for the vote of a student.
				Emit to teacher the current number of students votes.
		OWNER: 	ROMMEL */
	socket.on('student_vote', function (data) {
		votes.push(data);
		group_votes = {};
		for (let i = 0; i < votes.length; ++i) {
			if (!group_votes[votes[i]]) {
				group_votes[votes[i]] = 0;
				group_votes[votes[i]]++;
			} else {
				group_votes[votes[i]]++;
			}
		}
		io.emit('student_vote_teacher', { votes_num: votes.length, students: student_ids.length, votes: group_votes });
	});

	/*	DOCU: 	Socket listener for poll result.
				Emit to students the poll result.
		OWNER: 	ROMMEL */
	socket.on('poll_result', function (data) {
		socket.broadcast.emit('poll_result_student', data);
	});

	/*	DOCU: 	Socket listener for restarting the poll.
				Emit to students to restart the poll.
		OWNER: 	ROMMEL */
	socket.on('restart_poll', function () {
		student_ids = [];
		votes = [];
		socket.broadcast.emit('restart_poll_student');
	});

	/*	DOCU: 	Socket listener for reseting the poll data.
		OWNER: 	ROMMEL */
	socket.on('reset', function () {
		student_ids = [];
		votes = [];
	});

	/*	DOCU: 	Socket listener for disconnected user.
				Remove the id to the students array.
		OWNER: 	ROMMEL */
	socket.on('disconnect', function () {
		let index = student_ids.indexOf(socket.id);
		if (index >= 0) {
			student_ids.splice(index, 1);
		}
		io.emit('student_count', student_ids.length);
	});
});
