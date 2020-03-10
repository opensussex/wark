<?php
namespace Wark\Wark;

class App
{

    private $route = null;


    /**
     * Constructs a new instance.
     *
     * @param      array  $route  The route
     */
    public function __construct(array $route)
    {
        $this->route = $route;
    }


    /**
     * start of the application
     */
    public function go()
    {

        $method = null;
        $method_val = null;
        if ($this->route) {
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
                $controller = 'home';
            }
        }

        $controller = ucfirst($controller);
        $controller = "\\Wark\\App\\Controllers\\$controller";

        if (!class_exists($controller)) {
            $controller = '\\Wark\\App\\Controllers\\Fourofour';
        }
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
