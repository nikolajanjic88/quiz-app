<?php include_once 'inc/head.php' ?>
<body class="body">
  <div class="wrapper">
    <div class="form-box register">
      <h2>Registration</h2>
      <form action="/register" method="POST">
        <div class="input-box">
          <span class="icon">
            <ion-icon name="person"></ion-icon>
          </span>
          <input type="text" name="username" placeholder="Username" value="<?= old('username') ?>">
          <?php if(isset($errors['username'])): ?>
            <p class="error"><?= $errors['username'] ?></p>
          <?php endif ?>
        </div>
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
        <div class="input-box">
          <span class="icon">
            <ion-icon name="lock-closed"></ion-icon>
          </span>
          <input type="password" name="rpassword" placeholder="Confirm password">
        </div>
        <button class="btn">Register</button>
        <div class="login-register">
          <p><a href="/login" class="register-link">Alredy registered? Login here</a></a></p>
        </div>
      </form>
    </div>
  </div>
<?php include_once 'inc/footer.php' ?>