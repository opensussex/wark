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
		
		private $meta_title = 'Add User';
		
		public function index(){// this is what we call
			$view = 'home'; // set the home view.
			$user = $this->loadModel('VirtualUserModel'); // initiate the VirtualUserModel
			$this->loadView('header',array('meta_title'=> $this->meta_title)); 
			if(isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['password2'])){
				// we want to do some simple validation
				if($_POST['email'] == '' || $_POST['password1'] == ''){
					$content_vars['message'] = 'We require both email and password';
				}elseif($_POST['password1'] != $_POST['password2']){
					$content_vars['message'] = 'Passwords do not match';
				}else{ // if everthing is ok
					if($user->addUser(array('email'=>$_POST['email'],'password'=>$_POST['password1']))){
						// of addUser method returns true
						$content_vars['message'] = 'User Added';
					}else{
						// otherwise we just send an error.
						$content_vars['message'] = 'Problem Adding User';
						//$this->loadView('error',$content_vars);	
					}
				}
			}
			$this->loadView($view,$content_vars);
			$this->loadView('footer');
		}
	
	}
?>
