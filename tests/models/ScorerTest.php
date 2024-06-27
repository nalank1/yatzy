<?php

use PHPUnit\Framework\TestCase;
use app\models\Scorer;
use app\models\Dice; // Assuming Dice is a class that represents the dice
use app\models\Category; // Assuming Category is a class or enum that represents scoring categories

class ScorerTest extends TestCase
{
    private $scorer;

    protected function setUp(): void
    {
        $this->scorer = new Scorer();
    }

    public function testScoreOnes()
    {
        $roll = new Dice([1, 2, 1, 4, 5]); // Assuming Dice can be initialized with an array of integers
        $category = new Category('ones'); // Adjust based on actual Category implementation
        $score = $this->scorer->score($roll, $category);
        $this->assertEquals(2, $score); // Example assertion, adjust based on actual rule logic
    }

    public function testScoreTwos()
    {
        $roll = new Dice([1, 2, 1, 2, 5]);
        $category = new Category('twos');
        $score = $this->scorer->score($roll, $category);
        $this->assertEquals(4, $score);
    }

    // Example test for a Yatzy score
    public function testScoreYatzy()
    {
        $roll = new Dice([6, 6, 6, 6, 6]);
        $category = new Category('yahtzee');
        $score = $this->scorer->score($roll, $category);
        $this->assertEquals(50, $score); // Assuming Yahtzee score is 50, adjust based on actual rule logic
    }

    public function testScoreWithEmptyRoll()
    {
        $roll = new Dice([]); // Assuming an empty roll is represented by an empty array
        $category = new Category('ones');
        $score = $this->scorer->score($roll, $category);
        $this->assertEquals(0, $score);
    }
}