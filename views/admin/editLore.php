<?php include_once 'inc/head.php' ?>
<style>
    #text {
        height: 300px;
    }
</style>
<body>
  <?php include_once 'inc/header.php' ?>
  <div class="main-container">
    <div class="navcontainer">
      <?php include_once 'inc/nav.php' ?>
    </div>
    <div class="main">
      <div class="form-group">
        <form action="" method="POST">
          <input type="hidden" name="_method" value="PUT">
          <div class="form-group">
            <h2 class="heading">Update Character's Lore</h2> 
          </div>
          <input type="text" name="title" id="" value="<?= $title ?? $lore['title'] ?>">
           <?php if(isset($errors['title'])): ?>
            <p class="error"><?= $errors['title'] ?></p>
          <?php endif ?>
          <textarea id="text" name="text"><?= $text ?? $lore['text'] ?></textarea>
          <?php if(isset($errors['text'])): ?>
            <p class="error"><?= $errors['text'] ?></p>
          <?php endif ?>
          <button class="save-button">Update</button>
        </form> 
      </div> 
    </div>
  </div>
<?php include_once 'inc/footer.php' ?> 