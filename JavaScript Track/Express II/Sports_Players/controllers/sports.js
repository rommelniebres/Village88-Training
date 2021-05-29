const sportModel = require('../models/sport');

class Sports {
	index(req, res) {
		sportModel.search_all(function (err, players) {
			if (err) {
				console.log(err);
			} else {
				console.log(players);
			}
			res.render('index', { players: players });
		});
	}
	search(req, res) {
		sportModel.search_player(req.body, function (err, players) {
			if (err) {
				console.log(err);
			} else {
				console.log(players);
			}
			res.render('partials', { players: players });
		});
	}
}

module.exports = new Sports();
