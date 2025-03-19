<?php include_once 'inc/head.php' ?>
<body style="background: #262a2b">
  <div class="items">
    <a href="/menu" class="back-button">Back To Menu</a>
    <form class="form-wrapper">
      <input type="text" name="search-character" id="search" placeholder="Search Character...">
      <input type="submit" value="go" id="submit">
    </form>
    <ul class="tilesWrap">
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
</body>
</html>