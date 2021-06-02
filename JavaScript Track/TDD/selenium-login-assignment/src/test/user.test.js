const chai = require('chai');
const expect = chai.expect;
const { Builder, By, Capabilities } = require('selenium-webdriver');
const UserModel = require('../models/user.model');

const caps = new Capabilities();
caps.setPageLoadStrategy('normal');

let driver;

describe('Login feature', function () {
	this.timeout(30000);
	it('Some test here', async function () {
		try {
			driver = await new Builder().withCapabilities(caps).forBrowser('chrome').usingServer('http://selenium_chrome:4444/wd/hub').build();
			// Navigate to Url
			await driver.get('http://web_app:3000');
			// await driver.manage().window().setRect(1363, 1417);
			let email = await driver.findElement(By.css('#email')).sendKeys('test@testuser.com');
			let password = await driver.findElement(By.css('#password')).sendKeys('password123');
			let form = await driver.findElement(By.css('#login_form'));
			form.submit();
			let user = await UserModel.getUser('testuser@test.com');
			if (!user) {
				expect(user.message).to.equal('No user found');
			} else {
				expect(user.status).to.equal(true);
				expect(user.result).to.have.all.keys('id', 'name', 'email', 'password');
			}
			console.log('runninggggggggggggggggggggg');
		} catch (e) {
			console.log(e);
			throw new Error('error');
		} finally {
			if (driver) {
				await driver.quit();
			}
		}
	});
});
