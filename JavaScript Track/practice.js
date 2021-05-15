class World {
	constructor(num) {
		this.num = num;
		let cities = [];
		this.cities = cities;
		for (let i = 0; i < num; i++) {
			this.cities.push(new City());
		}
	}
	add_city(name) {
		return this.cities.push(new City(name));
	}
	random_city() {
		let random_city_name = new City();
		return random_city_name;
	}
	total_cities() {
		return this.cities.length;
	}
}

class City {
	constructor(name) {
		let citizens = [];
		this.citizens = citizens;
		for (let i = 0; i < 50; i++) {
			this.add_citizen();
		}
		if (name) {
			this.name = name;
		} else {
			this.name = '';
			let characters = 'abcdefghijklmnopqrstuvwxyz';
			let length = 5;
			for (let i = 0; i < length; i++) {
				this.name += characters.charAt(Math.floor(Math.random() * length));
			}
			return this.name;
		}
	}
	add_citizen() {
		return this.citizens.push(new Citizen());
	}
}

class Citizen {
	constructor() {
		this.age = Math.floor(Math.random() * 100);
	}
}

//create a world with 100 cities
let world = new World(100);

//adds a new city called 'hackerhero'
world.add_city('hackerhero');

//should pull out a random city object within the world and log its value
console.log('Random city name: ', world.random_city().name);

//should pull out a random city object within the world and log its value
console.log('Age of first citizen in another random city: ', world.random_city().citizens[0]);

//should log 101 as there are 101  cities now
console.log('# of Cities: ', world.total_cities());
let world2 = new World(50);
console.log(world.cities.length);
