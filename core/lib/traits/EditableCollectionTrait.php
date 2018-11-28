<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 1:24 AM
 */

namespace USC\lib\traits;


/**
 * Trait EditableCollection
 * @package USC\lib\traits
 * @property array collection
 */
trait EditableCollectionTrait
{
    public function set($key, $value)
    {
        $this->collection[$key] = $value;
    }
}