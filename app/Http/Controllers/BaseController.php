<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected function error($returnCode, $message, $statusCode = 200)
    {
        return response()->json([
            'code' => (int) $returnCode,
            'message' => $message,
        ], $statusCode);
    }

    protected function success($data, $statusCode = 200)
    {
        return response()->json(array_merge(['code' => 200], $data), $statusCode);
    }

    protected function notFound() {
        return $this->jsonError('404', 'Item not found', 404);
    }
}
