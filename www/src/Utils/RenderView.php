<?php 

namespace App\Utils;

class RenderView
{
    /**
     * Render view with params
     *
     * @param string $view
     * @param array $params
     * @return void
     * @throws \Exception
     */
    public static function render(string $view, array $params = []): void
    {
        extract($params);
       
        if (file_exists(__DIR__."/../views/{$view}.php")) {
            require_once __DIR__ . "/../views/{$view}.php";
        } else {
            throw new \Exception("View {$view} not found");
        }
    }
}