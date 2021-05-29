class Users {
	index(req, res) {
		res.render('index.ejs');
	}
	result(req, res) {
		res.render('result.ejs', { data: req.body });
	}
}
module.exports = Users;
