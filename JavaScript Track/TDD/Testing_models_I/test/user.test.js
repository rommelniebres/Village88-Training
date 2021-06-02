const chai = require('chai');
const expect = chai.expect;
const UserModel = require('../models/user');
//User Register
describe('User Model Creation', function () {
	it('Given a valid input, it should return true if we successfully create a new user', async function () {
		let params = { first_name: 'Rommel', last_name: 'Niebres', email: 'rommel@gmail.com', password: 'password123' };
		let result = await UserModel.create(params);
		expect(result.success).to.equal(true);
	});
});

describe('User Model Error', function () {
	it('Given a success creation, it should return false if we successfully create a new user without error', async function () {
		let params = { first_name: 'Rommel', last_name: 'Niebres', email: 'rommel@gmail.com', password: 'password123' };
		let result = await UserModel.create(params);
		expect(result.error).to.equal(false);
	});
});

describe('User Model Parameter missing', function () {
	it('Given a failed creation, it should return true if we the parameter sent is incomplete/missing', async function () {
		let params = null;
		let result = await UserModel.create(params);
		expect(result.param_missing).to.equal(true);
	});
});
//User Login
describe('User Model Login', function () {
	it('Given a valid input, it should return true if we successfully login', async function () {
		let params = { email: 'rommel@gmail.com' };
		let result = await UserModel.findByEmail(params);
		expect(result.success).to.equal(true);
	});
});

describe('User Model Error', function () {
	it('Given a incorrect login credentials, it should return false if we tried to login', async function () {
		let params = { email: 'rommel@gmail.com' };
		let result = await UserModel.findByEmail(params);
		expect(result.error).to.equal(false);
	});
});

describe('User Model Parameter missing', function () {
	it('Given a failed login, it should return true if we the parameter sent is incomplete/missing', async function () {
		let params = null;
		let result = await UserModel.findByEmail(params);
		expect(result.param_missing).to.equal(true);
	});
});
