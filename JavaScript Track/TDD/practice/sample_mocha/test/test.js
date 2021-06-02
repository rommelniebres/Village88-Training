const chai = require('chai');
const expect = chai.expect;
const UserModel = require('../models/user.model');
describe('Login feature', function () {
	it('data.status should return true if email exists in the database.', async function () {
		let email = 'jrosales@village88.com';

		let userModel = new UserModel();
		let data = await userModel.getUser(email);
		/* Check and expected data.status is equal to true */
		expect(data.status).to.equal(true);
	});
});
