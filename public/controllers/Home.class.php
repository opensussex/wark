<?php
/*
 * Controller for the Home Page
 * This controller will Check to see if an order has been made :
 * 1) Write Order to DB
 * 2) Remove Cookie
 * 
 * If no Order has been Made
 * 1) Display the viewed documents.
 * 
 */
	class Home extends Controller{
		
		private $meta_title = 'Deploy Test with RedBeanPHP';
		
		public function index(){// this is what we call
			$view = 'home'; // set the home view.
			$content_vars = null;
			$this->loadView('header',array('meta_title'=> $this->meta_title)); 
			$this->loadView($view,$content_vars);
			$this->loadView('footer');
		}
	
	}
?>
