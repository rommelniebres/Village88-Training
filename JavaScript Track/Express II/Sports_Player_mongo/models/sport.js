const MongoClient = require('mongodb').MongoClient;
const url = 'mongodb://127.0.0.1:27017/express_mongo';
class Sport {
	search_all(callback) {
		MongoClient.connect(url, function (err, client) {
			if (err) throw err;
			let db = client.db('express_mongo');
			db.collection('sport')
				.find()
				.toArray(function (err, result) {
					if (err) throw err;
					callback(null, result);
				});
		});
	}
	search_player(player, callback) {
		MongoClient.connect(url, function (err, client) {
			if (err) throw err;
			let db = client.db('express_mongo');
			let query = {
				name: { $regex: player.name },
				gender: { $in: player.gender },
				sport: { $in: player.sport },
			};
			console.log(query.sport);
			db.collection('sport')
				.find(query)
				.toArray(function (err, result) {
					if (err) throw err;
					callback(null, result);
				});
		});
	}
}

module.exports = new Sport();
