// Include necessary files
require 'app/models/Scorer.php';
require 'app/models/Dice.php';
require 'app/models/Category.php';
require 'app/models/Leaderboard.php';

use app\models\Leaderboard;
use app\models\Scorer;
use app\models\Dice;
use app\models\Category;

// Instantiate the leaderboard
$leaderboard = new Leaderboard();

// Instantiate the scorer with the leaderboard
$scorer = new Scorer($leaderboard);

// Example players and their rolls
$players = [
    'Player1' => [1, 2, 3, 4, 5],
    'Player2' => [2, 2, 2, 2, 5],
    'Player3' => [3, 3, 3, 4, 4]
];

// Example categories for the rolls
$categories = [
    'Player1' => Category::smallStraight(),
    'Player2' => Category::fourOfaKind(),
    'Player3' => Category::fullHouse()
];

// Score the rolls and update the leaderboard
foreach ($players as $playerName => $roll) {
    $diceRoll = new Dice($roll);
    $category = $categories[$playerName];
    $scorer->score($diceRoll, $category, $playerName);
}

// Get and display the leaderboard
$scores = $leaderboard->getScores();
print_r($scores);
