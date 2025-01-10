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
      </div>
    </div>
  </div>
<?php include_once 'inc/footer.php' ?> 