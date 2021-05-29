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

	async create(newUser) {
		const user = await dbConnection.any('INSERT INTO users (first_name,last_name,email,password,created_at) VALUES ($1,$2,$3,$4,$5)', [
			newUser.first_name,
			newUser.last_name,
			newUser.email,
			newUser.password,
			newUser.created_at,
		]);

		return user;
	}

	async findByEmail(email) {
		const user = await dbConnection.any('SELECT * FROM users WHERE email = $1 ', [email]);
		return user;
	}
	// findByEmail(email, result) {
	// 	dbConnection.query('SELECT * FROM users WHERE email = ? ', email, function (err, res) {
	// 		if (err) {
	// 			result(null, err);
	// 		} else {
	// 			result(null, res);
	// 		}
	// 	});
	// }
}

module.exports = new User();
