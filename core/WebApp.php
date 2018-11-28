<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 1:15 AM
 */

namespace USC;

use USC\interfaces;
use USC\lib\PageNotFoundResponse;


/**
 * Class WebApp
 * @package USC
 * @var interfaces\WebApp $app
 */
abstract class WebApp extends App implements interfaces\WebApp
{
    /**
     * @var interfaces\Request
     */
    protected $request;

    /**
     * @var interfaces\Router
     */
    protected $router;

    public function __construct()
    {
        $this->request = new Request();
        $this->router = new SimpleRouter(static::routes());
    }

    /**
     * @return Request|Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    public function getRouter()
    {
        return $this->router;
    }

    public static function run()
    {
        parent::run();

        /** @var interfaces\WebApp $app */
        $app = static::$app;

        $controller = $app->getRouter()->getController($app->getRequest()->getPath());

        if (!is_null($controller)) {
            $response = $controller->run($app->getRequest());
        } else {
            $response = new PageNotFoundResponse($app->getRequest());
        }

        if (!$response instanceof interfaces\Response) {
            throw new \RuntimeException('Invalid response. Response should be object of Response interface.');
        }

        echo $response->render();
    }
}