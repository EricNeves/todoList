<?php 

namespace App\Core;

use App\Http\Request;
use App\Http\Response;

class Core 
{
    /**
     *
     * @param array $routes
     * @return void
     */
    public static function dispatch(array $routes): void
    {
        $url = '/';

        isset($_GET['url']) && $url .= $_GET['url'];

        $url !== '/' && $url = rtrim($url, '/');

        $controllerPrefix = 'App\\Controllers\\';

        $routerFound = false;

        foreach ($routes as $route) {
           
            $pattern = '#^'.preg_replace('/{id}/', '([\w-]+)', $route['path']).'$#';

            if (preg_match($pattern, $url, $matches)) {
                array_shift($matches);

                $routerFound = true;

                if (Request::getMethod() !== $route['method']) {
                    Response::json([
                        'error'   => true,
                        'success' => false,
                        'message' => 'Sorry, method not allowed'
                    ], 405);
                    return;
                }

                [$controller, $action] = explode('@', $route['controllerAndAction']);

                $controller = $controllerPrefix.$controller;
                $extendController = new $controller();
                $extendController->$action(new Request, new Response, $matches);
            }

        }

        if (!$routerFound) {
           $controller = new \App\Controllers\NotFoundController();
           $controller->index(new Request, new Response);
        }
    }
}