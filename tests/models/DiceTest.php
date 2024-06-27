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
