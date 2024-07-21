<?php

require '../app/models/Dice.php';

// Simulate rolling a die
function rollDice($sides = 6, $number = 5) {
    $rolls = [];
    for ($i = 0; $i < $number; $i++) {
        $rolls[] = rand(1, $sides);
    }
    return $rolls;
}

// Roll the dice
$roll = rollDice();
$dice = new \app\models\Dice($roll);

// Prepare response
$response = [
    'result' => $roll,
    'isSmallStraight' => $dice->isSmallStraight(),
    'isLargeStraight' => $dice->isLargeStraight(),
    'fullHouse' => !empty($dice->retrieveFullHouse()) ? $dice->retrieveFullHouse() : 'No full house'
];

// Return the result as JSON
header('Content-Type: application/json');
echo json_encode($response);
