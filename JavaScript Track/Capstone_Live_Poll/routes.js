module.exports = function (app) {
	const polls = require('./controllers/polls');
	app.get('/', polls.index);
	app.get('/:id', polls.random);
};
