<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 4:22 AM
 */

namespace USC\base;


use USC\interfaces\Controller;
use USC\interfaces\Request;
use USC\lib\MethodNotAllowedResponse;

class BaseController implements Controller
{
    public function run(Request $request)
    {
        $method = mb_strtolower($request->getMethod());

        if (!method_exists($this, $method)) {
            return new MethodNotAllowedResponse($request);
        }

        // Calls method post, get and etc depending on request method
        return $this->$method($request);
    }
}