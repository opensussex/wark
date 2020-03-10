<?php
namespace Wark\Wark;

class App
{

    private $route = null;
    private $db = null;


    /**
     * Constructs a new instance.
     *
     * @param      array  $route  The route
     */
    public function __construct(array $route, $db)
    {
        $this->route = $route;
        $this->db = $db;
    }


    /**
     * start of the application
     */
    public function go()
    {
        $method = null;
        $methodVal = null;
        if ($this->route) {
            $controller = $this->route[0];
            if (isset($this->route[1])) {
                $method = $this->route[1];
            }

            if (isset($this->route[2])) {
                $methodVal = $this->route[2];
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
        $ctrlObj = new $controller($this->db);


        if ($method) {
            if (method_exists($ctrlObj, $method)) {
                $ctrlObj->$method($methodVal);
                exit();
            } else {
                $ctrlObj->index();
            }
        } else {
            $ctrlObj->index($methodVal);
        }
    }
}
