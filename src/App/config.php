<?php

ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

define('VIEW_DIR', '../src/App/Views/');
define('VIEW_SUFFIX', '.view.php');

define('CORE_DIR', dirname(__FILE__) . '/../../');
define('DEPLOY_DIR', '');
define('PRODUCTION', false);

define('SQLITE_FILE', dirname(__FILE__) . '/../../storage/storage.sqlite3');
