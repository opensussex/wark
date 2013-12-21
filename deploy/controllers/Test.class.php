<?php
	class Test extends Controller{
		
		
		public function index($var = null){// this is what we call
			echo '!!!' . $var;
		}

		public function testmethod($var = null){
			echo 'testmethod ' . $var;
		}
	
	}
?>
