<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Models\LoginUser;
use App\Models\RegisterUser;
use App\Request;
use App\Session;

class UserController 
{
  use Guard;

  private $request;
  private $loginUser;
  private $registerUser;

  public function __construct()
  {
    $this->request = new Request();
    $this->loginUser = new LoginUser();
    $this->registerUser = new RegisterUser();
  }

  public function loginForm()
  {
    $this->guest();
    
    return view('login', [
      'errors' => Session::get('errors')
    ]);
  }

  public function login()
  {
    $this->guest();
    $request = $this->request->getBody();

    if(!$this->loginUser->validate($request))
    {
      Session::flash('errors', $this->loginUser->errors());
      Session::flash('old', [
          'email' => $request['email']
      ]);

      return view('login', [
        'errors' => Session::get('errors')
      ]);
    }

    $user = $this->loginUser->findUser($request['email']);
    Session::put('message', 'You have logged in successfully');
    
    Session::put('user', [
      'id' => $user['id'],
      'username' => $user['username'],
      'is_admin' => $user['is_admin']
    ]);
    
    return redirect('/menu'); 
  }

  public function logout()
  {
    Session::destroy();

    return redirect('/login');
  }

  public function registerForm()
  {
    $this->guest();
    
    return view('register', [
      'errors' => Session::get('errors')
    ]);
  }

  public function register()
  {
    $this->guest();
    $request = $this->request->getBody();
    $username = $request['username'];
    $email = $request['email'];
    $password = password_hash($request['password'], PASSWORD_DEFAULT);

    if(!$this->registerUser->validate($request))
    {
      Session::flash('errors', $this->registerUser->errors());
      Session::flash('old', [
          'email' => $request['email'],
          'username' => $request['username']
      ]);
     
      return view('register', [
        'errors' => Session::get('errors')
      ]);
    }

    $this->registerUser->registerUser($username, $email, $password);
    Session::put('message', 'You have registered successfully');

    return redirect('/login');
  }
}