<?php

namespace App\Services\Traits;

trait HandleExceptionMessage
{
    public static function error($returnCode, $message, $statusCode = 200)
    {
        return response()->json([
            'code' => (int) $returnCode,
            'message' => $message,
        ], $statusCode);
    }

    public static function success($data, $statusCode = 200)
    {
        return response()->json(array_merge(['code' => 200], $data), $statusCode);
    }

    public static function notFound($message = 'Item not found') {
        return HandleExceptionMessage::error('404', $message, 404);
    }
}