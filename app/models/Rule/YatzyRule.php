<?php


namespace app\models\Rule;


use app\models\Category;
use app\models\Dice;

class YatzyRule implements ScoreRule
{

    /**
     * @param Dice $roll
     * @return integer
     */
    public function apply(Dice $roll)
    {
        return 50;
    }

    /**
     * @param Category $category
     * @param Dice $roll
     * @return bool
     */
    public function isSupport(Category $category, Dice $roll)
    {
        return $category->isYahtzee() && $roll->retrieveRoll() === [1, 2, 3, 4, 5, 6];
    }
}