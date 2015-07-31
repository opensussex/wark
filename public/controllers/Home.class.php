<?php

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