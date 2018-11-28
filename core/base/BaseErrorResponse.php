<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 11:59 AM
 */

namespace USC\base;


use USC\interfaces\Request;
use USC\interfaces\Response;
use USC\lib\interfaces\ReadOnlyCollection;

abstract class BaseErrorResponse extends BaseResponse implements Response
{
    const FORMAT_HTML = 'html';
    const FORMAT_JSON = 'json';

    const CODE = 404;
    const TITLE = '';

    protected $message = '';

    protected $responseFormat = self::FORMAT_HTML;

    public function __construct(Request $request, ReadOnlyCollection $params = null)
    {
        parent::__construct($request, $params);

        $responseDetectingString = $request->getAccept();

        if (!$responseDetectingString) {
            $responseDetectingString = $request->getContentType();
        }

        if ($responseDetectingString == 'application/json') {
            $this->responseFormat = static::FORMAT_JSON;
        }
    }

    public function render()
    {
        http_response_code(static::CODE);

        if (!is_null($this->getParams())) {
            $this->message = $this->getParams()->get('message', $this->message);
        }

        if ($this->responseFormat == static::FORMAT_JSON) {
            return $this->renderJson();
        } else {
            return $this->renderHtml();
        }
    }

    public function renderJson()
    {
        header('Content-Type: application/json');

        return json_encode([
            'status' => static::CODE,
            'message' => $this->message
        ]);
    }

    public function renderHtml()
    {
        header('Content-Type: text/html');

        $context = [
            '{code}' => static::CODE,
            '{message}' => $this->message,
            '{title}' => static::TITLE
        ];

        return str_replace(array_keys($context), array_values($context),
            '<!DOCTYPE html><html><head><title>{code} {title}</title></head><body><h1>{code} {title}</h1><p>{message}</p></body></html>');
    }
}