<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 4:14 AM
 */

namespace USC\interfaces;


use USC\lib\interfaces\ReadOnlyCollection;

interface Response
{
    public function __construct(Request $request, ReadOnlyCollection $params = null);

    public function render();
}