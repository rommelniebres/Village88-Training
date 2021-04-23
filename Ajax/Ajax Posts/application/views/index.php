<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Posts</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
		$(document).ready(function(){
			$.get('/posts/index_html', function(res) {
			$('#posts').html(res);
			});

			$('form').submit(function(){
			$.post($(this).attr('action'), $(this).serialize(), function(res) {
				$('#posts').html(res);
			});
			return false;
			});
		});
    </script>
</head>
<body>
	<h1>My Posts:</h1>
	<div id="posts">
	</div>
	
	<form action="/posts/create" method="POST">
		<textarea name="description" id="description" cols="30" rows="10"></textarea>
		<input type="submit" id="get_all_button" value="Post it!"></input>
	</form>
	
	
</body>
</html>
