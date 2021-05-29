const express = require('express');
const app = express();
const path = require('path');
const port = 8000;

let session = require('express-session');
app.use(express.urlencoded({ extended: true }));

const redis = require('redis');
const redisClient = redis.createClient();
const redisStore = require('connect-redis')(session);

app.use(
	session({
		store: new redisStore({ client: redisClient }),
		secret: 'secret$%^134',
		resave: false,
		saveUninitialized: false,
		cookie: {
			secure: false,
			httpOnly: false,
			maxAge: 1000 * 60 * 10,
		},
	})
);

app.use(express.static(path.join(__dirname, 'assets')));
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
require('./routes.js')(app);
app.listen(port);

redisClient.on('error', function (error) {
	console.log(`Error encountered: ${error}`);
});
redisClient.on('connect', function (error) {
	console.log(`Redis Connected`);
});
