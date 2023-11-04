<?php 

namespace App\Http;

use App\Http\Interfaces\IResponse;

class Response implements IResponse
{
    /**
     *
     * @param  array $data
     * @param  int $status
     * @param  array $headers
     * @return void
     */
    public static function json(array $data = [], int $status = 200, array $headers = ['Content-Type:', 'application/json']): void
    {
        http_response_code($status);

        foreach ($headers as $key => $value) {
            header("$key: $value");
        }

        echo json_encode($data, JSON_UNESCAPED_SLASHES);
    }


    /**
     *
     * @param  array $headers
     * @return void
     */
    public static function setHeaders(array $headers = ['Content-Type:', 'application/json']): void
    {
        foreach ($headers as $key => $value) {
            header("$key: $value");
        }
    }

    /**
     *
     * @param  string $url
     * @return void
     */
    public static function redirect(string $url): void 
    {
        header("Location: $url");
    }
}