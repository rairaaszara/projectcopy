<?php
namespace App\Helpers;


class ApiResponse{

    public static function success(string $message, mixed $data, $statusCode = 200)
    {

    $response = [
        "success" => true,
        "message" => $message,
        "data" => $data,
    ];

    return response()->json($response);
}

    public static function error(string $message, mixed $data, $statusCode = 400)
{

    $response = [
        "success" => false,
        "message" => $message,
        "data" => $data,
    ];

    return response()->json($response);
}
 
}