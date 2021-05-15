// ================= ES6 ================= //
class Circles {
	constructor(param) {
		this.circles = [];
		for (let i = 0; i < param; i++) {
			this.circles[i] = document.createElement('p'); // create p tag
			this.circles[i].radius = Math.floor(Math.random() * 40) + 10; // create radius
			this.circles[i].coordinatesX = Math.floor(Math.random() * 1700) + 50;
			this.circles[i].coordinatesY = Math.floor(Math.random() * 800) + 50;
			this.circles[i].bgcolor = 0;
		}
	}
	draw_circles = function (id) {
		for (let i = 0; i < this.circles.length; i++) {
			this.circles[i].bgcolor = this.getRandomColor();
			this.set_attr(this.circles[i]);
			this.grow(this.circles[i]);
			document.getElementById(id).appendChild(this.circles[i]);
		}
	};
	grow = function (current_circle) {
		setInterval(function () {
			current_circle.radius += 1;
			current_circle.style.width = current_circle.radius + 'px';
			current_circle.style.height = current_circle.radius + 'px';
			if (current_circle.radius == 200) {
				current_circle.style = '';
				current_circle.remove();
			}
		}, 30);
	};
	set_attr = function (current_circle) {
		current_circle.setAttribute('class', 'circle'); //set class for p tag
		current_circle.setAttribute(
			'style',
			'width: ' +
				current_circle.radius +
				'px;' +
				'height: ' +
				current_circle.radius +
				'px;' +
				'left: ' +
				(current_circle.coordinatesX - current_circle.radius / 2) +
				'px;' +
				'top: ' +
				(current_circle.coordinatesY - current_circle.radius / 2) +
				'px;' +
				'display: inline-block;' +
				'background-color: ' +
				current_circle.bgcolor
		);
	};
	getRandomColor = function () {
		var letters = '0123456789ABCDEF';
		var color = '#';
		for (var i = 0; i < 6; i++) {
			color += letters[Math.floor(Math.random() * 16)];
		}
		return color;
	};
}

// ================= ES5 ================= //
// function Circles(param) {
// 	this.circles = [];
// 	for (let i = 0; i < param; i++) {
// 		this.circles[i] = document.createElement('p'); // create p tag
// 		this.circles[i].radius = Math.floor(Math.random() * 40) + 10; // create radius
// 		this.circles[i].coordinatesX = Math.floor(Math.random() * 1700) + 50;
// 		this.circles[i].coordinatesY = Math.floor(Math.random() * 800) + 50;
// 		this.circles[i].bgcolor = 0;
// 	}
// 	this.draw_circles = function (id) {
// 		for (let i = 0; i < this.circles.length; i++) {
// 			this.circles[i].bgcolor = this.getRandomColor();
// 			this.set_attr(this.circles[i]);
// 			this.grow(this.circles[i]);
// 			document.getElementById(id).appendChild(this.circles[i]);
// 		}
// 	};
// 	this.grow = function (current_circle) {
// 		setInterval(function () {
// 			current_circle.radius += 1;
// 			current_circle.style.width = current_circle.radius + 'px';
// 			current_circle.style.height = current_circle.radius + 'px';
// 			if (current_circle.radius == 200) {
// 				current_circle.style = '';
// 				current_circle.remove();
// 			}
// 		}, 30);
// 	};
// 	this.set_attr = function (current_circle) {
// 		current_circle.setAttribute('class', 'circle'); //set class for p tag
// 		current_circle.setAttribute(
// 			'style',
// 			'width: ' +
// 				current_circle.radius +
// 				'px;' +
// 				'height: ' +
// 				current_circle.radius +
// 				'px;' +
// 				'left: ' +
// 				(current_circle.coordinatesX - current_circle.radius / 2) +
// 				'px;' +
// 				'top: ' +
// 				(current_circle.coordinatesY - current_circle.radius / 2) +
// 				'px;' +
// 				'display: inline-block;' +
// 				'background-color: ' +
// 				current_circle.bgcolor
// 		);
// 	};
// 	this.getRandomColor = function () {
// 		var letters = '0123456789ABCDEF';
// 		var color = '#';
// 		for (var i = 0; i < 6; i++) {
// 			color += letters[Math.floor(Math.random() * 16)];
// 		}
// 		return color;
// 	};
// }
// ================= ES5 Prototype ================= //
// function Circles(param) {
// 	this.circles = [];
// 	for (let i = 0; i < param; i++) {
// 		this.circles[i] = document.createElement('p'); // create p tag
// 		this.circles[i].radius = Math.floor(Math.random() * 40) + 10; // create radius
// 		this.circles[i].coordinatesX = Math.floor(Math.random() * 1700) + 50;
// 		this.circles[i].coordinatesY = Math.floor(Math.random() * 800) + 50;
// 		this.circles[i].bgcolor = 0;
// 	}
// 	Circles.prototype.draw_circles = function (id) {
// 		for (let i = 0; i < this.circles.length; i++) {
// 			this.circles[i].bgcolor = this.getRandomColor();
// 			this.set_attr(this.circles[i]);
// 			this.grow(this.circles[i]);
// 			document.getElementById(id).appendChild(this.circles[i]);
// 		}
// 	};
// 	Circles.prototype.grow = function (current_circle) {
// 		setInterval(function () {
// 			current_circle.radius += 1;
// 			current_circle.style.width = current_circle.radius + 'px';
// 			current_circle.style.height = current_circle.radius + 'px';
// 			if (current_circle.radius == 200) {
// 				current_circle.style = '';
// 				current_circle.remove();
// 			}
// 		}, 30);
// 	};
// 	Circles.prototype.set_attr = function (current_circle) {
// 		current_circle.setAttribute('class', 'circle'); //set class for p tag
// 		current_circle.setAttribute(
// 			'style',
// 			'width: ' +
// 				current_circle.radius +
// 				'px;' +
// 				'height: ' +
// 				current_circle.radius +
// 				'px;' +
// 				'left: ' +
// 				(current_circle.coordinatesX - current_circle.radius / 2) +
// 				'px;' +
// 				'top: ' +
// 				(current_circle.coordinatesY - current_circle.radius / 2) +
// 				'px;' +
// 				'display: inline-block;' +
// 				'background-color: ' +
// 				current_circle.bgcolor
// 		);
// 	};
// 	Circles.prototype.getRandomColor = function () {
// 		var letters = '0123456789ABCDEF';
// 		var color = '#';
// 		for (var i = 0; i < 6; i++) {
// 			color += letters[Math.floor(Math.random() * 16)];
// 		}
// 		return color;
// 	};
// }
