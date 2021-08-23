<?php
namespace App\Helpers;

use Exception;
use Illuminate\Http\JsonResponse;
use Error;

class ApiResponse{

    /**
     * The json success response
     *
     * @param string $message
     * @param mixed $data
     * @param integer $statusCode
     * @return JsonResponse
     */
    public static function success(string $message, $data, $statusCode = 200): JsonResponse
    {
        $response = [
            "success"   => true,
            "message"   => $message,
            "data"      => $data,
        ];

        return response()->json($response, $statusCode);
    }

    /**
     * The errors response json.
     *
     * @param string $message
     * @param mixed $data
     * @param integer $statusCode
     * @return JsonResponse
     */
    public static function error(string $message, $data, $statusCode = 400): JsonResponse
    {

        $response = [
            "success"   => false,
            "message"   => $message,
            "data"      => $data,
        ];

        return response()->json($response, $statusCode);
    }
}