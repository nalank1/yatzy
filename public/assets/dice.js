class Dice{
    constructor(sides = 6){
        this.sides = sides;
        this.rollResult = 0;
    }

    roll(){
        this.rollResult = Math.floor(Math.random() * this.sides) + 1;
        return this.rollResult;
    }
}

module.exports = Dice;