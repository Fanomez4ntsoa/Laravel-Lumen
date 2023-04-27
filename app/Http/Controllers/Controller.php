<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function success(string $message = null, mixed $data = null, int $httpCode = 200): JsonResponse
    {
        if (!$message) {
            $message = __('success.default');
        }

        $response['status'] = true;
        $response['message'] = $message;

        if($data) {
            $response['data'] = $data;
        }

        return new JsonResponse($response, $httpCode);
    }

    public function error(string $message = null, mixed $data = null, int $httpCode = 500): JsonResponse
    {
        if (!$message) {
            $message = __('error.default');
        }

        $response['status'] = false;
        $response['message'] = $message;

        if($data) {
            $response['data'] = $data;
        }

        return new JsonResponse($response, $httpCode);
    }
}
