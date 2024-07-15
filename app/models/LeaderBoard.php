namespace app\models;

class LeaderBoard
{
    private $scores = [];

    public function addScore($playerName, $score)
    {
        if (!isset($this->scores[$playerName])) {
            $this->scores[$playerName] = 0;
        }
        $this->scores[$playerName] += $score;
    }

    public function getScores()
    {
        arsort($this->scores); // Sort scores in descending order
        return $this->scores;
    }
}
