<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 6:21 AM
 */

namespace USC\base;

use USC\interfaces;
use USC\lib\interfaces as libInterfaces;


abstract class BaseResponse implements interfaces\Response
{
    const CODE = 200;

    /**
     * @var libInterfaces\ReadOnlyCollection
     */
    protected $params;

    public function __construct(interfaces\Request $request, libInterfaces\ReadOnlyCollection $params = null)
    {
        $this->params = $params;
    }

    /**
     * @return libInterfaces\ReadOnlyCollection
     */
    public function getParams()
    {
        return $this->params;
    }
}