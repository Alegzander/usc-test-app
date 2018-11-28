<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 3:13 AM
 */

namespace App;

use App\controllers;
use USC\interfaces;
use USC\WebApp as BaseWebApp;


class WebApp extends BaseWebApp implements interfaces\WebApp
{
    public function __construct()
    {
        parent::__construct();
    }

    public static function routes()
    {
        return [
            '/shapes' => new controllers\ShapesController()
        ];
    }


}