<?php
$isUnlocked = (bool) $achievement['unlocked'];
?>

<article class="achievement-card <?= $isUnlocked ? 'is-unlocked' : 'is-locked' ?>">

    <div class="achievement-card-top">
        <span class="achievement-category">
            <?= htmlspecialchars($achievement['code']) ?>
        </span>

        <?php if ($isUnlocked): ?>
            <span class="achievement-status unlocked-status">
                <i class="fa-solid fa-check"></i>
                Unlocked
            </span>
        <?php else: ?>
            <span class="achievement-status locked-status">
                <i class="fa-solid fa-lock"></i>
                Locked
            </span>
        <?php endif; ?>
    </div>

    
    <?php
        $iconName = strtolower(trim((string) ($achievement['icon'] ?? 'star')));

        $iconMap = [
            'star'       => 'fa-solid fa-star',
            'crown'      => 'fa-solid fa-crown',
            'book-open'  => 'fa-solid fa-book-open',
            'footprints' => 'fa-solid fa-shoe-prints',
        ];

        $iconClass = $iconMap[$iconName] ?? 'fa-solid fa-star';
        ?>

    <div class="achievement-icon-wrapper">
        <i class="<?= htmlspecialchars($iconClass, ENT_QUOTES, 'UTF-8') ?>"></i>
    </div>


    <div class="achievement-card-content">
        <h3>
            <?= htmlspecialchars($achievement['name']) ?>
        </h3>

        <p>
            <?= htmlspecialchars($achievement['description']) ?>
        </p>
    </div>

    <?php if ($isUnlocked): ?>
        <div class="achievement-card-footer">
            <i class="fa-solid fa-award"></i>
            Achievement earned
        </div>
    <?php else: ?>
        <div class="achievement-card-footer locked-footer">
            <i class="fa-solid fa-lock"></i>

            <?= htmlspecialchars((string) $achievement['requirement']) ?>
        </div>
    <?php endif; ?>

</article>
