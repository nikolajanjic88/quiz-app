<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Session;
use App\Models\Game;
use App\Models\Score;

class GameController
{
  use Guard;

  public function highscores()
  {
    $this->user();
    $scores = new Score();
    $scores = $scores->getScores();

    return view('highscores', [
      'scores' => $scores
    ]);
  }

  public function game()
  {
    $this->user();
    return view('game');
  }

  public function save()
  {
    $this->user();
    $game = new Game();
    Session::put('message', 'Saved successfully');

    return $game->saveResult();
  }

  public function questions()
  {  
    $questions = new Game();
    
    return $questions->getQuestions();
  }
}