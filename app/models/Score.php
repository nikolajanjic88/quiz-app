<?php

namespace App\Models;

use App\Model;

class Score extends Model
{
  private string $table = 'scores';
  private string $joinTable = 'users';

  public function getScores(): array
  {
    $sql = "SELECT score, username 
            FROM $this->table 
            JOIN $this->joinTable 
            ON {$this->table}.user_id = {$this->joinTable}.id
            ORDER BY score DESC 
            LIMIT 10";

    $res = $this->db->query($sql);
    $scores = $res->get();

    return $scores;
  }

  public function getScoreCount(): int
  {
    $sql = "SELECT count(*) as total FROM $this->table";
    $res = $this->db->query($sql);
    $scoreCount = $res->find();

    return $scoreCount['total'];
  }

  public function averageScore(): float
  {
    $sql = "SELECT ROUND(AVG(score), 2) as avg_score FROM $this->table";
    $stmt = $this->db->query($sql);
    $avg = $stmt->find();
    
    return $avg['avg_score'];
  }

}