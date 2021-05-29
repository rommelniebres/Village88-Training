const express = require('express');
const session = require('express-session');
const app = express();

app.use(
	session({
		secret: 'secret',
		resave: false,
		saveUninitialized: true,
		cookie: { maxAge: 600000 },
	})
);

app.use(logger);

app.get('/', function (req, res) {
	res.send('Homepage');
});
app.get('/users', function (req, res) {
	req.session.user = 'users session';
	req.session.user1 = 'users session1';
	req.session.user2 = 'users session2';
	req.session.user3 = 'users session3';
	console.log('user page');
	let time = new Date();
	let seconds = time.getSeconds();
	console.log(query.sql);
	console.log('Time:', seconds);
	res.send('User Page');
});
function logger(req, res, next) {
	for (let i = 0; i < req.session; i++) {
		console.log(req.session[i]);
	}

	next();
}

app.listen(8001);
console.log('listening in port 8000');
