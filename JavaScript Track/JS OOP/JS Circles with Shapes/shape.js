document.addEventListener('DOMContentLoaded', (event) => {
	// Shape class, parent class for circle, square and star
	class Shapes {
		constructor() {
			this.p = document.createElement('p'); // create p tag
			this.random_radius = Math.floor(Math.random() * 200) + 10; // create random radius
			this.coordinatesX = 0;
			this.coordinatesY = 0;
			this.border_radius = '50%';
		}
		init() {
			document.body.addEventListener('click', function (e) {
				// triggered when click anywhere on the body
				let shape;
				if (current_shape == 'circle') {
					shape = new Circle();
				} else if (current_shape == 'square') {
					shape = new Square();
				} else {
					shape = new Star();
				}
				console.log(shape);
				shape.get_coordinate(e);
				shape.set_attr(bgcolor, shape.border_radius);
				// decreasing radius
				setInterval(function () {
					shape.random_radius -= 1;
					shape.p.style.width = shape.random_radius + 'px';
					shape.p.style.height = shape.random_radius + 'px';
					if (shape.random_radius < 0) {
						shape.p.style = '';
						shape.p.remove();
					}
				}, 30);
				document.body.append(shape.p);
			});
		}
		set_attr(bgcolor, border_radius) {
			this.p.setAttribute(
				'style',
				'width: ' +
					this.random_radius +
					'px;' +
					'height: ' +
					this.random_radius +
					'px;' +
					'left: ' +
					(this.coordinatesX - this.random_radius / 2) +
					'px;' +
					'top: ' +
					(this.coordinatesY - this.random_radius / 2) +
					'px;' +
					'display: block;' +
					'background-color: ' +
					bgcolor +
					';' +
					'position: absolute; border: 3px solid black;' +
					'border-radius: ' +
					border_radius
			);
		}
		get_coordinate(e) {
			this.coordinatesX = e.clientX; // Get the horizontal coordinate
			this.coordinatesY = e.clientY; // Get the vertical coordinate
		}
	}
	// Circle class
	class Circle extends Shapes {
		constructor(border_radius) {
			super(border_radius);
			this.border_radius = '50%';
		}
	}
	// Square class
	class Square extends Shapes {
		constructor(border_radius) {
			super(border_radius);
			this.border_radius = '0%';
		}
	}
	// Star class
	class Star extends Shapes {
		constructor(border_radius) {
			super(border_radius);
			this.border_radius = '25%';
		}
		set_attr(bgcolor, border_radius) {
			this.p.setAttribute(
				'style',
				'width: ' +
					this.random_radius +
					'px;' +
					'height: ' +
					this.random_radius +
					'px;' +
					'left: ' +
					(this.coordinatesX - this.random_radius / 2) +
					'px;' +
					'top: ' +
					(this.coordinatesY - this.random_radius / 2) +
					'px;' +
					'display: block;' +
					'background-color: ' +
					bgcolor +
					';' +
					'position: absolute; border: 3px solid black;' +
					'border-radius: ' +
					border_radius
			);
		}
	}
	// Button class
	class Button {
		constructor() {
			this.btn = document.querySelectorAll('button.btn:not(.btn-delete)');
		}
		all_btn() {
			for (let i = 0; i < this.btn.length; i++) {
				this.btn[i].addEventListener('click', function (e) {
					e.stopPropagation();
					let btn_bg = this.style.backgroundColor;
					bgcolor = btn_bg;
					btn_bg = '#333333';
					setTimeout(function () {
						btn_bg = bgcolor;
					}, 1000);
				});
			}
		}
		delete() {
			document.getElementById('btn4').addEventListener('click', function (e) {
				e.stopPropagation();
				let p = document.querySelectorAll('p');
				for (let i = 0; i < p.length; i++) {
					p[i].style = '';
					p[i].remove();
				}
			});
		}
	}
	// ShapeButton class
	class ShapeButton {
		constructor() {
			this.btn = document.querySelectorAll('button.shapes');
		}
		set_shape() {
			for (let i = 0; i < this.btn.length; i++) {
				this.btn[0].style.backgroundColor = bgcolor;
				this.btn[i].addEventListener('click', function (e) {
					let other_shape = document.querySelectorAll('button.shapes:not(#' + this.id + ')');
					for (let i = 0; i < other_shape.length; i++) {
						other_shape[i].style.backgroundColor = 'white';
					}
					e.stopPropagation();
					this.style.backgroundColor = bgcolor;
					let shape_id = this.id;
					current_shape = shape_id;
				});
			}
		}
	}
	let bgcolor = '#CCE8CC'; // initial color
	let current_shape = 'circle'; // initial shape
	let button = new Button();
	let shape_btn = new ShapeButton();
	let shape = new Shapes();
	shape_btn.set_shape();
	shape.init();
	button.all_btn();
	button.delete();
});
