// require express
var express = require('express');
// require session
var session = require('express-session');
// path module -- try to figure out where and why we use this
var path = require('path');
// create the express app
var app = express();
var bodyParser = require('body-parser');
// use it!
app.use(bodyParser.urlencoded({ extended: true }));
// static content
app.use(express.static(path.join(__dirname, './static')));
// session use
app.use(
	session({
		secret: 'keyboardkitteh',
		resave: false,
		saveUninitialized: true,
		cookie: { maxAge: 60000 },
	})
);
//set ejs in view folder
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');
//session counter for refreshing the page
app.get('/', function (req, res) {
	if (req.session.counter == null) {
		req.session.counter = 0;
	} else {
		req.session.counter += 1;
	}
	res.render('index', { counter: req.session.counter });
});
//add 2 counter in session
app.post('/add-2', function (req, res) {
	req.session.counter += 1;
	res.redirect('/');
});
//reset the session counter
app.post('/reset', function (req, res) {
	req.session.counter = null;
	res.redirect('/');
});
// tell the express app to listen on port 8000
app.listen(8000, function () {
	console.log('listening on port 8000');
});
