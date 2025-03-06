<?php include_once 'inc/head.php' ?>
<body class="body">
  <div class="wrapper">
    <div class="list">
      <div class="menu-header">
        <form class="logoutForm" action="/logout" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <button>Logout</button>
        </form>
      </div>
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
    </div> 
  </div>
<?php include_once 'inc/footer.php' ?>