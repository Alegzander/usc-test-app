<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 1:13 PM
 */

namespace App\lib\shapes;


use App\lib\shapes\interfaces\Shape;
use USC\lib\interfaces\ReadOnlyCollection;

class ShapesFactory
{
    /**
     * @param $shape
     * @param ReadOnlyCollection $params
     * @return Shape
     */
    public static function getShape($shape, ReadOnlyCollection $params) {
        if ($shape == 'circle') {
            return new Circle($params);
        } else if ($shape == 'square') {
            return new Square($params);
        } else {
            throw new \InvalidArgumentException(sprintf('Unknown shape "%s"', $shape));
        }
    }
}