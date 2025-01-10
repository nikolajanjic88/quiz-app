<?php

namespace App\Http\Controllers;

use App\Guard;
use App\Session;

class HomeController
{
  use Guard;

  public function index()
  {  
    return view('home');
  }

  public function menu()
  {
    $this->user();
    $username = Session::get('user')['username'];
    
    return view('menu', ['username' => $username]);
  }
}