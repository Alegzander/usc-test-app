<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 5:46 AM
 */

namespace USC\interfaces;


interface Router
{
    public function __construct(array $routes);

    /**
     * @param string $uri
     * @return Controller
     */
    public function getController($request);
}