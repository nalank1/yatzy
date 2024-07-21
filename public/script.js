document.addEventListener('DOMContentLoaded', () => {
    const output = document.getElementById('output');
    const version = document.getElementById('version');
    const rollButton = document.getElementById('roll');

    // Fetch version information
    version.onclick = function(e) {
        const xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState === XMLHttpRequest.DONE) {
                if (xmlhttp.status === 200) {
                    output.innerHTML = xmlhttp.responseText;
                } else {
                    console.error('Error fetching version info:', xmlhttp.statusText);
                }
            }
        };

        xmlhttp.open('GET', '/api.php', true);
        xmlhttp.send();
    };

    // Roll dice and update leaderboard
    rollButton.addEventListener('click', async () => {
        try {
            const response = await fetch('roll.php');
            const data = await response.json();

            if (response.ok) {
                const resultText = `You rolled: ${data.result.join(', ')}<br>
                    Small Straight: ${data.isSmallStraight ? 'Yes' : 'No'}<br>
                    Large Straight: ${data.isLargeStraight ? 'Yes' : 'No'}<br>
                    Full House: ${data.fullHouse}`;
                
                output.innerHTML = resultText;
                fetchLeaderboard(); // Update the leaderboard
            } else {
                console.error('Error rolling the dice:', data.message);
            }
        } catch (error) {
            console.error('Error fetching dice roll result:', error);
        }
    });

    // Fetch and display the leaderboard
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

    // Initial fetch to display the leaderboard
    fetchLeaderboard();
});
