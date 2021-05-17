class Mathlib {
	add(num1, num2) {
		console.log('the sum is:', num1 + num2);
	}
	multiply(num1, num2) {
		console.log('the product is:', num1 * num2);
	}
	square(num) {
		console.log('the square is:', num * num);
	}
	random(num1, num2) {
		console.log('the random number is:', Math.floor(Math.random() * num2) + num1);
	}
}
module.exports = Mathlib;
