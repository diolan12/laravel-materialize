<?php
namespace App\Helpers;

class JsonStd {

    public const SUCCESS = 'SUCCESS';
    public const ERROR = 'ERROR';
    private static $STD = [
        'status' => null,
        'message' => null,
        'payload' => null
    ];

    public static function success($payload, $message = null, $code = 200) {
        $json = self::$STD;
        $json['status'] = self::SUCCESS;
        $json['message'] = $message;
        $json['payload'] = $payload;
        return response()->json($json, $code);
    }

    public static function successMsg(string $message, $code = 200) {
        $json = self::$STD;
        $json['status'] = self::SUCCESS;
        $json['message'] = $message;
        return response()->json($json, $code);
    }

    public static function error($payload, $message = null, $code = 400) {
        $json = self::$STD;
        $json['status'] = self::ERROR;
        $json['message'] = $message;
        $json['payload'] = $payload;
        return response()->json($json, $code);
    }

    public static function errorMsg(string $message = null, $code = 400) {
        $json = self::$STD;
        $json['status'] = self::ERROR;
        $json['message'] = $message;
        return response()->json($json, $code);
    }
}