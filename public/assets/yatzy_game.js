const Dice = require('./dice.js');

class YatzyGame {
    constructor() {
        this.rollCount = 0;
        this.dice = Array.from({length: 5}, () => new Dice());
        this.keepState = Array(5).fill(false);
    }

    rollDice() {
        if (this.rollCount < 3) {
            this.dice.forEach((die, index) => {
                if (!this.keepState[index]) {
                    die.roll();
                }
            });
            this.rollCount++;
        } else {
            throw new Error('You can only roll the dice 3 times');
        }
    }

    keepDice(index) {
        this.keepState[index] = true;
    }

    resetKeepState() {
        this.keepState.fill(false);
    }

    resetGame() {
        this.rollCount = 0;
        this.resetKeepState();
    }
}

module.exports = YatzyGame;
