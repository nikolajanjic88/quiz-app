<?php

namespace App;

class Request 
{
  public function getPath()
  {
    $path = $_SERVER['REQUEST_URI'] ?? '/';
    $position = strpos($path, '?');

    if($position === false) 
    {
      return $path;
    }

    return substr($path, 0, $position);
  }

  public function method()
  {
    return strtoupper($_SERVER['REQUEST_METHOD']);
  }

  public function getBody()
  {
    $body = [];
    
    if($this->method() === 'GET')
    {
      foreach($_GET as $key => $value)
      {
        $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }

    if($this->method() === 'POST')
    {
      foreach($_POST as $key => $value)
      {
        if(is_array($value))
        {
          foreach($value as $key2 => $item)
          {
            $body[$key][$key2] = htmlspecialchars($item);
          }
        }
        else $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
      }
    }

    return $body;
  }

}