<?php

ini_set('display_errors',1);
ini_set('error_reporting', E_ALL);

	// database connectivity 
define('DB_HOST','localhost');
define('DB_NAME','dbname');
define('DB_USERNAME','user');
define('DB_PASSWORD','password');

define('CONTROLLER_DIR','controllers/');
define('CONTROLLER_SUFFIX','.class.php');
define('VIEW_DIR','views/');
define('VIEW_SUFFIX','.view.php');
define('MODEL_DIR','models/');
define('MODEL_SUFFIX','.class.php');

define('DOMAIN_ID',1);
define('DOMAIN_URL','bitcrypt.org');

include_once("core/Controller.class.php");
include_once("core/DbConnector.class.php");
include_once("core/Model.class.php");
include_once("core/Cookie.class.php");
?>
