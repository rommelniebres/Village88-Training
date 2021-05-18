// Callback
const callback = (function () {
	let counter = 1;
	function emitRandomNumber() {
		const max_attempt = 10;
		let random_number;
		console.log(`Attempt #${counter}. EmitRandomNumber is called.`);
		setTimeout(function () {
			random_number = Math.floor(Math.random() * 10);
			console.log('2 seconds have lapsed.');
			if (random_number <= 80 && counter < max_attempt) {
				counter++;
				console.log(`Random number generated is ${random_number}.`);
				console.log('------------');
				emitRandomNumber();
			} else {
				console.log(`Random number generated is ${random_number} !!!`);
				console.log('------------');
			}
		}, 2000);
	}
	emitRandomNumber();
})();

// Promises
// const promise = (function () {
// 	let counter = 1;
// 	function emitRandomNumber() {
// 		const max_attempt = 10;
// 		let random_number;
// 		console.log(`Attempt #${counter}. EmitRandomNumber is called.`);
// 		let promise = new Promise(function (resolve, reject) {
// 			setTimeout(function () {
// 				random_number = Math.floor(Math.random() * 100);
// 				console.log('2 seconds have lapsed.');
// 				if (random_number <= 80 && counter < max_attempt) {
// 					counter++;
// 					resolve(`Random number generated is ${random_number}.`);
// 				} else {
// 					reject(`Random number generated is ${random_number} !!!`);
// 				}
// 			}, 2000);
// 		});
// 		promise
// 			.then(function (response) {
// 				console.log(response);
// 				console.log('------------');
// 				emitRandomNumber();
// 			})
// 			.catch(function (response) {
// 				console.log(response);
// 				console.log('------------');
// 			});
// 	}
// 	emitRandomNumber();
// })();

// Async and Await
// const async_await = (async function () {
// 	let counter = 1;
// 	function emitRandomNumber() {
// 		const max_attempt = 10;
// 		let random_number;
// 		console.log(`Attempt #${counter}. EmitRandomNumber is called.`);
// 		setTimeout(async function () {
// 			random_number = Math.floor(Math.random() * 100);
// 			console.log('2 seconds have lapsed.');
// 			if (random_number <= 80 && counter < max_attempt) {
// 				counter++;
// 				console.log(`Random number generated is ${random_number}.`);
// 				console.log('------------');
// 				await emitRandomNumber();
// 			} else {
// 				console.log(`Random number generated is ${random_number} !!!`);
// 				console.log('------------');
// 			}
// 		}, 2000);
// 	}
// 	await emitRandomNumber();
// })();
