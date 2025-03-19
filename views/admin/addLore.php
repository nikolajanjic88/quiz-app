<?php include_once 'inc/head.php' ?>

<body>
  <?php include_once 'inc/header.php' ?>
  <div class="main-container">
    <div class="navcontainer">
      <?php include_once 'inc/nav.php' ?>
    </div>
    <div class="main">
      <div class="form-group">
        <form action="/add-lore" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <h2 class="heading">Add New Lore Character</h2> 
          </div>
          <input type="text" name="title" placeholder="title" value="<?= old('title') ?? '' ?>">
          <?php if(isset($errors['title'])): ?>
              <p class="error"><?= $errors['title'] ?></p>
          <?php endif ?>
          <textarea name="text" placeholder="Description"><?= old('text') ?? '' ?></textarea>
          <?php if(isset($errors['text'])): ?>
              <p class="error"><?= $errors['text'] ?></p>
          <?php endif ?>
          <input type="file" name="image">
          <?php if(isset($errors['image'])): ?>
              <p class="error"><?= $errors['image'] ?></p>
          <?php endif ?>
          <button class="save-button">Save</button>
        </form> 
      </div> 
    </div>
  </div>
<?php include_once 'inc/footer.php' ?> 