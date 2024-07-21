<?php
require_once('_config.php');

// Include necessary files
require '../app/models/Scorer.php';
require '../app/models/Dice.php';
require '../app/models/Category.php';
require '../app/models/Leaderboard.php';

use app\models\Leaderboard;
use app\models\Scorer;
use app\models\Dice;
use app\models\Category;

$action = $_GET['action'] ?? 'version';

switch ($action) {
    case 'roll':
        
        $rolls = array_map(function() {
            return rand(1, 6);
        }, range(1, 5));

        
        $dice = new Dice($rolls);
        
        
        $response = [
            'result' => $rolls,
            'isSmallStraight' => $dice->isSmallStraight(),
            'isLargeStraight' => $dice->isLargeStraight(),
            'fullHouse' => !empty($dice->retrieveFullHouse()) ? $dice->retrieveFullHouse() : 'No full house'
        ];
        break;

    case 'leaderboard':
        
        $leaderboard = new Leaderboard();
        $scorer = new Scorer($leaderboard);

        // Simulate player categories and scoring
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
        $response = ['leaderboard' => $scores];
        break;
    
    case 'version':
    default:
        $response = ['version' => '1.0'];
}

header('Content-Type: application/json');
echo json_encode($response);
