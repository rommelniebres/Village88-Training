$(document).ready(function () {
	let socket 	= io();
	let name 	= prompt('What is your name?');
	/*	DOCU: 	Prompt user for name and check if it
				is valid, emit the new member to the listener new_member
		OWNER: 	ROMMEL
	 */
	if (name == null || name == '') {
		window.location.href = '/';
	} else {
		socket.emit('new_member', name);
	}

	/*	DOCU:	Set the current user name based on the emitted data
				from the server
		OWNER: 	ROMMEL
	 */
	socket.on('current_user', function (name) {
		$('#current_user').html(`<h3>${name}(You)</h3>`);
	});

	/*	DOCU:	Set the current member names based on the emitted data
				from the server
		OWNER: 	ROMMEL
	 */
	socket.on('member_update', function (data) {
		let html_str = '';
		for (let i = 0; i < data.length; i++) {
			html_str += `<p>${data[i].name}</p>`;
			$('#members').html(html_str);
		}
	});

	/*	DOCU:	Draw circles from the emitted data from the server
		OWNER: 	ROMMEL
	 */
	socket.on('circle_update', function (data) {
		$('#play-area').append(data);
	});

	/*	DOCU:	Remove all circle when clear button is clocked
		OWNER: 	ROMMEL
	 */
	socket.on('circle_clear', function (data) {
		$('#play-area p').remove();
	});

	/*	DOCU:	Show others users cursor realtime
		OWNER: 	ROMMEL
	 */
	socket.on('others_cursor', function (data) {
		console.log(data);
		$('.fas').css(`left: ${data.mouseX}px; top:${data.mouseY}px;`);
		$('#cursors').html(
			`<span id='cursor' style='left: ${data.mouseX}px;top:${data.mouseY}px;'>
			<i class="fas fa-mouse-pointer"></i>${data.name}</span>`
		);
	});

	let bgcolor = '#ffe599';

	/*	DOCU:	Listen for click for new Circle
				Create circle and emit to all the connected users
		OWNER: 	ROMMEL
	 */
	$('#play-area').click(function (event) {
		let circle = new Circle();
		circle.get_coordinate(event);
		circle.set_attr(bgcolor);
		socket.emit('new_circle', circle.element.outerHTML);
	});

	/*	DOCU:	Mousemove for users will update other connected users
		OWNER: 	ROMMEL
	 */
	$('#play-area').mousemove(function (event) {
		socket.emit('user_cursor', { name: name, mouseX: event.pageX, mouseY: event.pageY });
	});

	/*	DOCU:	Listen for click for the buttons and get the bgcolor
				from the style property 'background color'
		OWNER: 	ROMMEL
	 */
	$('.btn').click(function (event) {
		event.stopPropagation();
		bgcolor = $(this).css('background-color');
	});

	/*	DOCU:	Listen for click for the button clear remove
				all circle from the play area
		OWNER: 	ROMMEL
	 */
	$('.btn-clear').click(function (event) {
		event.stopPropagation();
		$('#play-area p').remove();
		socket.emit('clear');
	});

	/*	DOCU:	Cirle class for instance of circles 
				created from clicks
		OWNER: 	ROMMEL
	 */
	class Circle {
		constructor() {
			this.element = document.createElement('p');
			this.element.textContent = name;
			this.random_radius = Math.floor(Math.random() * 100) + 10; 
			this.coordinatesX = 0;
			this.coordinatesY = 0;
			this.bgcolor = '#ffe599';
		}
		/*	DOCU:	set property of the circle based on the bg color
			OWNER: 	ROMMEL
	 	*/
		set_attr(bgcolor) {
			this.element.setAttribute('class', 'circle');
			this.element.setAttribute(
				'style',
				`padding: ${this.random_radius}px ;
					left: ${this.coordinatesX - this.random_radius * 1.8}px;
					top: ${this.coordinatesY - this.random_radius * 1.8}px;
					display: block;
					background-color:${bgcolor}`
			);
		}
		/*	DOCU:	set coordinate of circle based on the cursor position
			OWNER: 	ROMMEL
	 	*/
		get_coordinate(e) {
			this.coordinatesX = e.clientX; 
			this.coordinatesY = e.clientY; 
		}
	}
});
