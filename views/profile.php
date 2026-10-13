
<?php include_once 'inc/gamehead.php'; ?>

<body class="profile-body">
<main class="profile-page">
    <div class="profile-container">

        <a href="/menu" class="profile-back">&larr; Back to Menu</a>

        <header class="profile-header">
            <p class="profile-eyebrow">Middle-earth Archives</p>
            <h1>Player <span>Profile</span></h1>
            <p class="profile-subtitle">
                Your journey through the legends of Middle-earth.
            </p>
        </header>

        <section class="profile-card">
            <div class="profile-avatar">
                <?= htmlspecialchars(
                    strtoupper(substr($user['username'], 0, 1)),
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>
            </div>

            <div class="profile-identity">
                <h2><?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></h2>
                <p><?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?></p>
                <span class="profile-member-since">
                    Member since
                    <?= date('F Y', strtotime($user['created_at'])) ?>
                </span>
            </div>
        </section>

        <section class="profile-stats">
            <article class="profile-stat">
                <span class="stat-label">Games Played</span>
                <p><?= (int) $stats['games_played'] ?></p>
            </article>

            <article class="profile-stat">
                <span class="stat-label">Total Score</span>
                <p><?= (int) $stats['total_score'] ?></p>
            </article>

            <article class="profile-stat">
                <span class="stat-label">Best Score</span>
                <p><?= (int) $stats['best_score'] ?></p>
            </article>
        </section>

        <section class="profile-history">
            <div class="history-heading">
                <div>
                    <p class="profile-eyebrow">Your Achievements</p>
                    <h2>Recent Results</h2>
                </div>
                <a href="/highscores" class="history-link">Leaderboard &rarr;</a>
            </div>

            <?php if (empty($recentScores)): ?>
                <div class="profile-empty">
                    <span class="empty-symbol">&#10022;</span>
                    <h3>Your journey awaits</h3>
                    <p>You haven't recorded any scores yet.</p>
                    <a href="/menu" class="profile-button">Start Playing</a>
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
                                        <?= gmdate('i:s', max(0, (int) $result['time'])) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </section>

        <footer class="profile-footer">
            <span>&#10022;</span>
            Every score tells a story.
            <span>&#10022;</span>
        </footer>

    </div>
</main>
</body>
</html>