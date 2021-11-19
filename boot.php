<?php
require 'vendor/autoload.php';

$classMap = array_keys(require('vendor/composer/autoload_classmap.php'));

use Wark\Wark\App;
use Wark\Wark\Router;

$coreDir = CORE_DIR;

$route = '';

if (isset($_GET['route'])) {
    $route = $_GET['route'];
}

session_start();
$router = new Router($route, $definedRoutes);
$database = new Nette\Database\Connection('sqlite:'.SQLITE_FILE, '', '');
$app = new App($router->checkRoutes($route), $database);
$app->go();

