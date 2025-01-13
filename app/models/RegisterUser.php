<?php

namespace App\Models;

class RegisterUser extends User
{
  public function registerUser($username, $email, $password)
  {
    $sql = "INSERT INTO $this->table (username, email, password)
                              VALUES (:username, :email, :password)";
    $this->db->query($sql, ['username' => $username, 'email' => $email, 'password' => $password]);
  }

  public function validate($data)
  {
    $user = $this->findUser($data[$this->email]);
    $username = $this->checkUserename($data[$this->username]);

    if(trim($data[$this->email]) === '') 
    {
      $this->errors[$this->email] = 'Email required';
    } 
    else if(!filter_var($data[$this->email], FILTER_VALIDATE_EMAIL))
    {
      $this->errors[$this->email] = 'Invalid email';
    }
    else if($user)
    {
      $this->errors[$this->email] = 'User with that email already exists';
    }

    if(trim($data[$this->username]) === '')
    {
      $this->errors[$this->username] = 'Username required';
    }
    else if($username)
    {
      $this->errors[$this->username] = 'Username taken';
    }

    if(trim($data[$this->password]) === '') 
    {
      $this->errors[$this->password] = 'Password required';
    }   
    else if(!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/", $data[$this->password]))
    {
      $this->errors[$this->password] = 'Minimum eight characters, at least one letter, one number and one special character';
    }
    else if($data[$this->password] != $data['rpassword'])
    {
      $this->errors[$this->password] = 'Passwords do not match';
    }   

    return empty($this->errors);  
  }
}