const userModel = require('../models/user');
const { validateEmail, formError, messageHandler } = require('../my_module/utilities')();
const { registrationValidation, loginValidation } = require('../my_module/validation')();
const bcrypt = require('bcrypt');
const saltRounds = 10;

class Users {
	constructor() {}

	index(req, res) {
		res.render('index', {
			message: req.session.message != undefined ? req.session.message : undefined,
			form_errors: req.session.form_errors != undefined ? req.session.form_errors : undefined,
		});
		req.session.destroy();
	}
	async create(req, res) {
		try {
			let error_array = registrationValidation(req.body, validateEmail);
			if (error_array.length > 0) {
				req.session.form_errors = formError('register', error_array);
				res.redirect('/');
				return false;
			}
			let user = await userModel.findByEmail(req.body.email);
			let message;
			if (user.length > 0) {
				message = messageHandler('error', 'Error, email already in the database');
			} else {
				bcrypt.hash(req.body.password, saltRounds, async (err, hash) => {
					req.body.password = hash;
					let user_data = userModel.userData(req.body);
					let created_user = await userModel.create(user_data);
					console.log('return');
					console.log(created_user);
				});
				message = messageHandler('success', 'User has been registered successfully');
			}
			req.session.message = message;
			res.redirect('/');
		} catch (error) {
			console.log(error);
		}
	}

	async login_process(req, res) {
		try {
			let error_array = loginValidation(req.body, validateEmail);

			if (error_array.length > 0) {
				req.session.form_errors = formError('login', error_array);
				res.redirect('/');
				return false;
			}

			let user = await userModel.findByEmail(req.body.email);

			if (user.length > 0) {
				bcrypt.compare(req.body.password, user[0].password, async function (err, result) {
					if (result) {
						console.log('correct credentials');
						req.session.user = user[0];
						res.redirect('/welcome');
					} else {
						console.log('wrong password');
						req.session.form_errors = formError('login', ['Wrong Email or Password']);
						res.redirect('/');
						return false;
					}
				});
			} else {
				req.session.form_errors = formError('login', ['Wrong Email or Password']);
				res.redirect('/');
				return false;
			}
		} catch (error) {}
	}
	async welcome(req, res) {
		console.log(req.session.user);
		res.render('welcome', { user: req.session.user });
	}
	logoff(req, res) {
		req.session.destroy();
		res.redirect('/');
	}
}

module.exports = new Users();
