class Algorithm {
	sum(num1, num2) {
		let result = num1 + num2;
		return result;
	}
	countDownBy8(start, end) {
		let arr = [];
		while (start > end) {
			arr.push(start);
			start -= 8;
		}
		return arr;
	}
	celciusToFahrenheit(cDegrees) {
		let Fahrenheit = (9 / 5) * cDegrees + 32;
		return Fahrenheit;
	}
	makeItBig(arr) {
		for (let i = 0; arr.length > i; i++) {
			if (arr[i] > 0) {
				arr[i] = 'big';
			}
		}
		return arr;
	}
	double(arr) {
		for (let i = 0; arr.length > i; i++) {
			arr[i] *= 2;
		}
		return arr;
	}
	returnArrayCountGreaterThanY(arr, y) {
		let counter = 0;
		for (let i = 0; arr.length > i; i++) {
			if (arr[i] > y) {
				counter++;
			}
		}
		return counter;
	}
	sigma(num) {
		let sum_positive = 0;
		for (let i = 0; num >= i; i++) {
			sum_positive += i;
		}
		return sum_positive;
	}
	factorial(num) {
		let factor = 1;
		for (let i = 1; num >= i; i++) {
			factor *= i;
		}
		return factor;
	}
	swapTowardCenter(arr) {
		return arr.reverse();
	}
	threesFives(num) {
		let sum = 0;
		for (let i = 1; num >= i; i++) {
			if (i % 3 != 0 && i % 5 != 0) sum += i;
		}
		return sum;
	}
}
module.exports = new Algorithm();
