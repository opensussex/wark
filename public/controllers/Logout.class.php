<?php

    class logout extends Controller{
        
        private $meta_title = 'Profile';
        
        public function index(){// this is what we call
            if ($this->warkAuth()->logout()) {
                $this->redirect('register');
            }else {
                echo 'oooops';
            }
        }

    
    }