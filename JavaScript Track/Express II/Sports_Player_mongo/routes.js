module.exports = function (app) {
	const sports = require('./controllers/sports');
	app.get('/', sports.index);
	app.post('/search', sports.search);
};
