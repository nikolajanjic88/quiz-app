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