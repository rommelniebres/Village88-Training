const initOptions = {
	/* initialization options */
	connect(client, dc, useCount) {
		const cp = client.connectionParameters;
		console.log('Connected to database:', cp.database);
	},

	query(e) {
		console.log('QUERY:', e.query);
	},
};
const pgp = require('pg-promise')(initOptions);

const connection = {
	host: 'localhost',
	port: 5433,
	database: 'express_postgres',
	user: 'postgres',
	password: '1213',
};
const dbConnection = pgp(connection);

module.exports = dbConnection;
