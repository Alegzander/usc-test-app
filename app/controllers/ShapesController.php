<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 6:31 AM
 */

namespace App\controllers;

use App\lib\Response;
use App\lib\shapes\ShapesFactory;
use USC\base\BaseController;
use USC\interfaces\Request;
use USC\lib\BadRequestResponse;
use USC\lib\ReadOnlyCollection;


class ShapesController extends BaseController
{
    public function post(Request $request)
    {
        $data = $request->getBody();

        if (!is_array($data) or !array_key_exists('shapes', $data)) {
            return new BadRequestResponse($request, new ReadOnlyCollection([
                'message' => 'Invalid request. No "shapes" field in request body.'
            ]));
        }

        $shapes = [];

        foreach ($data['shapes'] as $shapeData) {
            $type = $shapeData['type'];
            $params = $shapeData['params'];

            if (!$type || !is_string($type)) {
                return new BadRequestResponse($request, new ReadOnlyCollection([
                    'message' => 'Key "type" is not set or invalid.'
                ]));
            }

            try {
                $shapes[] = ShapesFactory::getShape($type, new ReadOnlyCollection($params));
            } catch (\InvalidArgumentException $exception) {
                return new BadRequestResponse($request, new ReadOnlyCollection([
                    'message' => $exception->getMessage()
                ]));
            }
        }

        return new Response($request, new ReadOnlyCollection(['shapes' => $shapes]));
    }
}