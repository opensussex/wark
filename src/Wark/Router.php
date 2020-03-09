<?php
namespace Wark\Wark;

class Router
{

    private $route = null;
    private $definedRoutes = null;

    public function __construct($route, $definedRoutes)
    {
        $this->route = $route;
        $this->definedRoutes = $definedRoutes;
    }

    public function checkRoutes($route)
    {
        if (isset($this->definedRoutes[$route])) {
            return $this->definedRoutes[$route];
        }
        return explode('/', $route);
    }
}
