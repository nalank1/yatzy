<?php


namespace app\models\Rule;


use app\models\Category;
use app\models\Dice;

class OnesRule extends NumbersRule
{
    public function __construct()
    {
        parent::__construct(1);
    }

    /**
     * @param Category $category
     * @param Dice $roll
     * @return bool
     */
    public function isSupport(Category $category, Dice $roll)
    {
        return $category->isOne();
    }
}