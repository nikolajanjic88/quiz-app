<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Models\Profile;

class ProfileController
{
    use Guard;

    private Profile $profileModel;

    public function __construct()
    {
        $this->profileModel = new Profile();
    }

    public function index()
    {
        $this->user();

        $sessionUser = \App\Session::get('user');
        $userId = (int) ($sessionUser['id'] ?? 0);

        if ($userId <= 0) {
            return redirect('/login');
        }

        $user = $this->profileModel->getProfile($userId);

        if (!$user) {
            return redirect('/menu');
        }

        $stats = $this->profileModel->getStats($userId);
        $recentScores = $this->profileModel->getRecentScores($userId);

        return view('profile', [
            'user' => $user,
            'stats' => $stats,
            'recentScores' => $recentScores
        ]);
    }
}