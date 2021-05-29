module.exports = function () {
	return {
		registrationValidation: function (form, validateEmail) {
			const { firstname, lastname, email, password, confirm_password } = form;
			let form_error = [];

			if (firstname == '') {
				form_error.push('First name field cannot be blank');
			}

			if (lastname == '') {
				form_error.push('Last name field cannot be blank');
			}

			if (email == '') {
				form_error.push('Email field cannot be blank');
			} else if (!validateEmail(email)) {
				form_error.push('Email should be valid');
			}

			if (password == '') {
				form_error.push('Password field cannot be blank');
			}

			if (confirm_password == '') {
				form_error.push('Confirm field cannot be blank');
			}

			if (password != confirm_password) {
				form_error.push('Password and Confirm password does not match');
			}

			return form_error;
		},

		loginValidation: function (form, validateEmail) {
			const { email, password } = form;
			let form_error = [];

			if (email == '') {
				form_error.push('Email field cannot be blank');
			} else if (!validateEmail(email)) {
				form_error.push('Email should be valid');
			}

			if (password == '') {
				form_error.push('Password field cannot be blank');
			}

			return form_error;
		},
	};
};
