<?php include_once 'inc/gamehead.php'; ?>

<body class="map-game-body">

    <main class="map-game-page">
        <div class="map-game-container">

            <a href="/menu" class="map-back-button">
                <span>←</span> Back to Menu
            </a>

            <header class="map-game-header">
                <p class="map-eyebrow">The First Age • Beleriand</p>

                <h1>
                    The <span>Lost Lands</span>
                </h1>

                <p class="map-subtitle">
                    Test your knowledge of the ancient lands of Middle-earth.
                    Find each location on the map before time runs out.
                </p>

                <div class="map-divider">
                    <span></span>
                    ✧
                    <span></span>
                </div>
            </header>

            <section class="map-game-card">

                <div class="map-question-panel">
                    <span class="question-label">Your Quest</span>
                    <h2 id="question">Loading Question...</h2>
                </div>

                <div class="map-game-info">
                    <div class="map-info-item">
                        <span class="map-info-label">Score</span>
                        <p><span id="score">0</span></p>
                    </div>

                    <div class="map-info-item">
                        <span class="map-info-label">Question</span>
                        <p><span id="progress">0/0</span></p>
                    </div>

                    <div class="map-info-item timer-item">
                        <span class="map-info-label">Time Remaining</span>
                        <p>
                            <span id="timer">10</span>
                            <small>sec</small>
                        </p>
                    </div>
                </div>

                <div class="map-instructions">
                    <span>✦</span>
                    Select the correct location on the map
                </div>

                <div id="map" class="map-canvas">
                    <object
                        id="mapa"
                        data="/images/plain.svg"
                        type="image/svg+xml"
                        aria-label="Interactive map of Beleriand">
                    </object>
                </div>

                <div id="endScreen" class="map-end-screen"
                     style="display: none;">

                    <div class="end-ornament">✧</div>

                    <p class="map-eyebrow">Your Journey Ends</p>

                    <h2>Quest Completed</h2>

                    <p id="finalScore" class="final-score"></p>

                    <div class="end-buttons">
                        <button
                            type="button"
                            id="restartMapGame"
                            class="map-button map-button-primary"
                            onclick="restartGame()">
                            Play Again ↻
                        </button>

                        <a href="/menu" class="map-button map-button-secondary">
                            Back to Menu
                        </a>
                    </div>
                </div>

            </section>

            <footer class="map-game-footer">
                <span>✦</span>
                The legends of Beleriand live on
                <span>✦</span>
            </footer>

        </div>
    </main>

    <script src="/js/map.js"></script>
</body>
</html>
