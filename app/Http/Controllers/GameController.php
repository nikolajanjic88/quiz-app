<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Session;
use App\Models\Game;
use App\Models\Score;

class GameController
{
  use Guard;

  public function game()
  {
    $this->user();
    return view('game');
  }

  public function guessgame()
  {
    $this->user();
    return view('guess');
  }

  public function highscores()
  {
    $this->user();

    $scoreModel = new Score();
    $scores = $scoreModel->getScores();

    return view('highscores', [
        'scores' => $scores
    ]);
  }

  public function questions()
  {
    $this->user();

    $game = new Game();
    return $this->json($game->getQuestions());
  }

  public function lore()
  {
    $this->user();

    $game = new Game();
    return $this->json($game->getLore());
  }

  public function save()
  {
    $this->user();

    $input = json_decode(file_get_contents('php://input'), true);

    $score = filter_var($input['score'] ?? null, FILTER_VALIDATE_INT);

    if ($score === false || $score < 0) {
        return $this->json(['message' => 'Invalid score'], 400);
    }

    $user = Session::get('user');
    $game = new Game();

    if ($game->saveResult($user['id'], $score)) {
        return $this->json(['message' => 'Score saved successfully']);
    }

    return $this->json(['message' => 'Failed to save score'], 500);
  }

  private function json(array $data, int $status = 200): void
  {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
  }
}


