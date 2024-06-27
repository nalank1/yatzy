<?php


namespace app\models\Rule;


use app\models\Category;
use app\models\Dice;

class LargeStraightRule implements ScoreRule
{

    /**
     * @param Dice $roll
     * @return integer
     */
    public function apply(Dice $roll)
    {
        return $roll->isLargeStraight() ? 20 : 0;
    }

    /**
     * @param Category $category
     * @param Dice $roll
     * @return bool
     */
    public function isSupport(Category $category, Dice $roll)
    {
        return $category->isCategory(11);
    }
}