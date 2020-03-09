<?php
namespace Wark;

class App
{

    private $route = null;
    public function __construct($route)
    {
        $this->route = $route;
    }

    public function go()
    {

        $method = null;
        $method_val = null;
        if ($this->route) {
            //$route = explode('/',$_GET['route']);
            $controller = $this->route[0];
            if (isset($this->route[1])) {
                $method = $this->route[1];
            }

            if (isset($this->route[2])) {
                $method_val = $this->route[2];
            }
        } else {
            if (defined('DEFAULT_CONTROLLER')) {
                $controller = DEFAULT_CONTROLLER;
            } else {
                $controller = 'home'; // this is our default view if nothing is passed.
            }

        }
        //Load the controller
        $controller_file = DEPLOY_DIR . CONTROLLER_DIR.ucfirst($controller).CONTROLLER_SUFFIX;

        if (!file_exists($controller_file)) {
            // check to see if the controller file exists, if it doesn't then we load the 404 page.
            $controller_file = DEPLOY_DIR . CONTROLLER_DIR.'Fourofour'.CONTROLLER_SUFFIX;
            $controller = 'Fourofour';
        }


        include_once($controller_file);
        $ctrlObj = new $controller();


        if ($method) {
            if (method_exists($ctrlObj, $method)) {
                $ctrlObj->$method($method_val);
                exit();
            } else {
                $ctrlObj->index();
            }

        } else {
            $ctrlObj->index($method_val);
        }
    }
}
