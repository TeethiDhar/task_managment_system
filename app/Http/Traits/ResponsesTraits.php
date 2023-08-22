<?php

namespace App\Http\Traits;

use Illuminate\Http\Response;

trait ResponsesTraits
{
    protected function successResponse($data, $message = 'Success', int $statusCode = Response::HTTP_OK)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    protected function errorResponse($data,$message, int $statusCode = Response::HTTP_NOT_FOUND)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }
}


?>