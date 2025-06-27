<?php

namespace App\Http\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

trait HttpResponseTrait
{
    public function notFound(string $message = 'not found'): JsonResponse
    {
        return response()->json(['message' => $message], Response::HTTP_NOT_FOUND);
    }

    public function noContent(): JsonResponse
    {
        return response()->json([], Response::HTTP_NO_CONTENT);
    }

    public function ok(string $message): JsonResponse
    {
        return response()->json(['message' => $message], Response::HTTP_OK);
    }
}