<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Direction</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
	$(document).ready(function() {
		// $(".direction").hide();
		$('form').submit(function(e) {
			e.preventDefault();
			$('.direction').html("");
			var origin = $('#origin').val();
			var destination = $('#destination').val();
			$.post("maps/direction", {origin:origin, destination:destination}, function(data){
				$.get(data, function(directions){
					$(".direction").append('<h2>Direction from '+ origin + ' to ' +destination+ '</h2>');
					directions.route.legs[0].maneuvers.forEach( item => {
						$(".direction").fadeIn();
						$(".direction").append('<li>'+ item.narrative+ '</li>');
					})
				});
			});
			$('#origin').val("");
			$('#destination').val("");
			return false;
		});
	});
	
	</script>
</head>
<body>
	<form action="/maps/direction" method="post">
		<label for="origin">From:</label>
		<input id="origin" name="origin" type="text">
		<label for="destination">To:</label>
		<input id="destination" name="destination" type="text">
		<input type="submit" value="Get Directions!">
	</form>

	<div class="direction">
	</div>
</body>
</html>
