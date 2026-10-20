<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Models\Achievement;
use App\Models\Game;
use App\Models\Score;
use App\Session;

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
        'scores' => $scores,
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

      $score = filter_var(
          $input['score'] ?? null,
          FILTER_VALIDATE_INT
      );

      $time = filter_var(
          $input['time'] ?? null,
          FILTER_VALIDATE_INT
      );

      if ($score === false || $score < 0 || $score > 100) {
          return $this->json([
              'message' => 'Invalid score'
          ], 400);
      }

      if ($time === false || $time < 0) {
          return $this->json([
              'message' => 'Invalid time'
          ], 400);
      }

      $user = Session::get('user');
      $userId = (int) ($user['id'] ?? 0);

      if ($userId <= 0) {
          return $this->json([
              'message' => 'User not found'
          ], 401);
      }

      $game = new Game();

      if (!$game->saveResult($userId, $score, $time)) {
          return $this->json([
              'message' => 'Failed to save score'
          ], 500);
      }

      $achievement = new Achievement();

      // Count the user's completed quizzes.
      $completedQuizzes = $game->getCompletedQuizCount($userId);

      // Unlock the first achievement.
      if ($completedQuizzes >= 1) {
          $achievement->unlockByCode($userId, 'first_steps');
      }

      // Unlock the achievement for completing 10 quizzes.
      if ($completedQuizzes >= 10) {
          $achievement->unlockByCode($userId, 'lore_keeper');
      }

      // Unlock achievements based on the latest quiz score.
      if ($score >= 90) {
          $achievement->unlockByCode($userId, 'master_of_arda');
      }

      if ($score === 100) {
          $achievement->unlockByCode($userId, 'perfect_round');
      }

      return $this->json([
          'message' => 'Score saved successfully',
          'completedQuizzes' => $completedQuizzes
      ]);
  }

  private function json(array $data, int $status = 200): void
  {
    http_response_code($status);
    header('Content-Type: application/json');
    echo json_encode($data);
    exit;
  }
}


