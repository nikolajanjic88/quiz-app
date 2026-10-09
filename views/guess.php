<?php include_once 'inc/guesshead.php'; ?>

<body class="guess-game-body">

    <main class="guess-game-page">
        <div class="guess-game-container">

            <a href="/menu" class="back-button">
                ← Back to Menu
            </a>

            <header class="guess-game-header">
                <p class="game-eyebrow">Middle-earth Challenge</p>
                <h1>Guess the Character</h1>
                <p class="game-description">
                    Study the image and identify the character from Tolkien's world.
                </p>
            </header>

            <section class="guess-game-content">

                <div class="character-image-wrapper">
                    <img
                        id="characterImage"
                        src=""
                        alt="Mystery character"
                    >
                </div>

                <div class="autocomplete-wrapper">
                    <input
                        type="text"
                        id="guess-input"
                        placeholder="Enter character name..."
                        autocomplete="off"
                    >

                    <ul
                        id="suggestions"
                        class="autocomplete-list"
                    ></ul>
                </div>

                <div class="button-group">
                    <button
                        type="button"
                        id="guessBtn"
                        class="guess-btn guess-btn-primary"
                        onclick="checkGuess()"
                    >
                        Guess
                    </button>

                    <button
                        type="button"
                        class="guess-btn guess-btn-secondary"
                        onclick="play()"
                    >
                        Next Character
                    </button>

                    <button
                        type="button"
                        id="hintBtn"
                        class="guess-btn guess-btn-hint"
                    >
                        Hint
                    </button>
                </div>

                <p id="result" class="result-box" aria-live="polite"></p>

            </section>
        </div>
    </main>

    <script src="js/config-image.js"></script>
    <script src="js/guess-game.js"></script>

    <?php include_once 'inc/footer.php'; ?>

</body>