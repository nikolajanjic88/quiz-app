<?php include_once 'inc/head.php' ?>

<body>
  <?php include_once 'inc/header.php' ?>
  <div class="main-container">
    <div class="navcontainer">
      <?php include_once 'inc/nav.php' ?>
    </div>
    <div class="main">
      <div class="content">
        <ul class="team">
          <?php foreach($data as $item): ?>
          <a href="/lore/character?id=<?= $item['id'] ?>">
            <li class="member">
              <div class="thumb"><img src="<?= $item['image'] ?>"></div>
              <div class="description">
                <h3><?= $item['title'] ?></h3>
                <p><?= $item['text'] ?><br></p>
              </div>
            </li>
          </a>
          <?php endforeach ?>
        </ul>
        <?php if(!isset($_POST['search-character']) || trim($_POST['search-character']) == ''): ?>
        <ul class="pagination">
          <?php if(isset($_GET['page']) && $_GET['page'] > 1): ?>
            <li>       
              <a href="/all-lore?page=1">First</a>        
            </li>
            <li>       
              <a href="/all-lore?page=<?= $_GET['page'] - 1 ?>">Previous</a>        
            </li>
          <?php endif ?>
          <li class="<?= !isset($_SERVER['QUERY_STRING']) || $_SERVER['QUERY_STRING'] == 'page=1' ? 'active' : '' ?>">
            <a href="/all-lore?page=1">1</a>
          </li>
          <?php for($i = 2; $i <= $pages; $i++): ?>
          <li class="<?= isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'page=' . $i ? 'active' : '' ?>">
            <a href="/all-lore?page=<?= $i ?>"><?= $i ?></a>
          </li>
          <?php endfor ?>
          <?php if(!isset($_GET['page'])): ?>
            <li>
              <a href="/all-lore?page=2">Next</a>
            </li>
          <?php elseif($_GET['page'] < $pages): ?>
            <li>
              <a href="/all-lore?page=<?= $_GET['page'] + 1 ?>">Next</a>
            </li>
            <li>
              <a href="/all-lore?page=<?= $pages ?>">Last</a>
            </li>
          <?php endif ?>
        </ul>
        <?php endif ?>
      </div>
    </div>
  </div>
<?php include_once 'inc/footer.php' ?> 