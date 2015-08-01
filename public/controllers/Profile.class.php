<?php

    class Profile extends Controller{
        
        private $meta_title = 'Profile';
        
        public function index(){// this is what we call
            if ($this->isLoggedIn()) {
                echo 'LOGGED IN';
            } else {
                $this->redirect('/login');
            }
        }

    
    }