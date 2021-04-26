<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Users</title>
	<link rel="stylesheet" href="/assets/css/style.css">
	<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<script>
		/*
		DOCU: This is an ajax for displaying users with
		appropriate post data
		OWNER: Rommel
    	*/
		$(document).ready(function(){
			/*
			DOCU: This is an initial load of the view page
			(display all users)
			OWNER: Rommel
    		*/
			$.get('/users/index_html', function(res) {
			$('table#users').html(res);
			});
			/*
                DOCU: This is an ajax for updating list without buttons
                OWNER: Rommel
            */
            $(document).on("change", "#search", function(e) {
                $.post($(this).attr('action'), $(this).serialize(), function(res) {
                    $('table#users').html(res);
                });
			return false;
			});
		});
    </script>
</head>
<body>
	<!-- DOCU: This is the form for gender and country search OWNER: Rommel -->
	<form id="search" action="/users/search" method="post">
		<input type="checkbox" name="female" value="F"><label for="female">Female</label>
		<input type="checkbox" name="male" value="M"><label for="male">Male</label>
		<select name="country">
			<option value="all" name="country"><label for="all">All countries</label></option>
			<option value="india" name="country"><label for="india">India</label></option>
			<option value="korea" name="country"><label for="korea">Korea</label></option>
			<option value="philippines" name="country"><label for="philippines">Philippines</label></option>
			<option value="u.s.a." name="country"><label for="usa">U.S.A.</label></option>
		</select>
		<input type="hidden" value="Update">
	</form>
	<table id="users">
	</table>
</body>
</html>