<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 5:45 AM
 */

namespace USC;

use USC\interfaces;
use USC\lib\PageNotFoundResponse;


class SimpleRouter implements interfaces\Router
{
    protected $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function getController($uri)
    {
        $result = null;
        $defaultController = null;

        if (array_key_exists('', $this->routes)) {
            $defaultController = $this->routes[''];
        }

        if (array_key_exists($uri, $this->routes)) {
            $result = $this->routes[$uri];
        }

        if (is_null($result) && !is_null($defaultController)) {
            $result = $defaultController;
        }

        return $result;
    }

}