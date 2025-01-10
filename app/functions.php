<?php

function dd($arr)
{
    echo '<pre>'; 
    print_r($arr);
    echo '</pre>';
    die();
}

function view($path, $params = [])
{
    extract($params);
    require BASE_PATH . "/views/$path.php";
}

function old($key, $default = '') 
{
  return App\Session::get('old')[$key] ?? $default;
}

function redirect($route)
{
  header('location: ' . $route);
  exit;
}

function urlIs($value) 
{
    return $_SERVER['PATH_INFO'] === $value;   
}

function abort($code = 404) 
{
  http_response_code($code);
  require_once BASE_PATH . "views/$code.php";
  die();
}