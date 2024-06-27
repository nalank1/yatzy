<?php


namespace app\models\Rule;


use app\models\Category;
use app\models\Dice;

interface ScoreRule
{
    /**
     * @param Dice $roll
     * @return integer
     */
    public function apply(Dice $roll);

    /**
     * @param Category $category
     * @param Dice $roll
     * @return bool
     */
    public function isSupport(Category $category, Dice $roll);
}