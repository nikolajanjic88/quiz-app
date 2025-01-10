<?php

use App\Session;

session_start();

const BASE_PATH = __DIR__ . '/../';

require_once BASE_PATH . '/config/config.php';
require_once BASE_PATH . '/vendor/autoload.php';
require_once BASE_PATH . '/routes/web.php';
require_once BASE_PATH . '/app/functions.php';

$app->run();
Session::unflash();