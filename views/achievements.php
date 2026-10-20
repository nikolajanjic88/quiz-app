<?php include_once 'inc/gamehead.php'; ?>

<body class="achievements-body">
<main class="achievements-page">
    <div class="achievements-container">

        <a href="/menu" class="achievements-back">
            &larr; Back to Menu
        </a>

        <!-- Achievements Header -->
        <header class="achievements-header">
            <p class="achievements-eyebrow">Middle-earth Archives</p>

            <h1>
                Hall of <span>Achievements</span>
            </h1>

            <p class="achievements-subtitle">
                Every challenge completed becomes part of your legend.
            </p>
        </header>

        <!-- Achievement Progress Component -->
        <?php include 'components/achievement-progress.php'; ?>

        <!-- Achievement Statistics -->
        <section class="achievements-statistics">

            <article class="achievement-stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-medal"></i>
                </div>

                <div class="stat-content">
                    <p>Total Achievements</p>
                    <h3><?= (int) $totalAchievements ?></h3>
                </div>
            </article>

            <article class="achievement-stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-trophy"></i>
                </div>

                <div class="stat-content">
                    <p>Unlocked</p>
                    <h3><?= (int) $unlockedAchievements ?></h3>
                </div>
            </article>

            <article class="achievement-stat-card">
                <div class="stat-icon">
                    <i class="fa-solid fa-lock"></i>
                </div>

                <div class="stat-content">
                    <p>Locked</p>
                    <h3>
                        <?= max(0, $totalAchievements - $unlockedAchievements) ?>
                    </h3>
                </div>
            </article>

        </section>

        <!-- Achievements Collection -->
        <section class="achievements-collection">

            <div class="collection-heading">
                <div>
                    <p class="collection-eyebrow">Your Legacy</p>
                    <h2>Achievement Collection</h2>
                </div>

                <p class="collection-description">
                    Discover your accomplishments and the challenges
                    that still await you.
                </p>
            </div>

            <?php if (empty($achievements)): ?>

                <div class="achievements-empty">
                    <i class="fa-solid fa-scroll"></i>

                    <h3>No Achievements Found</h3>

                    <p>
                        Your journey has only just begun.
                        Complete challenges to build your legacy.
                    </p>
                </div>

            <?php else: ?>

                <div class="achievements-grid">
                    <?php foreach ($achievements as $achievement): ?>
                        <?php include 'components/achievement-card.php'; ?>
                    <?php endforeach; ?>
                </div>

            <?php endif; ?>

        </section>

        <!-- Footer -->
        <footer class="achievements-footer">
            <span>&#10022;</span>
            Every achievement becomes part of your legend.
            <span>&#10022;</span>
        </footer>

    </div>
</main>
</body>
</html>
