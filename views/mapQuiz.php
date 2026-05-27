<?php include_once 'inc/gamehead.php'; ?>

<body>
    <div class="game-wrapper">

        <h2 id="question">Loading Question...</h2>

        <div class="info">
            <p>Score: <span id="score">0</span></p>
            <p>Question: <span id="progress">0/0</span></p>
        </div>

        <div id="map">
            <object id="mapa" data="images/plain.svg"
                    type="image/svg+xml"
                    width="1200" height="800">
            </object>
        </div>

        <div id="endScreen" style="display:none;">
            <h1>Game Finished 🎉</h1>
            <p id="finalScore"></p>
            <button id="restartMapGame" onclick="restartGame()">Play again</button>
            <a href="/menu" class="menu-btn">Back to Menu</a>
        </div>

    </div>
    <script src="js/map.js"></script>
</body>
</html>
