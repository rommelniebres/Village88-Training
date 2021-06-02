const chai = require('chai');
const expect = chai.expect;
const UserModel = require('../models/user.model');

describe('Login feature', function () {
	describe('User Model', function () {
		it('Given email and password as input, it should return user info (including password) when the email is found in the database', async function () {
			let params = { email: 'testuser@test.com', password: 'password123' };
			let result = await UserModel.findByEmail(params.email);
			expect(result.credentials).to.eql(params);
		});
		it("Given email and password as input, it should return false when email doesn't exist in database.", async function () {
			let params = { email: 'testuser_fake@test.com', password: 'password123' };
			let result = await UserModel.findByEmail(params);
			expect(result.is_exist).to.equal(false);
		});

		it('Given email and password as input, it should return true when email and password is correct', async function () {
			let params = { email: 'testuser@test.com', password: 'password123' };
			let result = await UserModel.findByEmail(params.email);
			expect(result.is_exist).to.equal(true);
		});

		it('Given email and password as input, it should return the expected redirect_url (/success page) on success', async function () {
			let params = { email: 'testuser@test.com', password: 'password123' };
			let result = await UserModel.findByEmail(params.email);
			expect(result.redirect).to.equal('/success');
		});

		it('Given password as input, it should return an error message saying: Email is required, when email is missing', async function () {
			let params = { email: '', password: 'password123' };
			let result = await UserModel.findByEmail(params);
			expect(result.error).to.equal('Email is required');
		});

		it('Given email as input, it should return an error message saying: Password is required, when password is missing', async function () {
			let params = { email: 'testuser@test.com', password: '' };
			let result = await UserModel.findByEmail(params);
			expect(result.error).to.equal('Password is required');
		});

		it('Given empty input, it should return an error message saying: Email and password is required, when all fields are missing', async function () {
			let params = { email: '', password: '' };
			let result = await UserModel.findByEmail(params);
			expect(result.error).to.equal('Email and password is required');
		});
	});
});
