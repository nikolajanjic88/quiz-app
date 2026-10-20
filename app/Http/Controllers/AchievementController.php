<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Models\Achievement;

class AchievementController
{
    use Guard;

    private Achievement $achievementModel;

    public function __construct()
    {
        $this->achievementModel = new Achievement();
    }

    public function index()
    {
        $this->user();

        $sessionUser = \App\Session::get('user');
        $userId = (int) ($sessionUser['id'] ?? 0);

        if ($userId <= 0) {
            return redirect('/login');
        }

        $achievements = $this->achievementModel
            ->getAllForUser($userId);

        $totalAchievements = $this->achievementModel
            ->getTotalCount();

        $unlockedAchievements = $this->achievementModel
            ->getUnlockedCount($userId);

        $completion = $totalAchievements > 0
            ? (int) round(
                ($unlockedAchievements / $totalAchievements) * 100
            )
            : 0;

        return view('achievements', [
            'achievements' => $achievements,
            'totalAchievements' => $totalAchievements,
            'unlockedAchievements' => $unlockedAchievements,
            'completion' => $completion
        ]);
    }
}
