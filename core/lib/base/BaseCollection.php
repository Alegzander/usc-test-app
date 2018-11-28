<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 1:32 AM
 */

namespace USC\lib\base;


/**
 * Class BaseCollection
 * @package USC\lib\base
 */
class BaseCollection
{
    /**
     * @var array
     */
    protected $collection = [];

    public function __construct(array $data)
    {
        $this->collection = $data;
    }

    /**
     * @return array
     */
    public function getCollection()
    {
        return $this->collection;
    }
}