<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Models\Profile;
use App\Request;

class ProfileController
{
    use Guard;

    private Profile $profileModel;
    private Request $request;

    public function __construct()
    {
        $this->profileModel = new Profile();
        $this->request = new Request();
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

        $profileErrors = \App\Session::get('profile_errors') ?? [];
        $profileOld = \App\Session::get('profile_old') ?? [];
        $profileSuccess = \App\Session::get('profile_success');

        return view('profile', [
            'user' => $user,
            'stats' => $stats,
            'recentScores' => $recentScores,
            'profileErrors' => $profileErrors,
            'profileOld' => $profileOld,
            'profileSuccess' => $profileSuccess
        ]);
    }

    
    public function update()
    {
        $this->user();

        $sessionUser = \App\Session::get('user');
        $userId = (int) ($sessionUser['id'] ?? 0);

        if ($userId <= 0) {
            return redirect('/login');
        }

        $request = $this->request->getBody();
        
        $username = trim($request['username'] ?? '');
        $email = trim($request['email'] ?? '');

        $errors = [];

        // Validate username
        if ($username === '') {
            $errors['username'] = 'Username is required.';
        } elseif (strlen($username) < 3) {
            $errors['username'] = 'Username must contain at least 3 characters.';
        } elseif ($this->profileModel->usernameExists($username, $userId)) {
            $errors['username'] = 'This username is already taken.';
        }

        // Validate email
        if ($email === '') {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        } elseif ($this->profileModel->emailExists($email, $userId)) {
            $errors['email'] = 'This email is already in use.';
        }

        if (!empty($errors)) {
            \App\Session::flash('profile_errors', $errors);
            \App\Session::flash('profile_old', [
                'username' => $username,
                'email' => $email
            ]);

            return redirect('/profile');
        }

        $this->profileModel->updateProfile(
            $userId,
            $username,
            $email
        );

        // Update the session data
        $_SESSION['user']['username'] = $username;
        $_SESSION['user']['email'] = $email;

        \App\Session::flash(
            'profile_success',
            'Your profile has been updated successfully.'
        );

        return redirect('/profile');
    }


}