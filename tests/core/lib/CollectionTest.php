<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 3:00 AM
 */

use USC\lib\Collection;


final class CollectionTest extends \PHPUnit\Framework\TestCase
{
    public function testSimpleReadAndEditMethods()
    {
        $collection = new Collection([
            'a' => 'b',
            'c' => 'd'
        ]);

        $this->assertEquals('b', $collection->get('a'));
        $this->assertEquals('d', $collection->get('c'));

        $collection->set('e', 'f');

        $this->assertEquals('f', $collection->get('e'));
    }

    public function testReplaceValue()
    {
        $collection = new Collection([
            'a' => 'b'
        ]);

        $this->assertEquals('b', $collection->get('a'));

        $collection->set('a', 'c');

        $this->assertEquals('c', $collection->get('a'));
    }
}