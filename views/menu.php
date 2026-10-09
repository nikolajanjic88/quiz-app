<?php include_once 'inc/head.php'; ?>

<body class="menu-page">
    <main class="menu-wrapper">

        <header class="menu-header">
            <p class="menu-eyebrow">The World of Tolkien</p>
            <h1>LEGENDS OF <span>MIDDLE-EARTH</span></h1>
            <p class="menu-subtitle">
                Your journey through the First Age begins here
            </p>
            <div class="menu-divider"><span>✦</span></div>
        </header>

        <button
            type="button"
            id="soundToggle"
            class="sound-toggle"
            aria-label="Toggle background music"
            title="Toggle background music"
        >
            🔊
        </button>

        <nav class="menu-grid" aria-label="Main menu">

            <?php if (isset($_SESSION['user']['is_admin'])
                && (int) $_SESSION['user']['is_admin'] === 1): ?>
                <a href="/dashboard" class="menu-card admin-card">
                    <span class="card-number">00</span>
                    <span class="card-icon">⚜</span>
                    <span class="card-title">Admin Dashboard</span>
                    <span class="card-description">
                        Manage the chronicles
                    </span>
                    <span class="card-arrow">↗</span>
                </a>
            <?php endif; ?>

            <a href="/game" class="menu-card">
                <span class="card-number">01</span>
                <span class="card-icon">✧</span>
                <span class="card-title">Play Quiz</span>
                <span class="card-description">
                    Test your knowledge of Middle-earth
                </span>
                <span class="card-arrow">↗</span>
            </a>

            <a href="/guessgame" class="menu-card">
                <span class="card-number">02</span>
                <span class="card-icon">◈</span>
                <span class="card-title">Guess by Image</span>
                <span class="card-description">
                    Identify the faces of legend
                </span>
                <span class="card-arrow">↗</span>
            </a>

            <a href="/guessquote" class="menu-card">
                <span class="card-number">03</span>
                <span class="card-icon">❝</span>
                <span class="card-title">Guess by Quote</span>
                <span class="card-description">
                    Discover who spoke the words
                </span>
                <span class="card-arrow">↗</span>
            </a>

            <a href="/map-quiz" class="menu-card">
                <span class="card-number">04</span>
                <span class="card-icon">⌖</span>
                <span class="card-title">Find the Location</span>
                <span class="card-description">
                    Explore the lands of Beleriand
                </span>
                <span class="card-arrow">↗</span>
            </a>

            <a href="/lore" class="menu-card">
                <span class="card-number">05</span>
                <span class="card-icon">✺</span>
                <span class="card-title">Lore</span>
                <span class="card-description">
                    Read the tales of ancient times
                </span>
                <span class="card-arrow">↗</span>
            </a>

            <a href="/highscores" class="menu-card">
                <span class="card-number">06</span>
                <span class="card-icon">♛</span>
                <span class="card-title">Scoreboard</span>
                <span class="card-description">
                    Honour the greatest scholars
                </span>
                <span class="card-arrow">↗</span>
            </a>

        </nav>

        <footer class="menu-footer">
            <span>“Not all those who wander are lost.”</span>

            <form class="logoutForm" action="/logout" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="logout-button">
                    Sign Out <span>↗</span>
                </button>
            </form>
        </footer>

    </main>

    <audio id="bgMusic" loop>
        <source src="/sounds/background.mp3" type="audio/mpeg">
    </audio>

    <script src="/js/bg-music.js"></script>

    <?php include_once 'inc/footer.php'; ?>
</body>
