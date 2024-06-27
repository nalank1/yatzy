<?php


namespace app\models\Rule;


use app\models\Category;
use app\models\Dice;

class PairRule implements ScoreRule
{

    /**
     * @param Dice $roll
     * @return integer
     */
    public function apply(Dice $roll)
    {
        return array_sum($roll->retrieveHighestPair());
    }

    /**
     * @param Category $category
     * @param Dice $roll
     * @return bool
     */
    public function isSupport(Category $category, Dice $roll)
    {
        return $category->isPairCategory();
    }
}