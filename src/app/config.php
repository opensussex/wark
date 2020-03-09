<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

define('CONTROLLER_DIR', '../src/app/controllers/');
define('CONTROLLER_SUFFIX', '.class.php');
define('VIEW_DIR', '../src/app/views/');
define('VIEW_SUFFIX', '.view.php');
define('MODEL_DIR', '../src/app/models/');
define('MODEL_SUFFIX', '.class.php');

define('CORE_DIR', dirname(__FILE__) . '/../../');
define('DEPLOY_DIR', '');
define('PRODUCTION', false);
