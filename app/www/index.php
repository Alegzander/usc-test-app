<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 4:03 AM
 */

defined('BASE_DIR') || define('BASE_DIR', dirname(dirname(__DIR__)));
defined('APP_DIR') || define('APP_DIR', dirname(__DIR__));
defined('VENDOR_DIR') || define('VENDOR_DIR', BASE_DIR . '/vendor');

require(VENDOR_DIR . '/autoload.php');

\App\WebApp::run();
