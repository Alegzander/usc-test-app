<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/27/18
 * Time: 3:13 PM
 */

namespace USC\lib;


use USC\lib\base\BaseCollection;
use USC\lib\interfaces;
use USC\lib\traits\EditableCollectionTrait;
use USC\lib\traits\ReadOnlyCollectionTrait;

class Collection extends BaseCollection implements interfaces\ReadOnlyCollection, interfaces\EditableCollection
{
    use ReadOnlyCollectionTrait;
    use EditableCollectionTrait;
}