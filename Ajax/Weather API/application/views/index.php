<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Weather</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
	/*	DOCU: This section of jquery is to append to the div named location
		it shows the temperature without reloading the page
		it also consist of mathematical conversion of temperature so that
		the output will be in fahrenheit.
		OWNER: Rommel
	*/
	$(document).ready(function() {
		$('form').submit(function(e) {
			e.preventDefault();
			$('.location').html("");
			var location = $('#location').val();
			$.post("weathers/weather_check", {location:location}, function(data){
				$.get(data, function(locations){
					$temperature =  Math.round(((((locations.main.temp)-273.15)*9)/5) + 32);
					$(".location").append('<h2>Fahrenheit Temperature in '+ location + 
					' is '+ $temperature +'</h2>');
					})
			});
			$('#location').val("");
			return false;
		});
	});
	
	</script>
</head>
<body>
	<!-- FORM for submitting location for getting temperature -->
	<form action="/weathers/weather_check" method="post">
		<label for="location">Location:</label>
		<input id="location" name="location" type="text">
		<input type="submit" value="Get Temperature!">
	</form>
	<div class="location">
	</div>
</body>
</html>
