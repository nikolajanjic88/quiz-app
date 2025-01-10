<?php

namespace App\Models;

class LoginUser extends User 
{
  public function validate($data) 
  {
    $user = $this->findUser($data[$this->email]);

    if(trim($data[$this->email]) === '') 
    {
      $this->errors[$this->email] = 'Email required';
    } 
    else if(!filter_var($data[$this->email], FILTER_VALIDATE_EMAIL))
    {
      $this->errors[$this->email] = 'Invalid email';
    }
    else if(!$user) 
    {
      $this->errors[$this->email] = "User doesn't exist";
    }

    if(trim($data[$this->password]) === '') 
    {
      $this->errors[$this->password] = 'Password required';
    }   
    else if($user && !password_verify($data[$this->password], $user['password'])) 
    {
      $this->errors[$this->password] = 'Wrong password';
    }

    return empty($this->errors);    
  }

}