<?php include_once 'inc/head.php' ?>

<body style="background: #262a2b">
  <section class="h-100 gradient-custom-2">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center">
        <div class="col col-lg-9 col-xl-8">
          <div class="card">
            <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
              <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
                <img src="<?= $data['image'] ?>"
                  alt="Generic placeholder image" class="img-fluid img-thumbnail mt-4 mb-2"
                  style="width: 150px; height: 220px; z-index: 1">
              </div>
              <div class="ms-3" style="margin-top: 130px;">
                <h5><?= $data['title'] ?></h5>
              </div>
            </div>
            <div class="card-body p-4 text-black" style="margin-top: 100px;">
              <div class="mb-5  text-body">
                <p class="lead fw-normal mb-1">About</p>
                <div class="p-4 bg-body-tertiary">
                  <p class="font-italic mb-1"><?= $data['text'] ?></p>
                </div>
              </div>
              <?php if($_SESSION['user']['is_admin'] === 1): ?>
                <a href="/all-lore" type="button" class="btn btn-info w-25">Go Back</a>
              <?php else: ?>
                <a href="/lore" type="button" class="btn btn-info w-25">Go Back</a>
              <?php endif ?>
              <?php if($_SESSION['user']['is_admin'] === 1): ?>
                <form class="mt-2" action="" method="POST">
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="id" value="<?= $data['id'] ?>">
                  <button class="btn btn-danger w-25" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>