<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 12:53 PM
 */

use App\lib\shapes\Circle;
use USC\lib\ReadOnlyCollection;


final class CircleTest extends \PHPUnit\Framework\TestCase
{
    public function testParametersProcessing()
    {
        $circle = new Circle(new ReadOnlyCollection([
            'radius' => 20
        ]));

        $this->assertEquals('Circle with radius 20 of #FF0000 color', $circle->getResult());

        $circle = new Circle(new ReadOnlyCollection([
            'color' => '#CCCCCC'
        ]));

        $this->assertEquals('Circle with radius 10 of #CCCCCC color', $circle->getResult());

        $circle = new Circle(new ReadOnlyCollection([
            'radius' => 8,
            'color' => '#CCCCBB'
        ]));

        $this->assertEquals('Circle with radius 8 of #CCCCBB color', $circle->getResult());
    }

    public function testWrongParametersDoesntBreakAnything()
    {
        $circle = new Circle(new ReadOnlyCollection([
            'radus' => 80,
        ]));

        $this->assertEquals('Circle with radius 10 of #FF0000 color', $circle->getResult());

        $circle = new Circle(new ReadOnlyCollection([
            'radnom_param' => 80,
        ]));

        $this->assertEquals('Circle with radius 10 of #FF0000 color', $circle->getResult());
    }
}