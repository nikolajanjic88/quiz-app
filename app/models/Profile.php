<?php

namespace App\Models;

use App\Model;

class Profile extends Model
{
    private string $table = 'users';
    private string $scoresTable = 'scores';

    public function getProfile(int $userId)
    {
        $sql = "SELECT id, username, email, created_at
                FROM {$this->table}
                WHERE id = {$userId}
                LIMIT 1";

        return $this->db->query($sql)->find();
    }

    public function getStats(int $userId)
    {
        $sql = "SELECT
                    COUNT(*) AS games_played,
                    COALESCE(SUM(score), 0) AS total_score,
                    COALESCE(MAX(score), 0) AS best_score
                FROM {$this->scoresTable}
                WHERE user_id = {$userId}";

        return $this->db->query($sql)->find();
    }

    public function getRecentScores(int $userId): array
    {
        $sql = "SELECT id, score, time
                FROM {$this->scoresTable}
                WHERE user_id = {$userId}
                ORDER BY id DESC
                LIMIT 10";

        return $this->db->query($sql)->get();
    }
}