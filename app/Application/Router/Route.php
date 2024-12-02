<?php

namespace App\Application\Router;

class Route
{

    private static array $routes;

    public static function post(string $uri, string $controller, string $method) :void
    {
        self::$routes[] = [
            'uri' => $uri,
            'type' => 'post',
            'controller' => $controller,
            'method' => $method
        ];
    }

    public static function get(string $uri, string $controller, string $method) :void
    {
        self::$routes[] = [
            'uri' => $uri,
            'type' => 'get',
            'controller' => $controller,
            'method' => $method
        ];
    }

    public static function list() :array
    {
        return self::$routes;
    }
}