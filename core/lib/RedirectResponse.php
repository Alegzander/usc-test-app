<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 4:27 AM
 */

namespace USC\lib;


use USC\interfaces;
use USC\lib\interfaces\ReadOnlyCollection;

class RedirectResponse implements interfaces\Response
{
    public function __construct(interfaces\Request $request)
    {
        // Nothing to do with request
    }

    public function render(ReadOnlyCollection $params = null)
    {
        header('Location: ' . $params->get('url'));
    }

}