<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['title'] ?? APP_NAME, ENT_QUOTES, 'UTF-8') ?> | <?= APP_NAME ?></title>

    <link rel="stylesheet" href="/css/character.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Crimson+Text:wght@400;600;700&display=swap" rel="stylesheet">

</head>

<body>
    <section class="character-detail-wrapper">
        <article class="character-card">

            <header class="character-header">
                <div class="character-image">
                    <img
                        src="<?= htmlspecialchars($data['image'] ?? '', ENT_QUOTES, 'UTF-8') ?>"
                        alt="<?= htmlspecialchars($data['title'] ?? 'Character', ENT_QUOTES, 'UTF-8') ?>"
                    >
                </div>

                <div class="character-title">
                    <p class="eyebrow">The Chronicles of Middle-earth</p>
                    <h1><?= htmlspecialchars($data['title'] ?? '', ENT_QUOTES, 'UTF-8') ?></h1>

                    <div class="title-divider" aria-hidden="true">
                        <span>✦</span>
                    </div>
                </div>
            </header>

            <section class="character-body">
                <div class="section-heading">
                    <h2>About</h2>
                </div>

                <div class="character-description"><?=
                    htmlspecialchars($data['text'] ?? '', ENT_QUOTES, 'UTF-8')
                ?></div>
            </section>

            <nav class="buttons" aria-label="Character actions">
                <button
                    type="button"
                    onclick="history.back()"
                    class="btn neon"
                >
                    ← Go Back
                </button>

                <?php if (isset($_SESSION['user']['is_admin']) && (int) $_SESSION['user']['is_admin'] === 1): ?>

                    <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this character?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <input
                            type="hidden"
                            name="id"
                            value="<?= htmlspecialchars((string) ($data['id'] ?? ''), ENT_QUOTES, 'UTF-8') ?>"
                        >
                        <button type="submit" class="btn danger">
                            Delete Character
                        </button>
                    </form>

                    <a
                        href="/edit-character?id=<?= urlencode((string) $data['id']) ?>"
                        class="btn success"
                    >
                        Edit Character
                    </a>

                <?php endif; ?>
            </nav>

        </article>
    </section>
</body>
</html>