module.exports = function (app) {
	const user = require('./controllers/users');
	app.get('/', user.index);
	app.get('/welcome', user.welcome);
	app.post('/create', user.create);
	app.post('/login_process', user.login_process);
	app.get('/welcome', user.welcome);
	app.get('/logoff', user.logoff);
};
