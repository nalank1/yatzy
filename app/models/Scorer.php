namespace app\models;

use app\models\Rule;
use app\models\Leaderboard;

class Scorer
{
    private $rules;
    private $leaderboard;

    public function __construct(Leaderboard $leaderboard)
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
        $this->leaderboard = $leaderboard;
    }

    public function score(Dice $roll, Category $category, $playerName)
    {
        if ($roll->isEmpty()) {
            return 0;
        }

        foreach ($this->rules as $rule) {
            if ($rule->isSupport($category, $roll)) {
                $score = $rule->apply($roll);
                $this->leaderboard->addScore($playerName, $score);
                return $score;
            }
        }

        return 0;
    }
}
