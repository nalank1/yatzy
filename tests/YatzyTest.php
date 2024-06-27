<?php

use PHPUnit\Framework\TestCase;
require 'app\models\Dice.php'; // Adjust the path as necessary

class YatzyTest extends TestCase
{
    public function testConstructorSortsRoll()
    {
        $roll = [5, 3, 1, 4, 2];
        $dice = new app\models\Dice($roll);
        $sortedRoll = $dice->retrieveRoll();
        $this->assertEquals([1, 2, 3, 4, 5], $sortedRoll);
    }

    public function testRetrieveRollReturnsCorrectArray()
    {
        $roll = [2, 4, 1, 3, 5];
        $dice = new app\models\Dice($roll);
        $this->assertEquals([1, 2, 3, 4, 5], $dice->retrieveRoll());
    }

    public function testIsEmptyReturnsTrueForEmptyRoll()
    {
        $dice = new app\models\Dice();
        $this->assertTrue($dice->isEmpty());
    }

    public function testIsEmptyReturnsFalseForNonEmptyRoll()
    {
        $roll = [1, 2, 3];
        $dice = new app\models\Dice($roll);
        $this->assertFalse($dice->isEmpty());
    }
}
//test for category - test it separately

 /* <?php

use PHPUnit\Framework\TestCase;
require 'app\models\Category.php'; 

class YatzyTest extends TestCase
{
    private $category;

    protected function setUp(): void
    {
        $this->category = new Category();
    }

    public function testIsFive()
    {
        $this->assertTrue($this->category->isFive());
    }

    public function testIsSix()
    {
        $this->assertTrue($this->category->isSix());
    }

    public function testIsYatzy()
    {
        $this->assertTrue($this->category->isYatzy());
    }

    public function testIsChance()
    {
        $this->assertTrue($this->category->isChance());
    }

    public function testIsPairCategory()
    {
        $this->assertTrue($this->category->isPairCategory());
    }

    public function testIsThreeOfaKind()
    {
        $this->assertTrue($this->category->isThreeOfaKind());
    }

    public function testIsFourOfaKind()
    {
        
        $this->assertTrue($this->category->isFourOfaKind());
    }
}

<?php

use PHPUnit\Framework\TestCase;
use app\models\Scorer;
use app\models\Dice; // Assuming Dice is a class that represents the roll
use app\models\Category; // Assuming Category is a class or enum that represents scoring categories

class YatzyTest extends TestCase
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

    // Example test for a Yahtzee score
    public function testScoreYahtzee()
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

<?php

use PHPUnit\Framework\TestCase;
use app\models\Scorer;
use app\models\Dice; // Assuming Dice is a class that represents the roll
use app\models\Category; // Assuming Category is a class or enum that represents scoring categories

class YatzyTest extends TestCase
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

    // Example test for a Yahtzee score
    public function testScoreYahtzee()
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
*/



