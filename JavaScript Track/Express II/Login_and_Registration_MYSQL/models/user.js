const dbConnection = require('../config');

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

	create(new_user) {
		return dbConnection.query(
			'INSERT INTO users (first_name,last_name,email,password,created_at) VALUES (?,?,?,?,?)',
			[new_user.first_name, new_user.last_name, new_user.email, new_user.password, new_user.created_at],
			function (err, res) {
				if (err) {
					return err;
				} else {
					return res;
				}
			}
		);
	}

	findByEmail(email, result) {
		dbConnection.query('SELECT * FROM users WHERE email = ? ', email, function (err, res) {
			if (err) {
				result(null, err);
			} else {
				result(null, res);
			}
		});
	}
}

module.exports = new User();
