<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 7:04 AM
 */

namespace App\lib;


use App\lib\shapes\interfaces\Shape;

class Response extends \USC\base\BaseResponse
{
    public function render()
    {
        header('Content-Type: application/json');

        /** @var Shape[] $shapes */
        $shapes = $this->getParams()->get('shapes', []);
        $result = [];

        foreach ($shapes as $shape) {
            $result[] = $shape->getResult();
        }

        return json_encode(['shapes' => $result]);
    }

}