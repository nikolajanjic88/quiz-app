<?php include_once 'inc/head.php' ?>
<body>
  <div class="items">
    <div class="top-bar">
      <a href="/menu" class="back-button">Back To Menu</a>
      <form class="form-wrapper" method="POST">
        <input type="text" name="search-character" id="search" placeholder="Search Character...">
        <input type="submit" value="Search" id="submit">
      </form>
    </div>
    <ul class="titlesWrap">
      <?php foreach($data as $item):
        if(strlen($item['text']) < 150)
        {
          $desc = $item['text'];
        }
        else
        {
          $desc = '';
          $arr = str_split($item['text']);
          for($i = 0; $i <= 150; $i++)
          {
            $desc .= $arr[$i];
          }
          $desc .= '...';
        }      
      ?>
        <li>
          <h3 style="color:rgb(166, 191, 233)"><?= $item['title'] ?></h3>
          <p>
            <?= $desc ?>
          </p>
          <a href="/lore/character?id=<?= $item['id'] ?>">Read more</a>
        </li>
      <?php endforeach ?>
    </ul>
    </div>
    <?php if(!isset($_POST['search-character']) || trim($_POST['search-character']) == ''): ?>
      <ul class="pagination">
        <?php if(isset($_GET['page']) && $_GET['page'] > 1): ?>
          <li>       
            <a href="/lore?page=1">First</a>        
          </li>
          <li>       
            <a href="/lore?page=<?= $_GET['page'] - 1 ?>">Previous</a>        
          </li>
        <?php endif ?>
          <li class="<?= !isset($_SERVER['QUERY_STRING']) || $_SERVER['QUERY_STRING'] == 'page=1' ? 'active' : '' ?>">
            <a href="/lore?page=1">1</a>
          </li>
        <?php for($i = 2; $i <= $pages; $i++): ?>
          <li class="<?= isset($_SERVER['QUERY_STRING']) && $_SERVER['QUERY_STRING'] == 'page=' . $i ? 'active' : '' ?>">
            <a href="/lore?page=<?= $i ?>"><?= $i ?></a>
          </li>
        <?php endfor ?>
        <?php if(!isset($_GET['page'])): ?>
          <li>
            <a href="/lore?page=2">Next</a>
          </li>
        <?php elseif($_GET['page'] < $pages): ?>
          <li>
            <a href="/lore?page=<?= $_GET['page'] + 1 ?>">Next</a>
          </li>
          <li>
            <a href="/lore?page=<?= $pages ?>">Last</a>
          </li>
        <?php endif ?>
      </ul>
    <?php endif ?>
</body>
</html>