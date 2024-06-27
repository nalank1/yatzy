<?php

namespace app\models;

use app\models\Rule;

class Scorer
{
    /**
     * @var Rule\ScoreRule[]
     */
    private $rules;

    /**
     * Scorer constructor.
     */
    public function __construct()
    {
        $this->rules = [
            new Rule\OnesRule(),
            new Rule\TwosRule(),
            new Rule\ThreesRule(),
            new Rule\FoursRule(),
            new Rule\FivesRule(),
            new Rule\SixesRule(),
            new Rule\YatzyRule(),
            new Rule\ChanceRule(),
            new Rule\PairRule(),
            new Rule\FourEqualsRule(),
            new Rule\SmallStraightRule(),
            new Rule\LargeStraightRule(),
            new Rule\FullHouseRule(),
        ];
    }


    /**
     * @param $roll Dice
     * @param $category Category
     * @return int
     */
    public function score(Dice $roll, Category $category)
    {
        if ($roll->isEmpty()) {
            return 0;
        }

        foreach ($this->rules as $rule) {
            if ($rule->isSupport($category, $roll)) {
                return $rule->apply($roll);
            }
        }

        return 0;
    }
}