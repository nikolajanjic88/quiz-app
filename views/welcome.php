<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= APP_NAME ?> | Middle-earth Quiz</title>

    <link rel="stylesheet" href="/css/welcome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=Crimson+Text:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="/css/home.css" rel="stylesheet">
</head>
<body>

    <div class="landing-page">

        <nav class="navbar">
            <a href="/" class="logo">
                <span class="logo-symbol">✦</span>
                <span><?= APP_NAME ?></span>
            </a>

            <a href="/login" class="nav-link">Enter the Realm <span>↗</span></a>
        </nav>

        <main class="hero">

            <div class="hero-content">

                <p class="eyebrow">
                    A Journey Through Middle-earth
                </p>

                <div class="ornament">
                    <span></span>
                    ✧
                    <span></span>
                </div>

                <h1>
                    The world of Tolkien<br>
                    <span>awaits you.</span>
                </h1>

                <p class="hero-description">
                    Test your knowledge of the First Age, discover
                    the legends of Beleriand, and prove your mastery
                    of the stories that shaped Middle-earth.
                </p>

                <div class="hero-actions">
                    <a href="/login" class="primary-button">
                        Enter the Realm
                        <span>→</span>
                    </a>
                </div>

                <div class="hero-note">
                    <span class="note-line"></span>
                    <p>For those who remember the ancient tales</p>
                    <span class="note-line"></span>
                </div>

            </div>

            <div class="hero-bottom">
                <span>THE FIRST AGE</span>
                <span class="bottom-symbol">✦</span>
                <span>THE LEGENDS LIVE ON</span>
            </div>

        </main>

    </div>

</body>
</html>