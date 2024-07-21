<?php
require_once('_config.php');

$GLOBALS["appDir"] = resolve_path("app");

function resolve_path($name)
{
    if ($name == ".")
    {
        $publicRoot = $_SERVER["DOCUMENT_ROOT"] . "/..";
        $appRoot = $_SERVER["DOCUMENT_ROOT"];
    }
    else if ($_SERVER["DOCUMENT_ROOT"] != "")
    {
        $publicRoot = $_SERVER["DOCUMENT_ROOT"] . "/../$name";
        $appRoot = $_SERVER["DOCUMENT_ROOT"] . "/$name";
    }
    else
    {
        return "../{$name}";
    }

    return file_exists($publicRoot) ? realpath($publicRoot) : realpath($appRoot);
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roll the Dice</title>
    <script src="script.js" defer></script>
</head>
<body>
    <div id="output">--</div>
    <button id="version">Version</button>
    <button id="roll">Roll the Dice</button>
    <div id="leaderboard-container">
        <h2>Leaderboard</h2>
        <ul id="leaderboard"></ul>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const rollButton = document.getElementById('roll');
            rollButton.addEventListener('click', async () => {
                try {
                    const response = await fetch('roll.php');
                    const data = await response.json();
                    
                    if (response.ok) {
                        const resultText = `You rolled: ${data.result.join(', ')}<br>
                            Small Straight: ${data.isSmallStraight ? 'Yes' : 'No'}<br>
                            Large Straight: ${data.isLargeStraight ? 'Yes' : 'No'}<br>
                            Full House: ${data.fullHouse}`;
                        
                        document.getElementById('output').innerHTML = resultText;
                        fetchLeaderboard(); // Update the leaderboard
                    } else {
                        console.error('Error rolling the dice:', data.message);
                    }
                } catch (error) {
                    console.error('Error fetching dice roll result:', error);
                }
            });

            async function fetchLeaderboard() {
                try {
                    const response = await fetch('api.php');
                    const data = await response.json();

                    const leaderboard = document.getElementById('leaderboard');
                    leaderboard.innerHTML = '';

                    data.leaderboard.forEach(player => {
                        const li = document.createElement('li');
                        li.textContent = `${player.name}: ${player.score}`;
                        leaderboard.appendChild(li);
                    });
                } catch (error) {
                    console.error('Error fetching leaderboard:', error);
                }
            }

            fetchLeaderboard(); // Initial fetch to display the leaderboard
        });
    </script>
</body>
</html>