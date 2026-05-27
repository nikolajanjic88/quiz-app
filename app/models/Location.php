<?php

namespace App\Models;

use App\Model;

class Location extends Model
{
    private string $table = 'locations';

    public function getQuestions(int $count = 10)
    {
        $count = (int)$count;

        $sql = "SELECT id, name, slug
                FROM {$this->table}
                ORDER BY RAND()
                LIMIT {$count}";

        return $this->db
            ->query($sql)
            ->get();
    }


}