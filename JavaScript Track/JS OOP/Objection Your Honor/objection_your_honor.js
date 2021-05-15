class Person {
	constructor(name, age) {
		this.name = name;
		this.age = age;
	}
}
class Defendant extends Person {
	constructor(name, age) {
		super(name, age);
		this.case = '';
	}
}
class Prosecutor extends Person {
	constructor(name, age) {
		super(name, age);
	}
	prosecute(defendant, _case) {
		defendant.case = _case;
		console.log('Name: ' + defendant.name);
		console.log('Age: ' + defendant.age);
		console.log('Case Title: ' + defendant.case.title);
	}
}
class Case {
	constructor(title, years, months, days, min_age, max_age) {
		this.title = title;
		this.min_age = min_age;
		this.max_age = max_age;
		this.realease_date = this.compute_release_date(years, months, days);
	}
	compute_release_date(years, months, days) {
		let date = new Date();
		let year = date.getFullYear() + years;
		let month = date.getMonth() + 1 + months;
		let day = date.getDate() + days;
		let month_lists = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
		let selected_month = month_lists[month];
		return selected_month + ' ' + day + ', ' + year;
	}
}
class TrialCourt {
	initiate_trial(defendant, prosecutor) {
		console.log('Filed by: ' + prosecutor.name);
		this.get_verdict(defendant.case.min_age, defendant.case.max_age, defendant.age, defendant);
	}
	get_verdict(min_age, max_age, age, defendant) {
		if (min_age > age || max_age < age) {
			console.log('Verdict: NOT GUILTY');
			console.log('===========================================');
		} else {
			console.log('Verdict: GUILTY');
			console.log('Release date:  ' + defendant.case.realease_date);
		}
	}
}
// let’s say imprisonment term for this case is 3 years, 3 months, 3 days
// and the age of someone that can be convicted is within 18 to 75 years old.
let _case = new Case('Malicious Mischief', 3, 3, 3, 18, 75);
let prosecutor = new Prosecutor('John', 30);
let defendant1 = new Defendant('Girlie', 5);
let trial = new TrialCourt();
prosecutor.prosecute(defendant1, _case);
trial.initiate_trial(defendant1, prosecutor);
/*
    Name: Girlie
    Age: 5 years old
    Case Title: Malicious Mischief
    Filed by: John
    Verdict: NOT GUILTY
*/
let defendant2 = new Defendant('Onel', 25);
let trial2 = new TrialCourt();
prosecutor.prosecute(defendant2, _case);
trial2.initiate_trial(defendant2, prosecutor);
// let’s say today is December 17, 2020
/*
    Name: Onel
    Age: 25 years old
    Case Title: Malicious Mischief
    Filed by: John
    Verdict: GUILTY	
    Release date:  March 21, 2024 
*/
