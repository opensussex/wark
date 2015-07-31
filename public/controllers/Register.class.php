<?php

    class Register extends Controller{
        
        private $meta_title = 'Register';
        
        public function index(){// this is what we call
            $view = 'register'; // set the home view.
            $content_vars = ['register_form'=>$this->registrationForm()];
            $this->loadView('header',['meta_title'=> $this->meta_title]); 
            $this->loadView($view,$content_vars);
            $this->loadView('footer');
        }

        public function validate()
        {
            $warkAuth = new WarkAuth();
            $content_vars = [];
            $credentials = [
                            'password'=>$_POST['password'],
                            'email'=>$_POST['email']
                        ];
            if ($warkAuth->validForCreation($credentials)) {
                if ($warkAuth->registerAndActivate($credentials)) {
                    $view = 'register_ok';
                    if(!$warkAuth->authenticateAndRemember($credentials)) {
                        $content_vars['error_msg'] = 'authentication failed';
                    }
                } else {
                    $view = 'register';
                    $content_vars['register_form'] = $this->registrationForm();
                    $content_vars['error_msg'] = 'email taken';
                }
            } else {
                    $view = 'register';
                    $content_vars['register_form'] = $this->registrationForm();
                    $content_vars['error_msg'] = 'invalid form entry';
            }
            $this->loadView('header',['meta_title'=> $this->meta_title]); 
            $this->loadView($view,$content_vars);
            $this->loadView('footer');

        }


        private function registrationForm()
        {
            $warkForm = new WarkForm();
            $warkForm->removeTable();
            $warkForm->form->setAction('/register/validate');
            $warkForm->form->setMethod('POST');
            $warkForm->form->addText('email','Email Address');
            $warkForm->form->addPassword('password','Password');
            $warkForm->form->addSubmit('send','Register');
            return $warkForm->form;
        }
    
    }