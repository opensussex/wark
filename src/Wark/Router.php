<?php
namespace Wark\Wark;

class Router
{

    private $route = null;
    private $definedRoutes = null;

    /**
     * Constructs a new instance.
     *
     * @param      string  $route          The route
     * @param      array   $definedRoutes  The defined routes
     */
    public function __construct(string $route, array $definedRoutes)
    {
        $this->route = $route;
        $this->definedRoutes = $definedRoutes;
    }


    /**
     * checks a route
     *
     * @param      string  $route  The route
     *
     * @return     array
     */
    public function checkRoutes(string $route) : array
    {
        if (isset($this->definedRoutes[$route])) {
            return $this->definedRoutes[$route];
        }
        return explode('/', $route);
    }
}
