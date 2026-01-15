<?php
namespace App\Models;

use App\Model;

class Quote extends Model
{
    private string $table = 'quotes';

    public function getRandomQuote(): array
    {
        $sql = "SELECT q.*, l.title AS lore_title
                FROM {$this->table} q
                JOIN lore l ON q.lore_id = l.id
                ORDER BY RAND()
                LIMIT 1";
        $data = $this->db->query($sql)->findOrFail();

        return $data;
    }
}
