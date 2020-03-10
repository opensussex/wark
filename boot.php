<?php
require 'vendor/autoload.php';

use Wark\Wark\App;
use Wark\Wark\Router;

$coreDir = CORE_DIR;

$route = '';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}

session_start();
$router = new Router($route, $definedRoutes);
$app = new App($router->checkRoutes($route));
$app->go();
