<section class="achievement-progress-panel">

    <div class="achievement-progress-info">
        <span class="achievement-progress-icon">
            <i class="fa-solid fa-trophy"></i>
        </span>

        <div class="achievement-progress-text">
            <span class="achievement-progress-label">
                YOUR PROGRESS
            </span>

            <h2>Path of the Lorekeeper</h2>

            <p>
                Every achievement brings you closer to mastering
                the lore of Middle-earth.
            </p>
        </div>
    </div>

    <div class="achievement-progress-stats">
        <div class="achievement-progress-numbers">
            <span>Achievements unlocked</span>

            <strong>
                <?= $unlockedAchievements ?>
                <span>/ <?= $totalAchievements ?></span>
            </strong>
        </div>

        <div class="achievement-progress-track">
            <div
                class="achievement-progress-fill"
                style="width: <?= $completion ?>%;"
            ></div>
        </div>

        <div class="achievement-progress-footer">
            <span><?= $completion ?>% completed</span>

            <span>
                <?= $totalAchievements - $unlockedAchievements ?>
                remaining
            </span>
        </div>
    </div>

</section>
