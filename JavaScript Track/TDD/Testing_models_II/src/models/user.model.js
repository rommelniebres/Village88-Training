const Mysql = require('mysql');
const executeQuery = require('../config/database');

class UserModel {
	async findByEmail(email) {
		let result = {
			credentials: {
				email: '',
				password: '',
			},
			is_exist: false,
			error: '',
			redirect: '/error',
		};
		try {
			let login_user_query = Mysql.format('SELECT * FROM users WHERE email = ? ', email);
			let login_user_result = await executeQuery(login_user_query);
			if (login_user_result) {
				result.is_exist = true;
				result.credentials.email = login_user_result[0].email;
				result.credentials.password = login_user_result[0].password;
				result.redirect = '/success';
			}
		} catch (err) {
			console.log(email);
			if (email.email === '' && email.password) {
				result.error = 'Email is required';
			} else if (email.email && email.password === '') {
				result.error = 'Password is required';
			} else if (email.password == '' && email.email == '') {
				result.error = 'Email and password is required';
			}
		}
		return result;
	}
}

module.exports = new UserModel();
