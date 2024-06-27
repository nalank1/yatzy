<?php


namespace app\models\Rule;


use app\models\Category;
use app\models\Dice;

class ChanceRule implements ScoreRule
{
    /**
     * @param Dice $roll
     * @return integer
     */
    public function apply(Roll $roll)
    {
        return array_sum($roll->retrieveRoll());
    }

    /**
     * @param Category $category
     * @param Roll $roll
     * @return bool
     */
    public function isSupport(Category $category, Dice $roll)
    {
        return $category->isChance();
    }
}