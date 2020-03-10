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
    public function __construct(string $route = '', array $definedRoutes = [])
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
        $explodedRoute = explode('/', $route);
        if (isset($explodedRoute[1])) {
            $pattern = '/('.$explodedRoute[0].')\/('.$explodedRoute[1].')/';
            if ($routeIndex = $this->checkKeyExists($pattern, $this->definedRoutes)) {
                if (isset($explodedRoute[2])) {
                    array_push($this->definedRoutes[$routeIndex], $explodedRoute[2]);
                }
                return $this->definedRoutes[$routeIndex];
            }
        }
        return $explodedRoute;
    }


    /**
     * Determines if check key exists.
     *
     * @param      string  $pattern        The pattern
     * @param      array   $definedRoutes  The defined routes
     *
     * @return     mix   string if true, False otherwise.
     */
    private function checkKeyExists(string $pattern, array $definedRoutes)
    {
        $keys = array_keys($definedRoutes);
        foreach ($keys as $key) {
            if (preg_match($pattern, $key)) {
                return $key;
            }
        }
        false;
    }
}
