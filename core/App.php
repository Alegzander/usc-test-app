<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/27/18
 * Time: 3:08 PM
 */

namespace USC;


abstract class App implements \USC\interfaces\App
{
    /**
     * @var \USC\interfaces\App
     */
    public static $app;

    public static function run()
    {
        if (!static::$app instanceof App) {
            static::$app = new static();
        }
    }
}
