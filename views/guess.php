<?php include_once 'inc/guesshead.php'; ?>

<body>
    <div class="game-container">
        <a href="/menu" class="back-button" onclick="goBack()">← Back to Menu</a>
        <h1>Guess the Character</h1>
        <img id="characterImage" src="" alt="" width="350px" />
        <br>
        <div class="autocomplete-wrapper">
            <input
                type="text"
                id="guess-input"
                placeholder="Enter name"
                autocomplete="off"
            >
            <ul id="suggestions" class="autocomplete-list"></ul>
        </div>
        <div class="button-group">
            <button onclick="checkGuess()" class="btn neon">Guess</button>
            <button onclick="play()" class="btn neon-outline">Play Next</button>
        </div>
        <p id="result"></p>
    </div>

<script src="js/config-image.js"></script>
<script src="js/guess-game.js"></script>
<?php include_once 'inc/footer.php' ?>