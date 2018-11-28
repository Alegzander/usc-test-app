<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 3:35 AM
 */

namespace USC;


use USC\interfaces;
use USC\lib\ReadOnlyCollection;

class Request implements interfaces\Request
{
    const METHOD_POST = 'POST';
    const METHOD_GET = 'GET';
    const METHOD_PUT = 'PUT';
    const METHOD_PATCH = 'PATCH';
    const METHOD_DELETE = 'DELETE';

    /**
     * @var mixed
     */
    protected $rawBody = null;


    public function getPath()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getContentType()
    {
        return $_SERVER['CONTENT_TYPE'];
    }

    public function getAccept()
    {
        return $_SERVER['HTTP_ACCEPT'];
    }


    public function isPost()
    {
        return strtoupper($this->getMethod()) == static::METHOD_POST;
    }

    public function isAjax()
    {
        return array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER)
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    public function getRawBody()
    {
        $result = null;

        if ($this->isPost() && is_null($this->rawBody)) {
            $this->rawBody = file_get_contents('php://input');
            $result = $this->rawBody;
        }

        return $result;
    }

    public function getBody()
    {
        $result = $this->getRawBody();

        if ($this->getContentType() == 'application/json') {
            $result = json_decode($result, true);
        }

        return $result;
    }

    public function getQuery()
    {
        return $_SERVER['QUERY_STRING'];
    }

    public function getPost()
    {
        return new ReadOnlyCollection($_POST);
    }

    public function getParams()
    {
        return new ReadOnlyCollection($_GET);
    }
}