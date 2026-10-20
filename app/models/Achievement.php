<?php

namespace App\Models;

use App\Model;

class Achievement extends Model
{
    private string $table = 'achievements';
    private string $userAchievementsTable = 'user_achievements';

    /**
     * Returns all achievements and their status for a specific user.
     */
    public function getAllForUser(int $userId): array
    {
        $sql = "SELECT
                    a.id,
                    a.code,
                    a.name,
                    a.description,
                    a.icon,
                    a.requirement,
                    ua.unlocked_at,
                    CASE
                        WHEN ua.id IS NOT NULL THEN 1
                        ELSE 0
                    END AS unlocked
                FROM {$this->table} a
                LEFT JOIN {$this->userAchievementsTable} ua
                    ON ua.achievement_id = a.id
                    AND ua.user_id = :user_id
                ORDER BY a.id ASC";

        return $this->db->query($sql, [
            'user_id' => $userId
        ])->get();
    }

    /**
     * Returns the total number of achievements.
     */
    public function getTotalCount(): int
    {
        $sql = "SELECT COUNT(*) AS total
                FROM {$this->table}";

        $result = $this->db->query($sql)->find();

        return (int) ($result['total'] ?? 0);
    }

    /**
     * Returns the number of achievements unlocked by the user.
     */
    public function getUnlockedCount(int $userId): int
    {
        $sql = "SELECT COUNT(*) AS total
                FROM {$this->userAchievementsTable}
                WHERE user_id = :user_id";

        $result = $this->db->query($sql, [
            'user_id' => $userId
        ])->find();

        return (int) ($result['total'] ?? 0);
    }

    /**
     * Unlocks an achievement if it has not already been unlocked.
     */
    public function unlock(int $userId, int $achievementId): void
    {
        $sql = "INSERT INTO {$this->userAchievementsTable}
                    (user_id, achievement_id)
                VALUES
                    (:user_id, :achievement_id)
                ON DUPLICATE KEY UPDATE
                    id = id";

        $this->db->query($sql, [
            'user_id' => $userId,
            'achievement_id' => $achievementId
        ]);
    }


    /**
     * Unlocks an achievement by its code if it exists.
     */
    public function unlockByCode(int $userId, string $code): void
    {
        $sql = "SELECT id
                FROM {$this->table}
                WHERE code = :code
                LIMIT 1";

        $result = $this->db->query($sql, [
            'code' => $code
        ])->find();

        if ($result !== null && $result !== false) {
            $this->unlock($userId, (int) $result['id']);
        }
    }
}
