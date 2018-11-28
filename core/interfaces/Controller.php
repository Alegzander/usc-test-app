<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 4:20 AM
 */

namespace USC\interfaces;


interface Controller
{
    /**
     * @param Request $request
     * @return Response
     */
    public function run(Request $request);
}