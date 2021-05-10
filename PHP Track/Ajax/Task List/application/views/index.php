<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tasks Manager</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
		$(document).ready(function(){
			$.get('/tasks/index_html', function(res) {
				$('#tasks').html(res);
			});
			$('form').submit(function(){
				$.post($(this).attr('action'), $(this).serialize(), function(res) {
				$('#tasks').html(res);
				});
            return false;
        	});
		});
    </script>
</head>
<body>
	<h1>List of Tasks:</h1>
	<div id="tasks">
	</div>
	<div id="form">
		<p>Create a New Task:</p>
		<form action="/tasks/create" method="POST">
			<input name="name" id="name" >
			<input type="submit" id="add_task" value="Add Task!"></input>
		</form>
	</div>
</body>
</html>
