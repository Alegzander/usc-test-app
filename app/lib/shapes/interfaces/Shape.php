<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 7:19 AM
 */

namespace App\lib\shapes\interfaces;


use USC\lib\interfaces\ReadOnlyCollection;

interface Shape
{
    public function __construct(ReadOnlyCollection $params);
    public function getResult();
}