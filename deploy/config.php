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

define('CORE_DIR','/var/www/wark/core/');
define('DEPLOY_DIR','/var/www/wark_deploy/');

define('THIRD_PARTY_LIBS',serialize(array(
		'/var/www/libs/redbeanphp/rb.php'
	)));

define('USE_RBPHP',true);

define('PRODUCTION',false);
?>
