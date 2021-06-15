$(document).ready(function () {
	/*	DOCU: 	Initiate socket connection.
				Initially emit a new student to the server.
		OWNER: 	ROMMEL	*/
	let socket = io();
	socket.emit('new_student');

	/*	DOCU: 	Socket listener for incoming update of the poll 
				options and questions.
				Manipulate the html based on the teacher questions and 
				options logic.
		OWNER: 	ROMMEL	*/
	socket.on('poll_update_student', function (data) {
		if (data.question == '') {
			$('#question').text('Question is currently being done');
		} else {
			$('#question').html(data.question);
		}
		delete data.question;
		for (let i in data) {
			console.log(i);
			if (data[i] != '') {
				$(`#${i}`).html(data[i]);
			} else {
				let option_num = i.replace('option_', '');
				$(`#${i}`).html(`Option ${option_num}`);
			}
		}
	});

	/*	DOCU: 	Socket listener for incoming update of the poll 
				options.
		OWNER: 	ROMMEL	*/
	socket.on('option_update_student', function (value) {
		let html_str = `<div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1" id="option_${value}">
                                Option ${value}
                            </label>
                        </div>`;
		$(html_str).appendTo('#options-field:last');
	});

	/*	DOCU: 	Socket listener for update in deleting options.
		OWNER: 	ROMMEL	*/
	socket.on('delete_option_student', function (value) {
		$(`#${value}`).parent().remove();
	});

	/*	DOCU: 	Socket listener for enabling the student to start
				answering the poll.
		OWNER: 	ROMMEL	*/
	socket.on('poll_start_student', function () {
		$(`#submit_btn`).prop('disabled', false);
		$(`#submit_btn`).attr('value', 'submit');
	});

	/*	DOCU: 	Socket listener for showing the result of the survery.
		OWNER: 	ROMMEL	*/
	socket.on('poll_result_student', function (data) {
		$(`#submit_btn`).remove();
		$('input').attr('disabled', true);
		$(`#percentage`).html(data);
	});

	/*	DOCU: 	Socket listener for restarting the students poll.
		OWNER: 	ROMMEL	*/
	socket.on('restart_poll_student', function () {
		location.reload();
	});

	/*	DOCU: 	This will submit the option that has been chosen by the student.
				This also manipulate the view and tags of the students.
		OWNER: 	ROMMEL */
	$('form').on('submit', function (e) {
		let option = $('.form-check-input:checked').siblings('label').attr('id');
		if (!option) {
			alert('Please choose vote');
		} else {
			socket.emit('student_vote', option);
			$(`#submit_btn`).prop('disabled', true);
			$(`#submit_btn`).prop('value', 'Please wait for the teacher to share the result.');
			$(`#submit_btn`).prop('class', 'btn btn-success px-5 d-block mx-auto ');
		}
		return false;
	});
});
