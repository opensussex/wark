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


	$method = null;
	$method_val = null;

	if(isset($_GET['route'])){ 
		$route = explode('/',$_GET['route']);
		$controller = $route[0];
		if(isset($route[1])){
			$method = $route[1];
		}

		if(isset($route[2])){
			$method_val = $route[2];
		}
	}else{
		if(defined('DEFAULT_CONTROLLER')){
			$controller = DEFAULT_CONTROLLER;
		}else{
			$controller = 'home'; // this is our default view if nothing is passed.	
		}
		
	}	

	//Load the controller
	$controller_file = DEPLOY_DIR . CONTROLLER_DIR.ucfirst($controller).CONTROLLER_SUFFIX;
	
	if(!file_exists($controller_file)){ // check to see if the controller file exists, if it doesn't then we load the 404 page.
		$controller_file = DEPLOY_DIR . CONTROLLER_DIR.'Fourofour'.CONTROLLER_SUFFIX;
		$controller = 'Fourofour';
	}
	

	$db = new DbConnector();	
	include_once($controller_file);
	$ctrlObj = new $controller($db);


	if($method){
		if(method_exists($ctrlObj,$method)){
			$ctrlObj->$method($method_val);
			exit();
		}else{
			$ctrlObj->index();
		}
		
	}else{
		$ctrlObj->index($method_val);	
	}