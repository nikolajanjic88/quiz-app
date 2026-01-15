<?php include_once 'inc/guesshead.php'; ?>

<body>
    <div class="game-container">
        <a href="/menu" class="back-button" onclick="goBack()">← Back to Menu</a>
        <h1>Guess the Character</h1>      
        <p id="quote-text" class="quote"></p>       
        <br>

        <input type="text" id="guess-input" placeholder="Enter character name" />
        <button onclick="checkGuess()" class="btn neon">Guess</button>
        <button onclick="play()" class="btn neon-outline">Play Next</button>
        <p id="result"></p>
    </div>

<script src="js/config-quote.js"></script>
<script src="js/guess-game.js"></script>
<?php include_once 'inc/footer.php' ?>