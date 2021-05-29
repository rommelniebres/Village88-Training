// require express
var express = require('express');
// path module -- try to figure out where and why we use this
var path = require('path');
// create the express app
var app = express();
var bodyParser = require('body-parser');
// use it!
app.use(bodyParser.urlencoded({ extended: true }));
// static content
app.use(express.static(path.join(__dirname, './static')));
//set ejs in view folder
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');

// survey form index page
app.get('/', function (req, res) {
	res.render('index');
});
// result page, send data to the view file result
app.post('/result', function (req, res) {
	console.log('POST DATA \n\n', req.body);
	res.render('result', { data: req.body });
});
// tell the express app to listen on port 8000
app.listen(8080, function () {
	console.log('listening on port 8080');
});
