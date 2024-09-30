<?php

namespace App\Traits;

trait ApiResponses
{
    protected function ok($message, $data = [])
    {
        return $this->success($message, $data, 200);
    }
    protected function success($message,  $data = [], $statusCode = 200)
    {
        return response()->json([
            'status' => $statusCode,
            'message' => $message,
            'data' => $data,
        ], $statusCode);
    }

    protected function error($message, $statusCode)
    {
        return response()->json([
            'status' => $statusCode,
            'message' => $message
        ], $statusCode);
    }
}
