const express = require('express');
const router = express.Router();
const Users = require(`../controllers/Students`);
const UsersController = new Users();

router.get('/', UsersController.index);
// router.post('/login', UsersController.login_validation);
router.post('/register', UsersController.register_validation);
router.get('/profile', UsersController.profile);
module.exports = router;
