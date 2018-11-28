<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 7:18 AM
 */

namespace App\lib\shapes;

use App\lib\shapes\interfaces;
use USC\lib\interfaces\ReadOnlyCollection;


class Circle implements interfaces\Shape
{
    public $radius = 10;
    public $color = '#FF0000';

    public function __construct(ReadOnlyCollection $params)
    {
        $this->radius = $params->get('radius', $this->radius);
        $this->color = $params->get('color', $this->color);
    }

    public function getResult()
    {
        return sprintf('Circle with radius %d of %s color', $this->radius, $this->color);
    }

}