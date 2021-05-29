module.exports = function () {
	return {
		validateEmail: function (input) {
			if (input && /(^\w.*@\w+\.\w)/.test(input)) {
				return true;
			} else {
				return false;
			}
		},

		formError: function (type, errors) {
			return {
				type,
				errors,
			};
		},

		messageHandler: function (title, content) {
			return {
				title,
				content,
			};
		},
	};
};
