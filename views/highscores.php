<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Silmarilion</title>
  <link rel="stylesheet" href="css/highscore.css" />
</head>
<body>
  <div class="container">
    <div class="score-header">
      <h1>Top Results</h1>
      <a href="/menu">Go Back</a>
    </div>    
    <ol class="alternating-colors">
      <?php foreach($scores as $score): ?>
      <li>
        <strong><?= $score['username'] ?> - <?= $score['score'] ?> points</strong>
      </li>
      <?php endforeach ?>
    </ol>
  </div>
</body>
</html>