module.exports = function (request, response) {
	const fs = require('fs');
	console.log('Request', request.url);
	let url = request.url;

	if (url.includes('/images/')) {
		fs.readFile(`.${request.url}`, function (errors, contents) {
			response.writeHead(200, { 'Content-Type': 'image/jpg' }); // send data about response
			response.write(contents); //  send response body
			response.end(); // finished!
		});
	} else if (url.includes('/stylesheets/')) {
		fs.readFile(`.${request.url}`, function (errors, contents) {
			response.writeHead(200, { 'Content-Type': 'text/css' });
			response.write(contents);
			response.end();
		});
	} else {
		fs.readFile(`view${request.url}.html`, function (errors, contents) {
			if (errors) {
				response.writeHead(404);
				response.end('File not found!!!');
			} else {
				response.writeHead(200, { 'Content-Type': 'text/html' });
				response.write(contents);
				response.end();
			}
		});
	}
};
