<?php

namespace App\Models;

use App\Model;

class Lore extends Model
{
  private $table = 'lore';

  public function all()
  {
    $sql = "SELECT * FROM $this->table 
                     ORDER BY id DESC"; 

    $data = $this->db->query($sql)->get();

    return $data;
  }

  public function find($id)
  {
    $sql = "SELECT * FROM $this->table 
                     WHERE id = ?"; 

    $data = $this->db->query($sql, [$id])->findOrFail();

    return $data;
  }
}