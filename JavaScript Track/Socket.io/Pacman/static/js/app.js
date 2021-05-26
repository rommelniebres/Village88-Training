$(document).ready(function () {
	let socket = io();
	let name = prompt('Enter your name');
	if (name === null || name == '') {
		window.location.href = '/';
	} else {
		socket.emit('got_a_new_user', name);
	}
	$('form').submit(function () {
		const form = document.querySelector('form');
		// construct the form data into object type
		const data = Object.fromEntries(new FormData(form).entries());
		// reset the form field by using querySelector function 'reset'
		form.reset();
		socket.emit('posting_form', data);
		return false;
	});

	socket.on('current_user', function (data) {
		$('#current_user').val(data.name);
	});

	socket.on('chat_update', function (data) {
		let html_str = '';
		if (data.length != 0) {
			for (let i = 0; i < data.length; i++) {
				html_str += `<p>${data[i].name} : ${data[i].message}</p>`;
				$('#chat').html(html_str);
			}
		} else {
			$('#chat').html('Empty chat :(');
		}
	});
	let world = [
		[2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
		[2, 0, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1, 3, 2],
		[2, 1, 2, 2, 1, 2, 2, 2, 1, 2, 1, 2, 2, 2, 1, 2, 2, 1, 2],
		[2, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 2],
		[2, 1, 2, 2, 1, 2, 1, 2, 2, 2, 2, 2, 1, 2, 1, 2, 2, 1, 2],
		[2, 1, 1, 1, 1, 2, 1, 1, 1, 2, 1, 1, 1, 2, 1, 1, 1, 1, 2],
		[2, 2, 2, 2, 1, 2, 2, 2, 1, 2, 1, 2, 2, 2, 1, 2, 2, 2, 2],
		[0, 0, 0, 2, 1, 2, 1, 1, 1, 1, 1, 1, 1, 2, 1, 2, 0, 0, 0],
		[2, 2, 2, 2, 1, 2, 1, 2, 2, 1, 2, 2, 1, 2, 1, 2, 2, 2, 2],
		[2, 1, 1, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 2],
		[2, 2, 2, 2, 1, 2, 1, 2, 2, 1, 2, 2, 1, 2, 1, 2, 2, 2, 2],
		[0, 0, 0, 2, 1, 2, 1, 1, 1, 1, 1, 1, 1, 2, 1, 2, 0, 0, 0],
		[2, 2, 2, 2, 1, 2, 2, 2, 1, 2, 1, 2, 2, 2, 1, 2, 2, 2, 2],
		[2, 1, 1, 1, 1, 2, 1, 1, 1, 2, 1, 1, 1, 2, 1, 1, 1, 1, 2],
		[2, 1, 2, 2, 1, 2, 1, 2, 2, 2, 2, 2, 1, 2, 1, 2, 2, 1, 2],
		[2, 1, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1, 1, 2],
		[2, 1, 2, 2, 1, 2, 2, 2, 1, 2, 1, 2, 2, 2, 1, 2, 2, 1, 2],
		[2, 3, 1, 1, 1, 1, 1, 1, 1, 2, 1, 1, 1, 1, 1, 1, 1, 3, 2],
		[2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
	];
	let score = 0;
	let pacman = {
		x: 9,
		y: 9,
	};
	let ghost = {
		x: 1,
		y: 1,
	};
	let direction = 'right';

	function displayWorld() {
		let output = '';

		for (let i = 0; i < world.length; i++) {
			output += "\n<div class='row'>\n";
			for (let j = 0; j < world[i].length; j++) {
				if (world[i][j] == 2) {
					output += "<div class='brick'></div>";
				} else if (world[i][j] == 1) {
					output += "<div class='coin'></div>";
				} else if (world[i][j] == 0) {
					output += "<div class='empty'></div>";
				} else if (world[i][j] == 3) {
					output += "<div class='cherry'></div>";
				}
			}
			output += '\n</div>';
		}
		document.getElementById('world').innerHTML = output;
	}

	function displayPacman() {
		document.getElementById('pacman').style.top = pacman.y * 40 + 'px';
		document.getElementById('pacman').style.left = pacman.x * 40 + 'px';
		document.getElementById('pacman').style.backgroundImage = "url('../images/pacman_" + direction + ".gif')";
	}

	function displayGhost() {
		document.getElementById('ghost').style.top = ghost.y * 40 + 'px';
		document.getElementById('ghost').style.left = ghost.x * 40 + 'px';
	}
	function displayScore() {
		document.getElementById('score').innerHTML = score;
	}
	function gameOver() {
		score = 0;
		document.getElementById('score').innerHTML = score;
		pacman = {
			x: 9,
			y: 7,
		};
		ghost = {
			x: 1,
			y: 1,
		};
	}
	displayWorld();
	displayPacman();
	displayGhost();
	displayScore();
	document.onkeydown = function (e) {
		if ($('#message').is(':focus')) {
			return;
		} else {
			if (e.keyCode == 37 && world[pacman.y][pacman.x - 1] != 2) {
				// Left
				pacman.x--;
				direction = 'left';
			} else if (e.keyCode == 39 && world[pacman.y][pacman.x + 1] != 2) {
				// Right
				pacman.x++;
				direction = 'right';
			} else if (e.keyCode == 38 && world[pacman.y - 1][pacman.x] != 2) {
				// Top
				pacman.y--;
				direction = 'up';
			} else if (e.keyCode == 40 && world[pacman.y + 1][pacman.x] != 2) {
				// Bottom
				pacman.y++;
				direction = 'down';
			}
			//Ghost chase
			if (ghost.x - pacman.x < 0 && world[ghost.y][ghost.x + 1] != 2) {
				//Ghost go right
				ghost.x++;
			} else if (ghost.x - pacman.x > 0 && world[ghost.y][ghost.x - 1] != 2) {
				//Ghost go left
				ghost.x--;
			} else if (ghost.y - pacman.y < 0 && world[ghost.y + 1][ghost.x] != 2) {
				//Ghost go down
				ghost.y++;
			} else if (ghost.y - pacman.y > 0 && world[ghost.y - 1][ghost.x] != 2) {
				//Ghost go up
				ghost.y--;
			}
			if (world[pacman.y][pacman.x] == 1) {
				world[pacman.y][pacman.x] = 0;
				score += 10;
				displayScore();
				displayWorld();
			}
			if (world[pacman.y][pacman.x] == 3) {
				world[pacman.y][pacman.x] = 0;
				score += 20;
				displayScore();
				displayWorld();
			}
			//collide
			if (Math.abs(ghost.x - pacman.x) == 0 && Math.abs(ghost.y - pacman.y) == 0) {
				gameOver();
			}
		}

		displayGhost();
		displayPacman();
	};
});
