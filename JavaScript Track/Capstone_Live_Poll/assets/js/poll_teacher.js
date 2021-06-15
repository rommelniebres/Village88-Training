$(document).ready(function () {
	/*	DOCU: 	Bootstrap Tooltip Configuration.
		OWNER: 	ROMMEL	*/
	let options = {
		animation: true,
	};
	let element = document.getElementById('restart_icon');
	let tooltip = new bootstrap.Tooltip(element, options);

	let input_field_count = 2;
	$('#question').focus();
	$('.trash').hide();

	/*	DOCU: 	On click(copy_url), this will copy the url into the clipboard of the user.
		OWNER: 	ROMMEL	*/
	$('#copy_url').click(function () {
		let dummy = document.createElement('textarea');
		let url = $('#poll-url').attr('placeholder');
		$('#copy_url').text('Copied');
		document.body.appendChild(dummy);
		dummy.value = url;
		dummy.select();
		document.execCommand('copy');
		document.body.removeChild(dummy);
	});

	/*	DOCU: 	Hover function for the trash icon of the input fields.
		OWNER: 	ROMMEL	*/
	$(document).on('mouseenter', '.input-group', function () {
		if ($(this).find('input').val()) {
			$(this).find('i').show();
		}
	});

	$(document).on('mouseleave', '.input-group', function () {
		$('.trash').hide();
	});

	/*	DOCU: 	Initiate socket connection.
		OWNER: 	ROMMEL	*/
	let socket = io();

	/*	DOCU: 	On every change of the form this function will execute.
				Prepare the data to be emitted to every connected clients.
				Update every client that are connected to the socket.
		OWNER: 	ROMMEL	*/
	$(document).on('keyup', '.option', function () {
		const form = document.querySelector('form');
		const data = Object.fromEntries(new FormData(form).entries());
		socket.emit('poll_update', data);
	});

	/*	DOCU: 	This will remove the specific input field when clicked.
				Update every client that are connected to delete an option.
		OWNER: 	ROMMEL	*/
	$(document).on('click', '.trash', function () {
		input_field_count--;
		$(this).parent().remove();
		socket.emit('delete_option', $(this).siblings('input').attr('name'));
	});

	/*	DOCU: 	This will reset the browser and the database of the server for this
				poll session, this is executed when the teacher wants to create new poll.
		OWNER: 	ROMMEL	*/
	$('#reset').click(function () {
		socket.emit('reset');
	});

	/*	DOCU: 	This will reset the browser and the database of the server for this
				poll session, also it will refresh the browser of all connected clients.
		OWNER: 	ROMMEL	*/
	$('#restart_btn').click(function () {
		socket.emit('restart_poll');
		location.reload();
	});

	/*	DOCU: 	This will add a new option to the poll.
				Update every client that are connected to update every option.
		OWNER: 	ROMMEL	*/
	$('#add_question').click(function () {
		let value = input_field_count + 1;
		input_field_count++;
		let html_str = `
			<div class="input-group">
                <h5 class="mt-2 me-3 pe-1">${value}</h5>
                <input type="text" class="form-control mb-2 option" 
					placeholder="Option ${value}" name="option_${value}">
                <i class="far fa-trash-alt trash"></i>
        	</div>`;
		$(html_str).appendTo('#input-fields:last');
		$('.trash').hide();
		socket.emit('option_update', value);
	});

	/*	DOCU: 	This will change/remove the style and value of selected tags to
				represent the poll is started.
				Update every client that the poll started.
		OWNER: 	ROMMEL	*/
	$(document).on('click', '#submit_btn', function () {
		$('.option').attr('readonly', true);
		$('#add_question').prop('disabled', true);
		$('#submit_btn').toggleClass('btn-danger');
		$('#submit_btn').attr('id', 'share_btn');
		$('.trash').remove();
		$('#add_question').remove();
		let html_str = '<h5>Real-time data</h5>';
		for (let i = 1; i <= $('#input-fields > div').length; i++) {
			html_str += `
				<div class="progress mb-2" style="height: 30px;">
                    <div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" 
						role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" 
						aria-valuemax="100" id="option_${i}">
                        <h6 class='mt-2'>0 Vote</h6>
                    </div>
                </div>`;
		}
		$(html_str).appendTo('#percentage');
		socket.emit('poll_start');
		return false;
	});

	/*	DOCU: 	This shows the modal for creating new poll.
				This will also update all connected clients about
				the result of the poll.
		OWNER: 	ROMMEL	*/
	$(document).on('click', '#share_btn', function () {
		$('#endPollModal').modal('show');
		let result = $('#percentage').clone().html();
		socket.emit('poll_result', result);
		return false;
	});

	/*	DOCU: 	Socket listener for the update of the number of the connected clients.
				Change the value of buttons to show the number of connected clients
		OWNER: 	ROMMEL	*/
	socket.on('student_count', function (count) {
		if ($('#submit_btn')) {
			$('#submit_btn').val(`Start collecting responses(${count} live)`);
		}
		if ($('#share_btn')) {
			$('#share_btn').val(`Stop collecting response and share results(0 voted, ${count} live)`);
		}
	});

	/*	DOCU: 	Socket listener for the update of the number of votes of the clients.
				Change the value of buttons to show the number of votes of the clients
		OWNER: 	ROMMEL	*/
	socket.on('student_vote_teacher', function (data) {
		for (let i in data.votes) {
			let percent = (data.votes[i] / data.votes_num) * 100;
			let option = i.replace('option_', '');
			$(`#${i}`).css('width', `${percent}%`);
			$(`#${i} h6`).text(`Option ${option} | ${Math.round(percent * 100) / 100}% - 
				${data.votes[i]} vote(s)`);
		}
		$('#share_btn').val(`Stop collecting response and share results(${data.votes_num} voted, ${data.students} live)`);
	});
});
