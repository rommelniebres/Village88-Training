// 1
const sum = function (a, b) {
	return a + b;
};
function perform_operation(num1, num2, operation) {
	let result = operation(num1, num2);
	return result;
}
let a = perform_operation(3, 5, sum);
console.log('result is', a);
//2
function hello_sum(a, b) {
	return function () {
		console.log('hello');
		return a + b + 10;
	};
}
let result = hello_sum(5, 10);
console.log(result());
//3
const addition = function (a, b) {
	return a + b;
};
const difference = function (a, b) {
	return a - b;
};
function random_operation(num1, num2, operation, operation2) {
	let result = [operation(num1, num2), operation2(num1, num2)];
	let chosen_function = Math.floor(Math.random() * 2);
	return result[chosen_function];
}
let b = random_operation(3, 5, addition, difference);
console.log('result is', b);
