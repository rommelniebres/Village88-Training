const express = require('express');
const app = express();
const path = require('path');
const port = 8000;

app.use(express.urlencoded({ extended: true }));
app.use(express.static(path.join(__dirname, 'assets')));
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
require('./routes.js')(app);
app.listen(port);
