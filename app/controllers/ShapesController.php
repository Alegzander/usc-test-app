<?php
/**
 * Created by PhpStorm.
 * User: alegz
 * Date: 11/28/18
 * Time: 6:31 AM
 */
namespace App\controllers;

use App\lib\shapes\Circle;
use App\lib\shapes\interfaces\Shape;
use App\lib\shapes\Square;
use App\lib\Response;
use USC\base\BaseController;
use USC\interfaces\Request;
use USC\lib\BadRequestResponse;
use USC\lib\ReadOnlyCollection;


class ShapesController extends BaseController
{
    protected static function shapesMap($type = null) {
        $map = [
            'circle' => Circle::class,
            'square' => Square::class
        ];

        return $map[$type];
    }

    public function post(Request $request){
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

            $shapeCLass = self::shapesMap($type);

            if (!$shapeCLass) {
                return new BadRequestResponse($request, new ReadOnlyCollection([
                    'message' => sprintf('Invalid shape type "%s".', $type)
                ]));
            }

            try {
                $shapes[] = new $shapeCLass(new ReadOnlyCollection($params));
            } catch (\RuntimeException $exception) {
                return new BadRequestResponse($request, new ReadOnlyCollection([
                    'message' => $exception->getMessage()
                ]));
            }
        }

        return new Response($request, new ReadOnlyCollection(['shapes' => $shapes]));
    }
}