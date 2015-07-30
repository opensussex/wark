<?php

	require '../vendor/autoload.php';
	$coreDir = CORE_DIR;
	// MindTools class autoloader
	spl_autoload_register(function ($class) use ($coreDir) { wark_autoloader($class, $coreDir); });
	spl_autoload_register(function ($class) use ($coreDir) { wark_autoloader($class, $coreDir.'/models'); });
	spl_autoload_register(function ($class) use ($coreDir) { wark_autoloader($class, $coreDir.'/utilities'); });

	function wark_autoloader($class, $dir)
	{
	    $file = $dir . DIRECTORY_SEPARATOR . $class . '.class.php';

	    if (file_exists($file)) {

	        require $file;

	        return;
	    }

	    $file = $dir . DIRECTORY_SEPARATOR . $class . '.php';

	    if (file_exists($file)) {
	        require $file;

	        return;
	    }
	}


	$route = null;
	if (isset($_GET['route'])) {
		$route = $_GET['route'];
	}

	$db = new DbConnector();
	$wark = new Wark($db);
	$wark->go($route);