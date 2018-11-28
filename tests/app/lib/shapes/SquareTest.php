<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 1:02 PM
 */
use App\lib\shapes\Square;
use USC\lib\ReadOnlyCollection;


class SquareTest extends \PHPUnit\Framework\TestCase
{
    public function testParametersProcessing() {
        $square = new Square(new ReadOnlyCollection([
            'size' => 50
        ]));

        $this->assertEquals('Square with sides sizes 50 pixels of #CCCCCC color', $square->getResult());

        $square = new Square(new ReadOnlyCollection([
            'size' => 40,
            'color' => '#DD0000'
        ]));

        $this->assertEquals('Square with sides sizes 40 pixels of #DD0000 color', $square->getResult());

        $square = new Square(new ReadOnlyCollection([
            'color' => '#FFFFFF'
        ]));

        $this->assertEquals('Square with sides sizes 15 pixels of #FFFFFF color', $square->getResult());
    }

    public function testWrongParametersDoesntBreakAnything() {
        $square = new Square(new ReadOnlyCollection([
            'siz' => 40,
        ]));

        $this->assertEquals('Square with sides sizes 15 pixels of #CCCCCC color', $square->getResult());

        $square = new Square(new ReadOnlyCollection([
            'colour' => '#FFFF00',
        ]));

        $this->assertEquals('Square with sides sizes 15 pixels of #CCCCCC color', $square->getResult());

        $square = new Square(new ReadOnlyCollection([
            'colour' => '#FFFF00',
            'size' => 20
        ]));

        $this->assertEquals('Square with sides sizes 20 pixels of #CCCCCC color', $square->getResult());
    }
}