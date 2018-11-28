<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 3:35 AM
 */

namespace USC\interfaces;


interface Request
{
    public function getPath();

    public function getMethod();

    public function getContentType();

    public function getAccept();

    public function getQuery();

    public function getPost();

    public function getParams();

    public function isPost();

    public function isAjax();

    public function getRawBody();

    public function getBody();
}