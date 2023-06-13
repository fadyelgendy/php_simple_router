<?php

namespace App\Core;

class Application
{
    public static function run(): void
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $method = $_SERVER['REQUEST_METHOD'];

        \App\Core\Router::route($uri, $method);
    }
}