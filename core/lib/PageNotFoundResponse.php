<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 5:32 AM
 */

namespace USC\lib;


use USC\base\BaseErrorResponse;


class PageNotFoundResponse extends BaseErrorResponse
{
    const CODE = 404;
    const TITLE = 'Page not found';
    protected $message = 'Page or requested object does not exist.';
}