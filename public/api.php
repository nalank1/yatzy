<?php
require_once('_config.php');
header('Content-Type: application/json');
echo json_encode(["version" => "0.9"]);

// Include necessary files
require '../app/models/Scorer.php';
require '../app/models/Dice.php';
require '../app/models/Category.php';
require '../app/models/Leaderboard.php';

use app\models\Leaderboard;
use app\models\Scorer;
use app\models\Dice;
use app\models\Category;


$leaderboard = new Leaderboard();


$scorer = new Scorer($leaderboard);


$players = [
    'Player1' => [1, 2, 3, 4, 5],
    'Player2' => [2, 2, 2, 2, 5],
    'Player3' => [3, 3, 3, 4, 4]
];


$categories = [
    'Player1' => Category::smallStraight(),
    'Player2' => Category::fourOfaKind(),
    'Player3' => Category::fullHouse()
];

foreach ($players as $playerName => $roll) {
    $diceRoll = new Dice($roll);
    $category = $categories[$playerName];
    $scorer->score($diceRoll, $category, $playerName);
}


$scores = $leaderboard->getScores();


echo json_encode(['leaderboard' => $scores]);
