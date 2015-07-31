<?php

    class Register extends Controller{
        
        private $meta_title = 'Register';
        
        public function index(){// this is what we call
            $view = 'register'; // set the home view.
            $content_vars = null;
            //$this->warkAuth()->register(['email'=>'opensussex@gmail.com','password'=>'tipple']);
            $warkForm = new WarkForm();
            $warkForm->form->setAction('register/validate');
            $warkForm->form->setMethod('POST');
            $warkForm->form->addText('email','Email Address');
            $warkForm->form->addPassword('password','Password');
            $warkForm->form->addSubmit('send','Register');
            $register_form = $warkForm->form;
            $content_vars = ['register_form'=>$register_form];
            $this->loadView('header',['meta_title'=> $this->meta_title]); 
            $this->loadView($view,$content_vars);
            $this->loadView('footer');
        }

        public function validate()
        {
            d($_POST);

        }
    
    }
?>
