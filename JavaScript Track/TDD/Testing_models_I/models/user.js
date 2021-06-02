const Mysql = require('mysql');
const executeQuery = require('../config');

class User {
	constructor() {
		this.user = {};
		this.created_at = new Date();
	}
	userData(user) {
		let data = {
			first_name: user.firstname,
			last_name: user.lastname,
			email: user.email,
			password: user.password,
			created_at: this.created_at,
		};
		this.user = data;
		return this.user;
	}

	async create(new_user) {
		let result = {
			success: false,
			error: false,
			param_missing: false,
		};
		try {
			let create_user_query = Mysql.format(`INSERT INTO users (first_name,last_name,email,password) VALUES (?,?,?,?);`, [
				new_user.first_name,
				new_user.last_name,
				new_user.email,
				new_user.password,
			]);
			let create_user_result = await executeQuery(create_user_query);
			if (create_user_result) {
				result.success = true;
			}
		} catch (err) {
			result.param_missing = true;
			result.error = true;
			console.log(err);
		}
		return result;
	}

	async findByEmail(email) {
		let result = {
			success: false,
			error: false,
			param_missing: false,
		};
		try {
			let login_user_query = Mysql.format('SELECT * FROM users WHERE email = ? ', email);
			let login_user_result = await executeQuery(login_user_query);
			if (login_user_result) {
				result.success = true;
			}
		} catch (err) {
			result.param_missing = true;
			result.error = true;
			console.log(err);
		}
		return result;
	}
}

module.exports = new User();
