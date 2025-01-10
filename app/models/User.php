<?php

namespace App\Models;

use App\Database;

abstract class User
{
  public $errors = [];
  protected $table = 'users';
  protected $db;
  protected $email = 'email';
  protected $password = 'password';
  protected $username = 'username';

  public function __construct()
  {
    $this->db = new Database();
  }

  abstract function validate($data);

  public function errors()
  {
    return $this->errors;
  }

  public function error($field, $message)
  {
    $this->errors[$field] = $message;
  }

  public function findUser($email)
  {
    $sql = "SELECT * FROM $this->table WHERE email = ?";
    $user = $this->db->query($sql, [$email])->find();
    
    return $user;
  }

  public function checkUserename($username)
  {
    $sql = "SELECT username FROM $this->table WHERE username = ?";
    $user = $this->db->query($sql, [$username])->find();
    
    return $user;
  }
}