<?php

namespace App\Helpers;

class Std
{
    public $status;
    public $message;
    public $payload;
    public function __construct($status, $message, $payload)
    {
        $this->status = $status;
        $this->message = $message;
        $this->payload = $payload;
        return $this;
    }
    public static function create($status, $message, $payload)
    {
        return new Std($status, $message, $payload);
    }
}
class JsonStd
{
    public const SUCCESS = 'SUCCESS';
    public const ERROR = 'ERROR';

    public static function success($payload, $message = null, $code = 200)
    {
        $std = Std::create(self::SUCCESS, $message, $payload);
        return response()->json($std, $code);
    }

    public static function successMsg(string $message, $code = 200)
    {
        $std = Std::create(self::SUCCESS, $message, null);
        return response()->json($std, $code);
    }

    public static function error($payload, $message = null, $code = 400)
    {
        $std = Std::create(self::ERROR, $message, $payload);
        return response()->json($std, $code);
    }

    public static function errorMsg(string $message = null, $code = 400)
    {
        $std = Std::create(self::ERROR, $message, null);
        return response()->json($std, $code);
    }
}
