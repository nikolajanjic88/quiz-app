<?php

namespace App;

trait Guard 
{
  public function admin()
  {
    if(!Session::has('user'))
    {
      return redirect('/login');
    }

    if(Session::get('user')['is_admin'] != 1)
    {
      return redirect('/menu');
    }
  }

  public function user()
  {
    if(!Session::has('user'))
    {
      return redirect('/login');
    }
  }

  public function guest()
  {
    if(Session::has('user'))
    {
      return redirect('/menu');
    }
  }
}