<?php

namespace App\Models;

use App\Model;

class Score extends Model
{
  private $table = 'scores';
  private $joinTable = 'users';

  public function getScores()
  {
    $sql = "SELECT score, username 
            FROM $this->table 
            JOIN $this->joinTable 
            ON scores.user_id = users.id 
            ORDER BY score DESC 
            LIMIT 10";

    $res = $this->db->query($sql);
    $scores = $res->get();

    return $scores;
  }

}