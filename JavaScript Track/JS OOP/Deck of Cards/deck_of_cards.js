class Card {
	constructor(suit, rank, value) {
		this.suit = suit;
		this.rank = rank;
		this.value = value;
	}
}
class Deck {
	constructor() {
		this.cards = [];
	}
	create_deck() {
		let suits = ['Hearts', 'Clubs', 'Diamonds', 'Spades'];
		let ranks = ['ace', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'jack', 'queen', 'king'];
		let values = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13];
		for (let i = 0; i < suits.length; i++) {
			for (let j = 0; j < ranks.length; j++) {
				this.cards.push(new Card(suits[i], ranks[j], values[j]));
			}
		}
		return this;
	}
	shuffle_deck() {
		let position_1, position_2, tmp;
		for (let i = 0; i < 1000; i++) {
			position_1 = Math.floor(Math.random() * this.cards.length);
			position_2 = Math.floor(Math.random() * this.cards.length);
			tmp = this.cards[position_1];
			this.cards[position_1] = this.cards[position_2];
			this.cards[position_2] = tmp;
		}
		return this;
	}
	reset() {
		this.cards = [];
		this.create_deck();
		return this;
	}
	deal() {
		let dealt_card = this.cards[0];
		this.cards.shift();
		// this.cards[0] = '';
		return dealt_card;
	}
}
const deck = new Deck();

// Codes for new deck
// let deck_ = deck.create_deck();
// console.log('===================== New Deck =====================');
// console.log(deck_);

// Codes for shuffling the deck
// let shuffled_deck = deck.create_deck().shuffle_deck();
// console.log('===================== Shuffled Deck =====================');
// console.log(shuffled_deck);

// Codes for dealing a card
// let deal = deck.create_deck().shuffle_deck().deal();
// console.log(deal);

// Codes for reset deck
// let reset = deck.reset();
// console.log(reset);
