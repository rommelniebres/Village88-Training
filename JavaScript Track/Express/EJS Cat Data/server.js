var express = require('express');
var app = express();
app.use(express.static(__dirname + '/static'));

app.set('views', __dirname + '/views');
app.set('view engine', 'ejs');
app.get('/cats', function (request, response) {
	response.render('cats');
});
var cats_array = [
	{ name: 'Oscar', favorite_food: 'fish', age: 5, sleeping_spot: 'cat house', number: 1 },
	{ name: 'Covid', favorite_food: 'face mask', age: 19, sleeping_spot: 'anywhere', number: 2 },
	{ name: 'HighPaw', favorite_food: 'apples', age: 1, sleeping_spot: 'tree trunks', number: 3 },
	{ name: 'Jaguar', favorite_food: 'human', age: 1000, sleeping_spot: 'bed', number: 4 },
	{ name: 'Sleepy', favorite_food: 'milk', age: 99, sleeping_spot: 'anywhere', number: 5 },
	{ name: 'Bleh', favorite_food: 'ice cream', age: 2, sleeping_spot: 'cat house', number: 6 },
];
app.get('/Oscar', function (request, response) {
	response.render('details', { cat: cats_array[0] });
});
app.get('/Covid', function (request, response) {
	response.render('details', { cat: cats_array[1] });
});
app.get('/HighPaw', function (request, response) {
	response.render('details', { cat: cats_array[2] });
});
app.get('/Jaguar', function (request, response) {
	response.render('details', { cat: cats_array[3] });
});
app.get('/Sleepy', function (request, response) {
	response.render('details', { cat: cats_array[4] });
});
app.get('/Bleh', function (request, response) {
	response.render('details', { cat: cats_array[5] });
});

app.listen(8000, function () {
	console.log('listening on port 8000');
});
