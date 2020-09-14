<?php

// Фронт контроллер

// 1. Ошибки высвечиваются/включено

//ini_set('display_errors',0 );
session_start();
error_reporting(E_ALL);
define('VIEWS_URL', dirname(__FILE__).'/resources/views/');
define('ASSETS_URL', dirname(__FILE__).'/resources/assets/');

require_once 'vendor/autoload.php';
// 4. Вызор Router

use App\Components\Router;
$router = new Router();
$router->run();
//5. Start session
