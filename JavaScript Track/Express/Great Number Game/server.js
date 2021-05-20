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
//route for index page/home page
app.get('/', function (req, res) {
	//set random number between 1-100
	if (req.session.random_number == null) {
		req.session.random_number = Math.floor(Math.random() * 100) + 1;
	}
	//render index page with random number and initial null guess number
	res.render('index', { random_number: req.session.random_number, guess: null });
});
//post route for guess post
app.post('/', function (req, res) {
	res.render('index', { random_number: req.session.random_number, guess: req.body.guess });
});
//get route for reset/play again
app.get('/reset', function (req, res) {
	req.session.random_number = null;
	res.redirect('/');
});
// tell the express app to listen on port 8000
app.listen(8000, function () {
	console.log('listening on port 8000');
});
