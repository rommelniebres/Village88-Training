// ================= ES5 ================= //
function Desk(name) {
	this.name = name;
	this.x = 0;
	this.y = 0;
	this.color = 'black';
	this.mov = function (x, y) {
		this.x = x;
		this.y = y;
	};
	this.updateColor = function (new_color) {
		this.color = new_color;
	};
}
let desk1 = new Desk('oak desk');
let desk2 = new Desk('maple desk');
desk1.updateColor('brown');
console.log(desk1);
console.log(desk2);
// ================= ES5 Prototype ================= //
// function Desk(name) {
// 	this.name = name;
// 	this.x = 0;
// 	this.y = 0;
// 	this.color = 'black';
// 	Desk.prototype.mov = function (x, y) {
// 		this.x = x;
// 		this.y = y;
// 	};
// 	Desk.prototype.updateColor = function (new_color) {
// 		this.color = new_color;
// 	};
// }
// let desk1 = new Desk('oak desk');
// let desk2 = new Desk('maple desk');
// desk1.updateColor('brown');
// console.log(desk1);
// console.log(desk2);
// ================= ES6 ================= //
// class Desk {
// 	constructor(name) {
// 		this.name = name;
// 		this.x = 0;
// 		this.y = 0;
// 		this.color = 'black';
// 	}
// 	mov(x, y) {
// 		this.x = x;
// 		this.y = y;
// 	}
// 	updateColor(new_color) {
// 		this.color = new_color;
// 	}
// }
// let desk1 = new Desk('oak desk');
// let desk2 = new Desk('maple desk');
// desk1.updateColor('brown');
// console.log(desk1);
// console.log(desk2);
