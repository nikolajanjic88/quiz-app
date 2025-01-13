<?php

namespace App\Models;

use App\Model;
use App\Session;

class Game extends Model
{
  private string $table = 'questions';
  private string $scoresTable = 'scores';

  public function getQuestions()
  {
    $sql = "SELECT question, incorrect_answers, correct_answer FROM $this->table";

    $stmt = $this->db->query($sql);

    $data = [];
    
    while ($row = $stmt->find()) {
        $row['incorrect_answers'] = json_decode($row['incorrect_answers']);
        $data[] = $row;
    }

    header('Content-Type: application/json');

    echo json_encode($data);
  }

  public function saveResult()
  {
    $input = json_decode(file_get_contents('php://input'), true);
    $score = $input['score'];

    $sql = "INSERT INTO $this->scoresTable (score, user_id) VALUES (:score, :user_id)";

    $res = $this->db->query($sql, ['score' => $score, 'user_id' => Session::get('user')['id']]);

    if($res) 
    {
      echo json_encode(['message' => 'Score inserted successfully']);
    } 
    else 
    {
      echo json_encode(['message' => 'Failed to insert score']);
    }
  }
}