let crypto = require('crypto');

class Polls {
	index(req, res) {
		let url = crypto.randomBytes(4).toString('hex');
		req.session.url = url;
		req.session.teacher = true;
		res.render('index.ejs', { url: req.session.url });
	}
	random(req, res) {
		if (req.session.teacher == true) {
			const { id } = req.params;
			res.render('poll_teacher.ejs', { id: id });
		} else {
			res.render('poll_student.ejs');
		}
	}
}
module.exports = new Polls();
