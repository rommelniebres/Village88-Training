<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Notes</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
		/*
			DOCU: This is an ajax in creating new note
			OWNER: Rommel
    	*/
		$(document).ready(function(){
			$.get('/notes/index_html', function(res) {
			$('#notes').html(res);
			});
			$('form#create').submit(function(){
			$.post($(this).attr('action'), $(this).serialize(), function(res) {
				$('#notes').html(res);
			});
			return false;
			});
		});
    </script>
</head>
<body>
	<h1>Notes</h1>
	<div id="notes">
	</div>
	
	<form id="create" action="/notes/create" method="POST">
		<h3>Add Note</h3>
		<input type='text' name='title' placeholder="Insert note title here..">
		<textarea name='description' placeholder="Enter description here.."></textarea>
		<input type='submit' value="Add Note!">
	</form>
	
	
</body>
</html>
