const chai = require('chai');
const expect = chai.expect;
const algorithm = require('../algorithm');

// #1
describe('Sum', function () {
	it('should return the sum of num1 and num2', function () {
		let num1 = 1;
		let num2 = 2;
		let expected_sum = 3;
		let result = algorithm.sum(num1, num2);
		expect(result).to.equal(expected_sum);
	});
});

// #2
describe('Count Down By 8', function () {
	it('should return the countdown from start to end', function () {
		let start = 2019;
		let end = 0;
		let expected_array_length = 253;
		let result = algorithm.countDownBy8(start, end).length;
		expect(result).to.equal(expected_array_length);
	});
});

// #3
describe('Celcius to Fahrenheit', function () {
	it('should return the converted value of celcius to fahtenheit', function () {
		let degree_celcius = 0;
		let expected_fahrenheit = 32;
		let result = algorithm.celciusToFahrenheit(degree_celcius);
		expect(result).to.equal(expected_fahrenheit);
	});
});

// #4
describe('Positive number to "big"', function () {
	it('should return an array with the positive number as the word "big"', function () {
		let arr = [-1, 3, 5, -5];
		let expected_arr = [-1, 'big', 'big', -5];
		let result = algorithm.makeItBig(arr);
		expect(result).deep.to.equal(expected_arr);
	});
});

// #5
describe('Double array values', function () {
	it('should return an array with the double value of each element', function () {
		let arr = [1, 2, 3];
		let expected_arr = [2, 4, 6];
		let result = algorithm.double(arr);
		expect(result).deep.to.equal(expected_arr);
	});
});

// #6
describe('Greater than Y', function () {
	it('should return an array count that is greeater than Y', function () {
		let arr = [2, 3, 5];
		let y = 4;
		let expected_count = 1;
		let result = algorithm.returnArrayCountGreaterThanY(arr, y);
		expect(result).to.equal(expected_count);
	});
});

// #7
describe('Sigma', function () {
	it('should return the sum of all positive integers up to number (inclusive)', function () {
		let num = 3;
		let expected_sigma = 6;
		let result = algorithm.sigma(num);
		expect(result).to.equal(expected_sigma);
	});
});

// #8
describe('Factorial', function () {
	it('should return the factorial of a given number', function () {
		let num = 8;
		let expected_factorial = 40320;
		let result = algorithm.factorial(num);
		expect(result).to.equal(expected_factorial);
	});
});

// #9
describe('Swap toward center', function () {
	it('should return the swapped array (reversed)', function () {
		let arr = [true, 42, 'Ada', 2, 'pizza'];
		let expected_arr_swapped = ['pizza', 2, 'Ada', 42, true];
		let result = algorithm.swapTowardCenter(arr);
		expect(result).deep.to.equal(expected_arr_swapped);
	});
});

// #10
describe('Create threes Fives', function () {
	it(`should return the added values from 1 and n (inclusive) 
		if that value is not divisible by 3 or 5. 
		Return the final sum.`, function () {
		let num = 10;
		let expected_result = 22;
		let result = algorithm.threesFives(num);
		expect(result).to.equal(expected_result);
	});
});
