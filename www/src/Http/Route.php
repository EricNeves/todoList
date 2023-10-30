<?php 

namespace App\Http;

use App\Http\Interfaces\IRoute;

class Route implements IRoute
{
    /**
     * 
     * @var array
     */
    private static array $routes = [];

    /**
     * 
     * @param string $path
     * @param string $controllerAndAction
     * @return void
     */
    public static function get(string $path, string $controllerAndAction): void
    {
        self::$routes[] = ['path' => $path, 'controllerAndAction' => $controllerAndAction, 'method' => 'GET'];
    }

    /**
     * 
     * @param string $path
     * @param string $controllerAndAction
     * @return void
     */
    public static function post(string $path, string $controllerAndAction): void
    {
        self::$routes[] = ['path' => $path, 'controllerAndAction' => $controllerAndAction, 'method' => 'POST'];
    }

    /**
     * 
     * @param string $path
     * @param string $controllerAndAction
     * @return void
     */
    public static function put(string $path, string $controllerAndAction): void
    {
        self::$routes[] = ['path' => $path, 'controllerAndAction' => $controllerAndAction, 'method' => 'PUT'];
    }

    /**
     * 
     * @param string $path
     * @param string $controllerAndAction
     * @return void
     */
    public static function delete(string $path, string $controllerAndAction): void
    {
        self::$routes[] = ['path' => $path, 'controllerAndAction' => $controllerAndAction, 'method' => 'DELETE'];
    }

    /**
     * 
     * @return array
     */
    public static function getRoutes(): array
    {
        return self::$routes;
    }
}