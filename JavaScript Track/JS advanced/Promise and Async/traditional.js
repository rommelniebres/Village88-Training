function emitRandomNumber(callback, counter) {
	const max_attempt = 10;
	let random_number = 0;
	setTimeout(() => {
		if (counter <= max_attempt) {
			random_number = Math.floor(Math.random() * 100);
			callback(random_number, counter);
		} else {
			return;
		}
	}, 2000);
}
function Attempt(random_number, counter) {
	if (random_number <= 80) {
		console.log('Attempt #' + counter + '. EmitRandomNumber is called.\n' + '2 seconds have lapsed.\n' + 'Random number generated is ' + random_number + '.');
		console.log('------------');
		return emitRandomNumber(Attempt, (counter += 1));
	} else {
		console.log('Attempt #' + counter + '. EmitRandomNumber is called.\n' + '2 seconds have lapsed.\n' + 'Random number generated is ' + random_number + '!!!');
		console.log('------------');
		return;
	}
}
let counter = 1;
emitRandomNumber(Attempt, counter);
