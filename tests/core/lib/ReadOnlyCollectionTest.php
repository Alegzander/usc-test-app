<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 2:14 AM
 */

use PHPUnit\Framework\TestCase;
use USC\lib\ReadOnlyCollection;


final class ReadOnlyCollectionTest extends TestCase
{
    public function testCanReadSetValueFromCollection()
    {
        $collection = new ReadOnlyCollection([
            'a' => 'b',
            'c' => 'd'
        ]);

        $this->assertEquals('b', $collection->get('a'));
        $this->assertEquals('d', $collection->get('c'));
    }

    public function testGetDefaultValueForNoneExistingKey()
    {
        $collection = new ReadOnlyCollection([
            'e' => 'f',
            'g' => 'h'
        ]);

        $this->assertEquals('o', $collection->get('a', 'o'));
        $this->assertEquals('j', $collection->get('c', 'j'));
    }

    public function testGetNullForNoneExistingValuesWithoutDefaultValue()
    {
        $collection = new ReadOnlyCollection([
            'i' => 'j',
            'k' => 'l'
        ]);

        $this->assertNull($collection->get('o'));
        $this->assertNull($collection->get('p'));
    }
}