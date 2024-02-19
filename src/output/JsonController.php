<?php

class JsonController implements IController
{

    public function respond($data, int $statusCode = 202): string
    {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($statusCode);
        return json_encode($data);
    }

}