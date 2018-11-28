<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/27/18
 * Time: 3:19 PM
 */

namespace USC\lib\interfaces;


interface ReadOnlyCollection
{
    public function __construct(array $data);

    public function get($key, $defaultValue = null);
}