let mysql = require('mysql');
exports.DB = mysql.createConnection({
	host: 'localhost',
	user: 'root',
	password: '',
	database: 'login_&_registration',
});
