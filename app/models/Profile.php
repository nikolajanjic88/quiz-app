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
                WHERE id = :id
                LIMIT 1";

        return $this->db->query($sql, [
            'id' => $userId
        ])->find();
    }

    public function getStats(int $userId)
    {
        $sql = "SELECT
                    COUNT(*) AS games_played,
                    COALESCE(SUM(score), 0) AS total_score,
                    COALESCE(MAX(score), 0) AS best_score
                FROM {$this->scoresTable}
                WHERE user_id = :user_id";

        return $this->db->query($sql, [
            'user_id' => $userId
        ])->find();
    }

    public function getRecentScores(int $userId): array
    {
        $sql = "SELECT id, score, time
                FROM {$this->scoresTable}
                WHERE user_id = :user_id
                ORDER BY id DESC
                LIMIT 10";

        return $this->db->query($sql, [
            'user_id' => $userId
        ])->get();
    }

    public function usernameExists(string $username, int $userId): bool
    {
        $sql = "SELECT id
                FROM {$this->table}
                WHERE username = :username
                AND id != :id
                LIMIT 1";

        $result = $this->db->query($sql, [
            'username' => $username,
            'id' => $userId
        ])->find();

        return (bool) $result;
    }

    public function emailExists(string $email, int $userId): bool
    {
        $sql = "SELECT id
                FROM {$this->table}
                WHERE email = :email
                AND id != :id
                LIMIT 1";

        $result = $this->db->query($sql, [
            'email' => $email,
            'id' => $userId
        ])->find();

        return (bool) $result;
    }

    public function updateProfile(
        int $userId,
        string $username,
        string $email
    ): void {
        $sql = "UPDATE {$this->table}
                SET username = :username,
                    email = :email
                WHERE id = :id";

        $this->db->query($sql, [
            'username' => $username,
            'email' => $email,
            'id' => $userId
        ]);
    }

    public function getPassword(int $userId): ?string
    {
        $sql = "SELECT password
                FROM {$this->table}
                WHERE id = :id
                LIMIT 1";

        $result = $this->db->query($sql, [
            'id' => $userId
        ])->find();

        return $result['password'] ?? null;
    }

    public function updatePassword(int $userId, string $passwordHash): void
    {
        $sql = "UPDATE {$this->table}
                SET password = :password
                WHERE id = :id";

        $this->db->query($sql, [
            'password' => $passwordHash,
            'id' => $userId
        ]);
    }

}
