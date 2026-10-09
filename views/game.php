<?php include_once 'inc/gamehead.php'; ?>

<main class="quiz-page">

    <div id="game-container" class="container quiz-container">

        <div class="quiz-heading">
            <a href="/menu" class="quiz-back-link">
                <span aria-hidden="true">←</span> Back to Menu
            </a>

            <p class="quiz-eyebrow">The Chronicles of Middle-earth</p>
            <h1 class="quiz-title">The <span>Silmarillion</span> Quiz</h1>
            <p class="quiz-subtitle">
                Prove your knowledge of the ancient legends.
            </p>
            <div class="quiz-divider"><span>✦</span></div>
        </div>

        <div id="loader" class="quiz-loader" aria-label="Loading quiz"></div>

        <div id="game" class="justify-center flex-column hidden">

            <div id="hud">
                <div id="hud-item" class="hud-progress">
                    <p id="progressText" class="hud-prefix">Question</p>

                    <div id="progressBar">
                        <div id="progressBarFull"></div>
                    </div>
                </div>

                <div id="hud-item" class="hud-score">
                    <p class="hud-prefix">Score</p>
                    <h2 class="hud-main-text" id="score">0</h2>
                </div>
            </div>

            <section class="question-panel">
                <span class="question-ornament" aria-hidden="true">✧</span>
                <h2 id="question" aria-live="polite"></h2>
            </section>

            <div class="choices-list">
                <div class="choice-container">
                    <p class="choice-prefix">A</p>
                    <p class="choice-text" data-number="1"></p>
                </div>

                <div class="choice-container">
                    <p class="choice-prefix">B</p>
                    <p class="choice-text" data-number="2"></p>
                </div>

                <div class="choice-container">
                    <p class="choice-prefix">C</p>
                    <p class="choice-text" data-number="3"></p>
                </div>

                <div class="choice-container">
                    <p class="choice-prefix">D</p>
                    <p class="choice-text" data-number="4"></p>
                </div>
            </div>

        </div>

        <section class="quiz-controls" aria-label="Quiz controls">

            <div class="joker-buttons">
                <button type="button" id="fiftyBtn" class="btn joker-btn">
                    <span class="joker-icon" aria-hidden="true">½</span>
                    <span>50:50 Joker</span>
                </button>

                <button type="button" id="extraTimeBtn" class="btn joker-btn">
                    <span class="joker-icon" aria-hidden="true">⌛</span>
                    <span>+10 Seconds</span>
                </button>
            </div>

            <div class="timer-panel">
                <div class="timer-label">
                    <span>Time Remaining</span>
                    <p id="timer" aria-live="polite">Time: 10s</p>
                </div>

                <div id="timer-container">
                    <div id="timer-bar"></div>
                </div>
            </div>

        </section>

    </div>

    <div id="container-end" class="container-end" style="display: none;">
        <div id="end" class="flex-center">

            <div class="img-silmarilion">
                <img
                    id="end-game-gif"
                    src="/images/silmarilion2.jpg"
                    alt="The world of the Silmarillion"
                >
            </div>

            <p class="quiz-eyebrow">Your journey is complete</p>
            <h1 class="result-title">The Chronicle Ends</h1>

            <div class="result-score">
                <span class="result-score-label">Your Final Score</span>
                <h2 id="finalScore"></h2>
            </div>

            <form method="POST" class="save-score-form">
                <input type="hidden" id="finalScoreInput" name="score">
                <input type="hidden" id="finalTimeInput" name="time">

                <button type="submit" class="btn result-btn" id="saveScoreBtn">
                    Save Score
                </button>
            </form>

            <div class="result-actions">
                <a class="btn result-btn result-btn-secondary" href="/game">
                    Play Again
                </a>

                <a class="btn result-btn result-btn-secondary" href="/menu">
                    Back to Menu
                </a>
            </div>

        </div>
    </div>

</main>

<script src="/js/game.js"></script>

<?php include_once 'inc/footer.php'; ?>