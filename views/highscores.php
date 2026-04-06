<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Silmarilion</title>
  <link rel="stylesheet" href="css/highscore.css" />
</head>
<body class="body">
  <div class="container">
    <div class="score-header">
      <h1>Leaderboard</h1>
      <a href="/menu">Back to Menu</a>
    </div>

    <ol class="leaderboard">
      <?php foreach($scores as $score): ?>
        <li>
          <span class="username"><?= htmlspecialchars($score['username']) ?></span>
          <span class="score"><?= $score['score'] ?> pts</span>
          <span class="time"><?= $score['time'] ?> s</span>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</body>
</html>