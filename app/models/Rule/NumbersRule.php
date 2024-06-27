<?php


namespace app\models\Rule;


use app\models\Dice;

abstract class NumbersRule implements ScoreRule
{
    private $number;

    /**
     * NumbersRule constructor.
     * @param $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    public function apply(Dice $roll)
    {
        return array_sum($roll->retrieveDicesOfNumber($this->number));
    }
}