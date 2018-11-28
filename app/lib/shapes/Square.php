<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 7:18 AM
 */

namespace App\lib\shapes;


use App\lib\shapes\interfaces\Shape;
use USC\lib\interfaces\ReadOnlyCollection;

class Square implements Shape
{
    public $size = 15;
    public $color = '#CCCCCC';

    public function __construct(ReadOnlyCollection $params)
    {
        $this->size = $params->get('size', $this->size);
        $this->color = $params->get('color', $this->color);
    }

    public function getResult()
    {
        return sprintf('Square with sides sizes %d pixels of %s color', $this->size, $this->color);
    }

}