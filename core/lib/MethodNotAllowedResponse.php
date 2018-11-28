<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 5:32 AM
 */

namespace USC\lib;


use USC\base\BaseErrorResponse;


class MethodNotAllowedResponse extends BaseErrorResponse
{
    const CODE = 405;
    const TITLE = 'Method not Allowed';
    protected $message = 'Method not Allowed';
}