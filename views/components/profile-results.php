<section class="profile-history">
    <div class="history-heading">
        <div>
            <p class="profile-eyebrow">Your Achievements</p>
            <h2>Recent Results</h2>
        </div>

        <a href="/highscores" class="history-link">
            Leaderboard &rarr;
        </a>
    </div>

    <?php if (empty($recentScores)): ?>
        <div class="profile-empty">
            <span class="empty-symbol">&#10022;</span>
            <h3>Your journey awaits</h3>
            <p>You haven't recorded any scores yet.</p>

            <a href="/menu" class="profile-button">
                Start Playing
            </a>
        </div>
    <?php else: ?>
        <div class="history-table-wrapper">
            <table class="history-table">
                <thead>
                    <tr>
                        <th>Result</th>
                        <th>Score</th>
                        <th>Time</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($recentScores as $result): ?>
                        <tr>
                            <td>
                                Quiz Result #<?= (int) $result['id'] ?>
                            </td>

                            <td class="result-score">
                                <?= (int) $result['score'] ?>
                            </td>

                            <td>
                                <?= gmdate(
                                    'i:s',
                                    max(0, (int) $result['time'])
                                ) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
</section>