const dbConnection = require('../config');

class Sport {
	search_all(result) {
		dbConnection.query('SELECT * FROM sport', function (err, res) {
			if (err) {
				result(null, err);
			} else {
				result(null, res);
			}
		});
	}
	search_player(player, result) {
		dbConnection.query('SELECT * FROM sport WHERE name LIKE ? AND gender IN (?) AND sport IN (?)', [player.name, player.gender, player.sport], function (err, res) {
			if (err) {
				result(null, err);
			} else {
				result(null, res);
			}
		});
	}
}

module.exports = new Sport();
