<?php
/*
 * This is the core controller class this will be extended by other controllers.
 * 
 */
 
 	class Controller{
 		private $db = null;
		private $template = null;
 		private $template_vars = array();
 		public function __construct($db){
			$this->db = $db;
 		}
		
		public function loadView($view, $view_vars = null, $buffer = false){
			/*
			 * This is a mechanism to load the view we wish to display.
			 */
			$view_file = VIEW_DIR . $view . VIEW_SUFFIX; // string for file	
			if(file_exists($view_file)){ // if the file exists
				if($buffer == true){
					return file_get_contents($view_file);
				}else{
					require_once($view_file);
				}
			}else{ // otherwise lets get an error
				echo "view file does not exist :: $view_file";
			}
		}
		
		
		public function loadModel($model){
			/*
			 * This is a mechanism to load the correct model
			 */
			$model = ucfirst($model);	// we want to upercase our model (if it isn't already');
			$model_file = MODEL_DIR . $model . MODEL_SUFFIX;	// the file string.
			if(file_exists($model_file)){ // check to see if it exists
				require_once($model_file);
				return new $model($this->db);
			}else{
				echo "model file does not exist :: $model_file";
			}			
		}
		
				
		public function redirect($uri){
			/*
			 * a simple redirect (if we need it);
			 */	
			header("location:index.php?route=$uri");
			die();
		}
 	}
?>
