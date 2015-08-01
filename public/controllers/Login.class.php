<?php

    class login extends Controller{
        
        private $meta_title = 'Login';
        
        public function index(){// this is what we call
            $view = 'login'; // set the home view.
            $content_vars = ['login_form'=>$this->loginForm()];
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
            
            $user = $warkAuth->findByCredentials($credentials);

            if ($user) {
                if ($warkAuth->login($user)) {
                    $this->redirect('/profile');
                } else {
                    $view = 'login';
                    $content_vars['login'] = $this->loginForm();
                    $content_vars['error_msg'] = 'error logging in';                    
                }
            } else {
                    $view = 'login';
                    $content_vars['login'] = $this->loginForm();
                    $content_vars['error_msg'] = 'user not found';
            }

            $this->loadView('header',['meta_title'=> $this->meta_title]); 
            $this->loadView($view,$content_vars);
            $this->loadView('footer');

        }


        private function loginForm()
        {
            $warkForm = new WarkForm();
            $warkForm->removeTable();
            $warkForm->form->setAction('/login/validate');
            $warkForm->form->setMethod('POST');
            $warkForm->form->addText('email','Email Address');
            $warkForm->form->addPassword('password','Password');
            $warkForm->form->addSubmit('send','Login');
            return $warkForm->form;
        }
    }