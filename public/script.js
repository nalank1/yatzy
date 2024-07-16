document.addEventListener('DOMContentLoaded', () => {
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

    fetchLeaderboard();
});
