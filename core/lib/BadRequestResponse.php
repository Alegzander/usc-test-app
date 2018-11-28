<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 5:32 AM
 */

namespace USC\lib;


use USC\base\BaseErrorResponse;


class BadRequestResponse extends BaseErrorResponse
{
    const CODE = 400;
    const TITLE = 'Bad Request';
    protected $message = 'Bad Request';
}