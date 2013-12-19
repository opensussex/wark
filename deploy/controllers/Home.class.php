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
			try{
				$user = R::dispense('user');
				$user->username = 'Bob_Dobbs';
	    		$user->email = 'bob@dobbs.com';
	    		$user->password = 'G1veMeSlack';
	    		$id = R::store($user);
	    		echo $id;
    		}catch(Exception $e){
    			echo 'Caught exception: ',  $e->getMessage(), "\n";
			}
			$this->loadView('header',array('meta_title'=> $this->meta_title)); 
			$this->loadView($view,$content_vars);
			$this->loadView('footer');
		}
	
	}
?>
