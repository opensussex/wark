<?php
require 'vendor/autoload.php';

use Wark\Wark\App;
use Wark\Wark\Router;

$coreDir = CORE_DIR;

$route = null;

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}

session_start();
$app = new App((new Router($route, $definedRoutes))->checkRoutes($route));
$app->go();
