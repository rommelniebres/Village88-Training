// require express
var express = require('express');
// path module -- try to figure out where and why we use this
var path = require('path');
// create the express app
var app = express();
var bodyParser = require('body-parser');
// use it!
app.use(bodyParser.urlencoded({ extended: true }));
// all data for next and previous
var all_data = {};
// static content
app.use(express.static(path.join(__dirname, './static')));
//set ejs in view folder
app.set('views', path.join(__dirname, './views'));
app.set('view engine', 'ejs');

// index page
app.get('/', function (req, res) {
	res.render('index', (data = null));
});
const axios = require('axios');
app.get('/people', function (req, res) {
	console.log(req.url);
	// use the axios .get() method - provide a url and chain the .then() and .catch() methods
	axios
		.get('https://swapi.dev/api/people/')
		.then((data) => {
			all_data = data.data;
			// log the data before moving on!
			console.log(data.data);
			// rather than rendering, just send back the json data!
			res.json(data.data);
		})
		.catch((error) => {
			// log the error before moving on!
			console.log(error);
			res.json(error);
		});
});
app.get('/planet', function (req, res) {
	// use the axios .get() method - provide a url and chain the .then() and .catch() methods
	axios
		.get('https://swapi.dev/api/planets/')
		.then((data) => {
			all_data = data.data;
			// log the data before moving on!
			console.log(data.data);
			// rather than rendering, just send back the json data!
			res.json(data.data);
		})
		.catch((error) => {
			// log the error before moving on!
			console.log(error);
			res.json(error);
		});
});
app.get('/next', function (req, res) {
	// use the axios .get() method - provide a url and chain the .then() and .catch() methods
	console.log(all_data.data);
	axios
		.get(all_data.next)
		.then((data) => {
			all_data = data.data;
			// rather than rendering, just send back the json data!
			res.json(data.data);
		})
		.catch((error) => {
			// log the error before moving on!
			console.log(error);
			res.json(error);
		});
});
app.get('/previous', function (req, res) {
	// use the axios .get() method - provide a url and chain the .then() and .catch() methods
	console.log(all_data.count);
	axios
		.get(all_data.previous)
		.then((data) => {
			all_data = data.data;
			// rather than rendering, just send back the json data!
			res.json(data.data);
		})
		.catch((error) => {
			// log the error before moving on!
			console.log(error);
			res.json(error);
		});
});
app.get('/show_all', async function (req, res) {
	let names_array = [];
	for (let i in all_data.results) {
		names_array.push(all_data.results[i].name);
	}
	for (let i = 0; i < Math.ceil(all_data.count / 10); i++) {
		await axios
			.get(all_data.next)
			.then((data) => {
				all_data = data.data;
				for (let i in all_data.results) {
					names_array.push(all_data.results[i].name);
				}
			})
			.catch((error) => {
				console.log(error);
			});
	}
	res.json(names_array);
});
// tell the express app to listen on port 8000
app.listen(8000, function () {
	console.log('listening on port 8000');
});
