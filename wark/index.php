<?php
/*
 * This is the index page.
 * It's the main point of entry and essentially the router.  
 * We use some Rewrite rules on the .htaccess.
 * 
 * for this example the route maps directly to a controller.  
 * 
 */
	include_once('config.php'); 
	
	
	if(isset($_GET['route'])){ 
		$route = $_GET['route'];
		$controller = str_replace('.html','',$route);
	}else{
		$controller = 'home'; // this is our default view if nothing is passed.
	}	
	
	
	//Load the controller
	$controller_file = CONTROLLER_DIR.ucfirst($controller).CONTROLLER_SUFFIX;
	
	if(!file_exists($controller_file)){ // check to see if the controller file exists, if it doesn't then we load the 404 page.
		$controller_file = CONTROLLER_DIR.'Fourofour'.CONTROLLER_SUFFIX;
		$controller = 'Fourofour';
	}
	
	$db = new DbConnector();
	include_once($controller_file);
	$ctrlObj = new $controller($db);
	$ctrlObj->index();
	
	// we include the view file that we wish to use.
	
?>
