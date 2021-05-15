let $query = function (selector) {
	let element;
	let object = {
		get_element: function () {
			if (element) {
				return element;
			} else {
				return document.querySelectorAll(selector);
			}
		},
		click: function (callback) {
			for (let i = 0; i < element.length; i++) {
				element[i].addEventListener('click', function () {
					callback();
				});
			}
			return this;
		},
		hide: function () {
			for (let i = 0; i < element.length; i++) {
				element[i].style.display = 'none';
			}
			return this;
		},
		show: function () {
			for (let i = 0; i < element.length; i++) {
				element[i].style.display = 'block';
			}
			return this;
		},
	};
	element = object.get_element(selector);
	return object;
};
