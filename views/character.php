<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= APP_NAME ?></title>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.14.0/build/css/themes/bootstrap.min.css"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    .character-detail-wrapper {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 4rem 2rem;
      min-height: 100vh;
      background: radial-gradient(circle at center, #000 60%, #111 100%);
      color: #f5f6f6;
    }

    .character-card {
      width: 80vw;
      max-width: 1000px;
      background: rgba(255, 255, 255, 0.05);
      border: 1.5px solid rgba(0, 255, 255, 0.2);
      border-radius: 2rem;
      backdrop-filter: blur(20px);
      box-shadow: 0 0 40px rgba(0, 255, 255, 0.1);
      padding: 2rem;
      animation: pulseGlow 3s infinite;
    }

    .character-header {
      display: flex;
      gap: 2rem;
      align-items: flex-end;
      flex-wrap: wrap;
    }

    .character-image img {
      width: 150px;
      height: 220px;
      object-fit: cover;
      border-radius: 1rem;
      border: 2px solid rgba(0, 255, 255, 0.4);
      box-shadow: 0 0 20px rgba(0, 255, 255, 0.2);
    }

    .character-title h2 {
      font-size: 2rem;
      color: #00ffe0;
      margin: 0;
    }

    .character-body {
      margin-top: 2rem;
    }

    .character-body h3 {
      font-size: 1.5rem;
      margin-bottom: 1rem;
      color: #00ffe0;
    }

    .character-body p {
      line-height: 1.6;
      font-size: 1rem;
      color: #dfefff;
      background-color: rgba(255, 255, 255, 0.03);
      padding: 1.2rem;
      border-radius: 1rem;
    }

    .buttons {
      display: flex;
      justify-content: left;
      align-items: center;
    }

    /* Button layout */
    .button-row {
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      margin-top: 2rem;
      align-items: center;
    }

    .btn {
      padding: 0.8rem 1.5rem;
      margin-right: 1rem;
      font-size: 1rem;
      font-weight: bold;
      text-transform: uppercase;
      border: none;
      border-radius: 1rem;
      cursor: pointer;
      transition: all 0.3s ease;
      text-align: center;
      text-decoration: none;
    }

    .btn.neon {
      background: rgba(0, 255, 255, 0.1);
      color: #00ffe0;
      border: 2px solid #00ffe0;
    }

    .btn.neon:hover {
      background-color: rgba(0, 255, 255, 0.2);
      box-shadow: 0 0 15px rgba(0, 255, 255, 0.5);
      transform: translateY(-2px);
    }

    .btn.danger {
      background-color: #ff3c3c;
      color: white;
      box-shadow: 0 0 15px rgba(255, 60, 60, 0.3);
    }

    .btn.danger:hover {
      background-color: #ff1e1e;
      box-shadow: 0 0 25px rgba(255, 60, 60, 0.6);
    }

    .btn.success {
      background-color: #3cff5a;
      color: black;
      box-shadow: 0 0 15px rgba(60, 255, 90, 0.3);
    }

    .btn.success:hover {
      background-color: #23e244;
      box-shadow: 0 0 25px rgba(60, 255, 90, 0.6);
    }

    /* Glow animation */
    @keyframes pulseGlow {
      0% {
        box-shadow: 0 0 10px #00ffe0, 0 0 20px #00ffe0;
      }
      50% {
        box-shadow: 0 0 20px #00ffe0, 0 0 40px #00ffe0;
      }
      100% {
        box-shadow: 0 0 10px #00ffe0, 0 0 20px #00ffe0;
      }
    }

  </style>
</head>
<body style="background: #262a2b">
  <section class="character-detail-wrapper">
    <div class="character-card">
      <div class="character-header">
        <div class="character-image">
          <img src="<?= $data['image'] ?>" alt="Character Image" />
        </div>
        <div class="character-title">
          <h2><?= $data['title'] ?></h2>
        </div>
      </div>

      <div class="character-body">
        <h3>About</h3>
        <p><?= $data['text'] ?></p>
      </div>
      <div class="buttons">
        <button onclick="history.back()" class="btn neon">Go Back</button>
        <?php if ($_SESSION['user']['is_admin'] == 1): ?>
          <form action="" method="POST" onsubmit="return confirm('Are you sure?')">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            <button class="btn danger">Delete</button>
          </form>
          <a href="/edit-character?id=<?= $data['id'] ?>" class="btn success">Edit</a>
        <?php endif ?>
      </div>
      </div>     
    </div>
  </section>
</body>
</html>