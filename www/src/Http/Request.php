<?php 

namespace App\Http;

use App\Http\Interfaces\IRequest;

class Request implements IRequest
{
    /**
     *
     * @return string
     */
    public static function getMethod(): string 
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     *
     * @return array
     */
    public static function body(): array 
    {
        $json = json_decode(file_get_contents('php://input'), true);

        $data = match (self::getMethod()) {
            'GET'    => $_GET,
            'POST'   => $json,
            'PUT'    => $json,
            'DELETE' => $json,
            default  => []
        };

        return $data;
    }
}