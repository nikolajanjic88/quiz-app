<?php include_once 'inc/gamehead.php'; ?>
    <div id="game-container" class="container">
      <div id="loader"></div>
      <div id="game" class="justify-center flex-column hidden">
        <div id="hud">
          <div id="hud-item">
            <p id="progressText" class="hud-prefix">
              Question
            </p>
            <div id="progressBar">
              <div id="progressBarFull"></div>
            </div>
          </div>
          <div id="hud-item">
            <p class="hud-prefix">
              Score
            </p>
            <h1 class="hud-main-text" id="score">
              0
            </h1>
          </div>
        </div>
        <h2 id="question"></h2>
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

    <div style="display: none;" id="container-end" class="container-end">
      <div id="end" class="flex-center">
        <div class="img-silmarilion">
          <img src="images/silmarilion.jpg" alt="">
        </div>
        <h1 id="finalScore"></h1>
        <form method="POST">
          <input type="hidden" id="finalScoreInput" name="score">
          <button type="submit" class="btn" id="saveScoreBtn">
            Save
          </button>
        </form>
        <a class="btn" href="/game">Play Again</a>
        <a class="btn" href="/menu">Back to Menu</a>
      </div>
    </div>
   
    <script src="js/game.js"></script>
<?php include_once 'inc/footer.php' ?>