<?php 

namespace App\Core;

class Response
{
    private static int $statusCode;

    public static function getStatusCode()
    {
        return self::$statusCode;
    }

    public static function setStatusCode($statusCode)
    {
        http_response_code($statusCode);
        self::$statusCode = $statusCode;
    }
}