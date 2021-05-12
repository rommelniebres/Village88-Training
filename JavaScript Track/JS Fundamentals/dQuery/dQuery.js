function $query() {
	document.querySelectorAll('h1').forEach(function (item) {
		item.addEventListener('click', function (event) {
			event.preventDefault();
			console.log('h1 is clicked');
			item.style.display = 'none';
		});
	});
	document.querySelectorAll('p').forEach(function (item) {
		item.addEventListener('click', function () {
			console.log('p is clicked');
			document.querySelectorAll('p').forEach(function (p) {
				p.style.display = 'none';
			});
		});
	});
	let show_all = document.querySelector('#show_all');
	show_all.addEventListener('click', function (event) {
		console.log('#show_all is clicked');
		document.querySelectorAll('p').forEach(function (p) {
			p.style.display = 'block';
		});
		document.querySelectorAll('h1').forEach(function (p) {
			p.style.display = 'block';
		});
	});
	let hide_all = document.querySelector('#hide_all');
	hide_all.addEventListener('click', function (event) {
		console.log('#hide_all is clicked');
		console.log('event passed to the callback function is', event);
		document.querySelectorAll('p').forEach(function (p) {
			p.style.display = 'none';
		});
		document.querySelectorAll('h1').forEach(function (p) {
			p.style.display = 'none';
		});
	});
}
