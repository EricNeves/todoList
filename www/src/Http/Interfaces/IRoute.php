<?php 

namespace App\Http\Interfaces;

interface IRoute
{
    public static function get(string $path, string $controllerAndAction): void;
    public static function post(string $path, string $controllerAndAction): void;
    public static function put(string $path, string $controllerAndAction): void;
    public static function delete(string $path, string $controllerAndAction): void;
}