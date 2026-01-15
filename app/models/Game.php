<?php

namespace App\Models;

use App\Model;
use App\Session;

class Game extends Model
{
  private string $table = 'questions';
  private string $scoresTable = 'scores';
  private string $loreTable = 'lore';

  public function getQuestions(): array
  {
    $sql = "SELECT question, incorrect_answers, correct_answer FROM {$this->table}";
    $stmt = $this->db->query($sql);

    $questions = [];

    while ($row = $stmt->find()) {
        $questions[] = $this->formatQuestion($row);
    }

    return $questions;
  }

  private function formatQuestion(array $row): array
  {
    return [
        'question' => html_entity_decode($row['question']),
        'correct_answer' => html_entity_decode($row['correct_answer']),
        'incorrect_answers' => json_decode($row['incorrect_answers'], true)
    ];
  }

  public function getLore(): array
  {
    $sql = "SELECT title AS lore_title, image FROM {$this->loreTable} ORDER BY RAND() LIMIT 1";
    $data = $this->db->query($sql)->findOrFail();

    return $data;
  }

  public function saveResult(int $userId, int $score): bool
  {
    $sql = "INSERT INTO {$this->scoresTable} (user_id, score) VALUES (:user_id, :score)";

    return (bool) $this->db->query($sql, [
        'user_id' => $userId,
        'score'   => $score
    ]);
  }
}
