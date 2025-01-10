<?php include_once 'inc/head.php' ?>

<body>
  <?php include_once 'inc/header.php' ?>
  <div class="main-container">
    <div class="navcontainer">
      <?php include_once 'inc/nav.php' ?>
    </div>
    <div class="main">
      <div class="form-group">
        <form action="/add-question" method="POST">
          <div class="form-group">
            <h2 class="heading">Add New Question and Answers</h2> 
          </div>
          <textarea name="question" placeholder="Question"><?= old('question') ?? '' ?></textarea>
          <?php if(isset($errors['question'])): ?>
              <p class="error"><?= $errors['question'] ?></p>
          <?php endif ?>
          <textarea name="incorrect_answers[]" placeholder="Incorrect Answer"><?= old('incorrect_answers')[0] ?? '' ?></textarea>
          <?php if(isset($errors['incorrect_answers'][0])): ?>
              <p class="error"><?= $errors['incorrect_answers'][0] ?></p>
          <?php endif ?>
          <textarea name="incorrect_answers[]" placeholder="Incorrect Answer"><?= old('incorrect_answers')[1] ?? '' ?></textarea>
          <?php if(isset($errors['incorrect_answers'][1])): ?>
              <p class="error"><?= $errors['incorrect_answers'][1] ?></p>
          <?php endif ?>
          <textarea name="incorrect_answers[]" placeholder="Incorrect Answer"><?= old('incorrect_answers')[2] ?? '' ?></textarea>
          <?php if(isset($errors['incorrect_answers'][2])): ?>
              <p class="error"><?= $errors['incorrect_answers'][2] ?></p>
          <?php endif ?>
          <textarea name="correct_answer" placeholder="Correct Answer"><?= old('correct_answer') ?? '' ?></textarea>
          <?php if(isset($errors['correct_answer'])): ?>
              <p class="error"><?= $errors['correct_answer'] ?></p>
          <?php endif ?>
          <button class="save-button">Save</button>
        </form> 
      </div> 
    </div>
  </div>
<?php include_once 'inc/footer.php' ?> 