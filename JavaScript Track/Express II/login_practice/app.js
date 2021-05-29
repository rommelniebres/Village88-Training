const express = require('express');
const PORT = require('./config/config').settings.PORT;
const app = express();
const router = require('./config/routes');
const path = require('path');
const session = require('express-session');

app.use(
	session({
		secret: 'keyboardkitteh',
		resave: false,
		saveUninitialized: true,
		cookie: { maxAge: 60000 },
	})
);
app.use(express.static(path.join(__dirname, 'assets')));
app.use(express.urlencoded({ extended: true }));
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

app.use('/', router);
app.use('/profile', router);
app.listen(PORT, function () {
	console.log(`Server listening on port ${PORT}`);
});
