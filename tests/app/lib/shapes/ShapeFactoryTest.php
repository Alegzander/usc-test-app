<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 1:23 PM
 */

use App\lib\shapes\ShapesFactory;
use USC\lib\ReadOnlyCollection;


class ShapeFactoryTest extends \PHPUnit\Framework\TestCase
{
    public function testGettingCircle() {
        $circle = ShapesFactory::getShape('circle', new ReadOnlyCollection(['radius' => 40]));

        $this->assertEquals('Circle with radius 40 of #FF0000 color', $circle->getResult());
    }

    public function testGettingSquare() {
        $square = ShapesFactory::getShape('square', new ReadOnlyCollection(['size' => 35]));

        $this->assertEquals('Square with sides sizes 35 pixels of #CCCCCC color', $square->getResult());
    }

    public function testWrongShape() {
        try {
            $octaeder = ShapesFactory::getShape('octaeder', new ReadOnlyCollection(['line_length' => 20]));
        } catch (\InvalidArgumentException $exception) {
            $this->assertEquals('Unknown shape "octaeder"', $exception->getMessage());
        }
    }
}