<?php

declare(strict_types=1);

namespace App\Core;

use App\Controllers\Controller;
use Exception;

class Router
{
    private static array $routes = [];

    /**
     * Add GET routes
     *
     * @param string $path
     * @param array $resolver
     * @return self
     *
     * @throws Exception
     */
    public static function get(string $path, array $resolver): self
    {
        if (!array_key_exists($path, self::$routes)) {
            self::add($path, 'get', $resolver);
        }

        return new static();
    }


    /**
     * Add new Routes to routes array
     *
     * @param string $uri
     * @param string $method
     * @param array $resolver
     * @return void
     */
    protected static function add(string $uri, string $method, array $resolver): void
    {
        self::$routes[$uri] = [
            'method' => strtoupper($method),
            'controller' => $resolver[0],
            'action' => $resolver[1],
        ];
    }

    /**
     * Execute the given route if exists
     * Throws exception if it doesn't exist
     *
     * @param string $path
     * @param string $method
     * @return void
     *
     */
    public static function route(string $path, string $method): void
    {
        # Not Exists
        if (!array_key_exists($path, self::$routes)) {
            Controller::abort(path: $path);
        }

        $route = self::$routes[$path];

        # Methods doesn't match
        if ($route['method'] != $method) {
            Controller::except(new Exception("{$method} doesn't match {$route['method']}"));
        }

        # Controller Doesn't exists
        $controller_class = self::$routes[$path]['controller'];
        if (!class_exists($controller_class)) {
            Controller::except(new Exception("{$controller_class} doesn't exists"));
        }

        $controller = new $controller_class();

        # Controller Action (function) doesn't exists
        $action = self::$routes[$path]['action'];
        if (!in_array($action, get_class_methods($controller))) {
            Controller::except(new \BadMethodCallException("{$action} function doesn't exists in {$controller_class}"));
        }

        $controller->{$action}();
    }
}
