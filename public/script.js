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
