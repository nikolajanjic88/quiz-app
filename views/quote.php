<?php include_once 'inc/guesshead.php'; ?>

<body>
<div class="game-wrapper">
    <div class="game-container">

        <a href="/menu" class="back-button">← Back to Menu</a>

        <h1>Guess the Character</h1>      

        <p id="quote-text" class="quote"></p>       

        <div class="autocomplete-wrapper">
            <input
                type="text"
                id="guess-input"
                placeholder="Enter character name..."
                autocomplete="off"
            >
            <ul id="suggestions" class="autocomplete-list"></ul>
        </div>

        <div class="button-group">
            <button onclick="checkGuess()" class="btn neon">Guess</button>
            <button onclick="play()" class="btn neon-outline">Next</button>
            <button id="hintBtn" class="btn neon-hint">Hint</button>
        </div>

        <div id="result" class="result-box"></div>

    </div>
</div>

<script src="js/config-quote.js"></script>
<script src="js/guess-game.js"></script>
<?php include_once 'inc/footer.php' ?>