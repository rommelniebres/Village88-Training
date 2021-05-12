function battle() {
	for (let i = 1; i <= 10; i++) {
		console.log('===Round ' + i + '===');
		ninja1.attack();
		ninja2.attack();
		console.log('--------------------------------------------------------------------------------------------');
	}
}
var ninja1 = {
	hp: 100,
	strength: 15,
	attack: function () {
		let damage = Math.floor(Math.random() * this.strength);
		let ninja2_new_hp = ninja2.hp - damage;
		ninja2.hp = ninja2_new_hp;
		let result = 'Ninja1 attacks Ninja2 and does a damage of ' + damage + '! Ninja1 health: ' + this.hp + '  Ninja2 health: ' + ninja2_new_hp;
		console.log(result);
	},
};
var ninja2 = {
	hp: 150,
	strength: 10,
	attack: function () {
		let damage = Math.floor(Math.random() * this.strength);
		let ninja1_new_hp = ninja1.hp - damage;
		ninja1.hp = ninja1_new_hp;
		let result = 'Ninja2 attacks Ninja1 and does a damage of ' + damage + '! Ninja1 health: ' + ninja1_new_hp + '  Ninja2 health: ' + this.hp;
		console.log(result);
	},
};
battle();
const winner = ninja1.hp > ninja2.hp ? 'Ninja1 WINS!!!!!' : 'Ninja2 WINS!!!!!';
console.log(winner);
