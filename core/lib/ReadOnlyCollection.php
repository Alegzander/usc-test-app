<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 1:30 AM
 */

namespace USC\lib;


use USC\lib\base\BaseCollection;
use USC\lib\interfaces;
use USC\lib\traits\ReadOnlyCollectionTrait;

class ReadOnlyCollection extends BaseCollection implements interfaces\ReadOnlyCollection
{
    use ReadOnlyCollectionTrait;
}