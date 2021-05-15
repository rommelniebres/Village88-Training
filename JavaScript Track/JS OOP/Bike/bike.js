// ES5 no Prototype
function Bike(name, price, max_speed) {
	this.name = name;
	this.price = price;
	this.max_speed = max_speed;
	this.miles = 0;
	this.displayInfo = function () {
		//have this method display the bike's price, maximum speed, and the total miles driven.
		console.log('Bike: ' + this.name);
		console.log('Price: ' + this.price);
		console.log('Max Speed: ' + this.max_speed);
		console.log('Total Miles: ' + this.miles);
	};
	this.drive = function () {
		//have it display "Driving" on the screen and increase the total miles driven by 10.
		this.miles += 10;
		console.log('Driving: ' + this.miles + ' miles');
		return this;
	};
	this.reverse = function () {
		// have it display "Reversing" on the screen and decrease the total miles driven by 5.
		if (this.miles > 0) {
			this.miles -= 5;
		}
		console.log('Reversing: ' + this.miles + ' miles');
		return this;
	};
}
let bike1 = new Bike('Bike 1', 10, 110);
let bike2 = new Bike('Bike 2', 20, 120);
let bike3 = new Bike('Bike 3', 30, 130);
console.log('==============');
bike1.drive().drive().drive().reverse().displayInfo();
console.log('==============');
bike2.drive().drive().reverse().reverse().displayInfo();
console.log('==============');
bike3.reverse().reverse().reverse().displayInfo();
console.log('==============');

// ================= ES5 with Prototype ================= //
// function Bike(name, price, max_speed) {
// 	this.name = name;
// 	this.price = price;
// 	this.max_speed = max_speed;
// 	this.miles = 0;

// 	Bike.prototype.displayInfo = function () {
// 		//have this method display the bike's price, maximum speed, and the total miles driven.
// 		console.log('Bike: ' + this.name);
// 		console.log('Price: ' + this.price);
// 		console.log('Max Speed: ' + this.max_speed);
// 		console.log('Total Miles: ' + this.miles);
// 	};
// 	Bike.prototype.drive = function () {
// 		//have it display "Driving" on the screen and increase the total miles driven by 10.
// 		this.miles += 10;
// 		console.log('Driving: ' + this.miles + ' miles');
// 		return this;
// 	};
// 	Bike.prototype.reverse = function () {
// 		// have it display "Reversing" on the screen and decrease the total miles driven by 5.
// 		if (this.miles > 0) {
// 			this.miles -= 5;
// 		}
// 		console.log('Reversing: ' + this.miles + ' miles');
// 		return this;
// 	};
// }
// let bike1 = new Bike('Bike 1', 10, 110);
// let bike2 = new Bike('Bike 2', 20, 120);
// let bike3 = new Bike('Bike 3', 30, 130);
// console.log('==============');
// bike1.drive().drive().drive().reverse().displayInfo();
// console.log('==============');
// bike2.drive().drive().reverse().reverse().displayInfo();
// console.log('==============');
// bike3.reverse().reverse().reverse().displayInfo();
// console.log('==============');

// ================= ES6 ================= //
// class Bike {
// 	constructor(name, price, max_speed) {
// 		this.name = name;
// 		this.price = price;
// 		this.max_speed = max_speed;
// 		this.miles = 0;
// 	}
// 	displayInfo() {
// 		//have this method display the bike's price, maximum speed, and the total miles driven.
// 		console.log('Bike: ' + this.name);
// 		console.log('Price: ' + this.price);
// 		console.log('Max Speed: ' + this.max_speed);
// 		console.log('Total Miles: ' + this.miles);
// 	}
// 	drive() {
// 		//have it display "Driving" on the screen and increase the total miles driven by 10.
// 		this.miles += 10;
// 		console.log('Driving: ' + this.miles + ' miles');
// 		return this;
// 	}
// 	reverse() {
// 		// have it display "Reversing" on the screen and decrease the total miles driven by 5.
// 		if (this.miles > 0) {
// 			this.miles -= 5;
// 		}
// 		console.log('Reversing: ' + this.miles + ' miles');
// 		return this;
// 	}
// }
// let bike1 = new Bike('Bike 1', 10, 110);
// let bike2 = new Bike('Bike 2', 20, 120);
// let bike3 = new Bike('Bike 3', 30, 130);
// console.log('==============');
// bike1.drive().drive().drive().reverse().displayInfo();
// console.log('==============');
// bike2.drive().drive().reverse().reverse().displayInfo();
// console.log('==============');
// bike3.reverse().reverse().reverse().displayInfo();
// console.log('==============');
