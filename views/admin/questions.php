<?php include_once 'inc/head.php' ?>

<body>
  <?php include_once 'inc/header.php' ?>
  <div class="main-container">
    <div class="navcontainer">
      <?php include_once 'inc/nav.php' ?>
    </div>
    <div class="main">
      <div class="question-list">
        <?php foreach($questions as $question): ?>
          <div class="question-box">
            <div class="question">
              <a href="/question?id=<?= $question['id'] ?>"><h4><?= $question['question'] ?></h4></a>
              <form action="/all-questions" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $question['id'] ?>">
                <button onclick="return confirm('Are you sure?')">Delete Question</button>
              </form>
            </div>
            <ul>
              <li class="correct-answer">
              <?= $question['correct_answer'] ?> (correct answer)
              </li>
              <?php 
                $incorrect_answers = json_decode($question['incorrect_answers'], true);
                foreach($incorrect_answers as $incorrect_answer): ?>
              <li class="incorrect-answer">
              <?= $incorrect_answer ?>
              </li>
              <?php endforeach ?>
            </ul>
          </div>
        <?php endforeach ?>
        <?php if(!isset($_POST['search']) || trim($_POST['search']) == ''): ?>
          <ul class="pagination">
          <?php if(isset($_GET['page']) && $_GET['page'] > 1): ?>
            <li>       
              <a href="/all-questions?page=1">First</a>        
            </li>
            <li>       
              <a href="/all-questions?page=<?= $_GET['page'] - 1 ?>">Previous</a>        
            </li>
          <?php endif ?>
          <li class="<?= !isset($_SERVER['QUERY_STRING']) || $_SERVER['QUERY_STRING'] == 'page=1' ? 'active' : '' ?>">
            <a href="/all-questions?page=1">1</a>
          </li>
          <?php for($i = 2; $i <= $pages; $i++): ?>
          <li class="<?= isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'page=' . $i ? 'active' : '' ?>">
            <a href="/all-questions?page=<?= $i ?>"><?= $i ?></a>
          </li>
          <?php endfor ?>
          <?php if(!isset($_GET['page'])): ?>
            <li>
              <a href="/all-questions?page=2">Next</a>
            </li>
          <?php elseif($_GET['page'] < $pages): ?>
            <li>
              <a href="/all-questions?page=<?= $_GET['page'] + 1 ?>">Next</a>
            </li>
            <li>
              <a href="/all-questions?page=<?= $pages ?>">Last</a>
            </li>
          <?php endif ?>
          </ul>
        <?php endif ?>
      </div>
    </div>
  </div>
<?php include_once 'inc/footer.php' ?> 