<?php

	include_once(CORE_DIR."Controller.class.php");
	include_once(CORE_DIR."DbConnector.class.php");
	include_once(CORE_DIR."Model.class.php");

	if(defined('THIRD_PARTY_LIBS')){
		foreach(unserialize(THIRD_PARTY_LIBS) as $lib){
			include_once($lib);
		}
	}

	if(isset($_GET['route'])){ 
		$route = $_GET['route'];
		$controller = str_replace('.html','',$route);
	}else{
		$controller = 'home'; // this is our default view if nothing is passed.
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
	$ctrlObj->index();

?>