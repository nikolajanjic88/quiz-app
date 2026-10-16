<section class="profile-card">
    <div class="profile-avatar">
        <?= htmlspecialchars(
            strtoupper(substr($user['username'], 0, 1)),
            ENT_QUOTES,
            'UTF-8'
        ) ?>
    </div>

    <div class="profile-identity">
        <h2>
            <?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?>
        </h2>

        <p>
            <?= htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8') ?>
        </p>

        <span class="profile-member-since">
            Member since
            <?= date('F Y', strtotime($user['created_at'])) ?>
        </span>
    </div>
</section>