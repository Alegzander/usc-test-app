<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/27/18
 * Time: 3:23 PM
 */

namespace USC\lib\traits;

/**
 * Trait ReadOnlyCollection
 * @package USC\lib\traits
 * @property array $collection
 */
trait ReadOnlyCollectionTrait
{
    /**
     * @param $key
     * @param $defaultValue
     * @return mixed
     */
    public function get($key, $defaultValue = null)
    {
        return array_key_exists($key, $this->collection) ? $this->collection[$key] : $defaultValue;
    }
}