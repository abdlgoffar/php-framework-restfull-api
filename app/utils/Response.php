<?php
class Response
{
    public static array $data = [];
    public static function jsonFiles(bool $status, array $payload, $messages): array
    {
        self::$data[] = [
            "status" => $status,
            "payload" => $payload,
            "messages" => $messages
        ];
        return self::$data;
    }
}
