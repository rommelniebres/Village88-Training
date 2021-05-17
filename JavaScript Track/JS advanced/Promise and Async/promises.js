function emitRandomNumber(counter) {
	return new Promise((resolve, reject) => {
		const max_attempt = 10;
		let random_number = 0;
		setTimeout(() => {
			const error = false;
			if (!error) {
				if (counter <= max_attempt) {
					random_number = Math.floor(Math.random() * 100);
				} else {
					return;
				}
				resolve();
			} else {
				reject('ERROR');
			}
		}, 2000);
	});
}
function Attempt(random_number, counter) {
	if (random_number <= 80) {
		console.log('Attempt #' + counter + '. EmitRandomNumber is called.\n' + '2 seconds have lapsed.\n' + 'Random number generated is ' + random_number + '.');
		console.log('------------');
		return emitRandomNumber((counter += 1)).then(Attempt);
	} else {
		console.log('Attempt #' + counter + '. EmitRandomNumber is called.\n' + '2 seconds have lapsed.\n' + 'Random number generated is ' + random_number + '!!!');
		console.log('------------');
		return;
	}
}
let counter = 1;
let x = emitRandomNumber(counter).then(Attempt);
