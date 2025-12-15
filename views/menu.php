<?php include_once 'inc/head.php' ?>
<body class="body">
  <div class="wrapper">
    <button id="soundToggle" class="sound-toggle">
      🔊
    </button>
    <div class="list">
      <?php if($_SESSION['user']['is_admin'] == 1): ?>
      <a href="/dashboard" class="links">
        <section>
          Admin Dashboard
        </section>
      </a>
      <?php endif ?>
      <a href="/game" class="links">
        <section>
          Play Quiz
        </section>
      </a>
      <a href="/guessgame" class="links">
        <section>
          Guess the Character
        </section>
      </a>
      <a href="/lore" class="links">
        <section>
          Lore
        </section>
      </a>
      <a href="/highscores" class="links">
        <section>
          Scoreboard
        </section>
      </a>  
      <div class="menu-logout">
        <form class="logoutForm" action="/logout" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <button>Logout</button>
        </form>
      </div>          
    </div> 
  </div>
  <audio id="bgMusic" loop>
    <source src="/sounds/background.mp3" type="audio/mpeg">
  </audio>
  <script src="/js/bg-music.js"></script>
<?php include_once 'inc/footer.php' ?>