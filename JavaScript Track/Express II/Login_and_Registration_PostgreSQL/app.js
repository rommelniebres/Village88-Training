const express = require('express');
const app = express();
const path = require('path');
const port = 8000;

let session = require('express-session');
app.use(express.urlencoded({ extended: true }));

app.use(
	session({
		secret: 'secret',
		resave: false,
		saveUninitialized: true,
		cookie: { maxAge: 600000 },
	})
);

app.use(express.static(path.join(__dirname, 'assets')));
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
require('./routes.js')(app);
app.listen(port);
