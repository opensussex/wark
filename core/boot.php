<?php

	include_once(CORE_DIR."Controller.class.php");
	include_once(CORE_DIR."DbConnector.class.php");
	include_once(CORE_DIR."Model.class.php");

	if(defined('THIRD_PARTY_LIBS')){
		foreach(unserialize(THIRD_PARTY_LIBS) as $lib){
			include_once($lib);
		}
	}

	if(defined('USE_RBPHP')){
		if(USE_RBPHP){
			// we want to use RedBeanPHP as our ORM as such we want to see if we need to load some models.
			R::setup('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USERNAME,DB_PASSWORD);
			if(defined('PRODUCTION')){
				if(PRODUCTION){
					R::freeze( true );
				}
			}
		}
	}

	if(defined('DEPLOYED_LIBS')){
		foreach(unserialize(DEPLOYED_LIBS) as $lib){
			include_once($lib);
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
		$controller = 'home'; // this is our default view if nothing is passed.
	}	

	//Load the controller
	$controller_file = DEPLOY_DIR . CONTROLLER_DIR.ucfirst($controller).CONTROLLER_SUFFIX;
	
	if(!file_exists($controller_file)){ // check to see if the controller file exists, if it doesn't then we load the 404 page.
		$controller_file = DEPLOY_DIR . CONTROLLER_DIR.'Fourofour'.CONTROLLER_SUFFIX;
		$controller = 'Fourofour';
	}
	
	if(USE_RBPHP){
		include_once($controller_file);
		$ctrlObj = new $controller();
	}else{
		$db = new DbConnector();	
		include_once($controller_file);
		$ctrlObj = new $controller($db);
	}
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
	

	


?>
