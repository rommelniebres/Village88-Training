const mysql = require('mysql');

const dbConnection = mysql.createConnection({
	host: `localhost`,
	user: `root`,
	password: ``,
	database: `sports`,
});

dbConnection.connect(function (err) {
	if (err) throw err;
	console.log('database connected');
});

module.exports = dbConnection;
