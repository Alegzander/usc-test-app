<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 1:15 AM
 */

namespace USC\interfaces;


interface WebApp
{
    /**
     * @return array
     */
    public static function routes();

    /**
     * @return Request
     */
    public function getRequest();

    /**
     * @return Router
     */
    public function getRouter();
}