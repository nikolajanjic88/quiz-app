<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard | Silmarillion</title>

    <link rel="stylesheet" href="/css/highscore.css">
</head>

<body class="scoreboard-page">

    <main class="scoreboard-container">

        <header class="score-header">
            <p class="score-eyebrow">The Chronicles of Middle-earth</p>

            <h1>Hall of <span>Legends</span></h1>

            <p class="score-subtitle">
                The bravest minds shall be remembered.
            </p>

            <div class="score-divider">
                <span>✦</span>
            </div>
        </header>

        <section class="leaderboard-panel">

            <div class="leaderboard-heading">
                <div>
                    <p class="panel-eyebrow">The Great Hall</p>
                    <h2>Leaderboard</h2>
                </div>

                <span class="legend-count">
                    <?= count($scores) ?>
                    <?= count($scores) === 1 ? 'PLAYER' : 'PLAYERS' ?>
                </span>
            </div>

            <div class="leaderboard-columns">
                <span>Rank / Player</span>
                <span>Score</span>
                <span>Time</span>
            </div>

            <?php if (empty($scores)): ?>

                <div class="empty-leaderboard">
                    <span class="empty-icon">✧</span>
                    <h3>No legends yet</h3>
                    <p>Complete a quiz to claim your place in history.</p>
                </div>

            <?php else: ?>

                <ol class="leaderboard">
                    <?php foreach ($scores as $index => $score): ?>
                        <li class="leaderboard-item <?= $index < 3 ? 'rank-' . ($index + 1) : '' ?>">

                            <div class="player-info">
                                <span class="rank-number">
                                    <?php if ($index === 0): ?>
                                        ♛
                                    <?php elseif ($index === 1): ?>
                                        Ⅱ
                                    <?php elseif ($index === 2): ?>
                                        Ⅲ
                                    <?php else: ?>
                                        <?= $index + 1 ?>
                                    <?php endif; ?>
                                </span>

                                <span class="username">
                                    <?= htmlspecialchars((string) $score['username'], ENT_QUOTES, 'UTF-8') ?>
                                </span>
                            </div>

                            <span class="score">
                                <?= htmlspecialchars((string) $score['score'], ENT_QUOTES, 'UTF-8') ?>
                                <small>pts</small>
                            </span>

                            <span class="time">
                                <?= htmlspecialchars((string) $score['time'], ENT_QUOTES, 'UTF-8') ?>
                                <small>sec</small>
                            </span>

                        </li>
                    <?php endforeach; ?>
                </ol>

            <?php endif; ?>

            <footer class="leaderboard-footer">
                <span>✦ Every legend begins with a challenge ✦</span>
            </footer>

        </section>

        <a href="/menu" class="back-button">
            <span>←</span> Return to Menu
        </a>

    </main>

</body>
</html>
