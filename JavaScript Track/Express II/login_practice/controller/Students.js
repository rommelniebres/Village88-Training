const Student = require('../models/student');
const student = new Student();
class Students {
	index(req, res) {
		res.render('index.ejs', { errors: null });
	}
	register_validation = async (req, res) => {
		let errors = {};
		let first_name = req.body.first_name;
		let last_name = req.body.last_name;
		let email = req.body.email;
		let password = req.body.password;
		let confirm_password = req.body.confirm_password;
		student.get_student_by_email(email, async function (error, result) {
			if (error) {
				console.log('Error fetching data: ', error);
				return;
			} else {
				if (result.length > 0) {
					console.log('Email taken');
					errors.email = 'Email taken';
				}
				console.log(result);
			}
		});
		if (!/^[a-zA-Z- ]+$/.test(first_name)) {
			errors.first_name = 'First name invalid';
		}
		if (!/^[a-zA-Z- ]+$/.test(last_name)) {
			errors.last_name = 'Last name invalid';
		}
		if (!/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email)) {
			errors.email = 'Email invalid';
		}
		if (password.length < 8) {
			errors.password = 'Password must be 8 characters or more';
		}
		if (password != confirm_password) {
			errors.confirm_password = 'Password must match';
		}
		if (Object.getOwnPropertyNames(errors).length !== 0) {
			res.render('index.ejs', { errors: errors });
		} else {
			res.redirect('/profile');
		}
	};
	profile(req, res) {
		res.render('profile.ejs');
	}

	logout(req, res) {}
}
module.exports = Students;
