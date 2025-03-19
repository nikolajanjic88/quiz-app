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

function is_image($path) 
{
    $a = getimagesize($path);
    if($a) 
    {
        $image_type = $a[2];
        if(in_array($image_type, [IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP, IMAGETYPE_WEBP]))
        {
            return true;
        }
    }
    return false;
}


function validImageDimensions($image, $width, $height)
{
    if(!empty($image) && (getimagesize($image)[0] > $width || getimagesize($image)[1] > $height))
    {
        return false;
    }

    return true;
}