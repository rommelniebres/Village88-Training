const express = require('express');
const PORT = require('./config').settings.PORT;
const app = express();
const router = require('./routes');
const path = require('path');

app.use(express.static(path.join(__dirname, 'assets')));
app.use(express.urlencoded({ extended: true }));
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

app.use('/', router);
app.use('/result', router);
app.listen(PORT, function () {
	console.log(`Server listening on port ${PORT}`);
});
