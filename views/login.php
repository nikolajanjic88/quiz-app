<?php include_once 'inc/head.php' ?>
<body class="body">
  <div class="wrapper">
    <div class="form-box login">
      <h2>Login</h2>
      <form action="/login" method="POST">
        <div class="input-box">
          <span class="icon">
            <ion-icon name="mail"></ion-icon>
          </span>
          <input type="email" name="email" placeholder="Email" value="<?= old('email') ?>">
          <?php if(isset($errors['email'])): ?>
            <p class="error"><?= $errors['email'] ?></p>
          <?php endif ?>
        </div>
        <div class="input-box">
          <span class="icon">
            <ion-icon name="lock-closed"></ion-icon>
          </span>
          <input type="password" name="password" placeholder="Password">
          <?php if(isset($errors['password'])): ?>
            <p class="error"><?= $errors['password'] ?></p>
          <?php endif ?>
        </div>
        <button id="btnSuccess" class="btn">Login</button>
        <div class="login-register">
          <p><a href="/register" class="register-link">Not a member? Register here</a></a></p>
        </div>
      </form>
    </div>
  </div>
<?php include_once 'inc/footer.php' ?>