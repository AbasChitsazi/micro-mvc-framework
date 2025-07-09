<?php

namespace App\Core\Routing;

class Route
{
    private static $routes;
    public static function add($methods, $uri, $action = null,$middleware=[])
    {
        $methods = is_array($methods) ? $methods : [$methods];
        self::$routes[] = ['methods' => $methods, 'uri' => $uri, 'action' => $action,'middleware'=> $middleware];
    }
    public static function __callStatic(string $method, array $arguments)
    {
        $validMethods = ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'OPTIONS'];
        if (!in_array($method, $validMethods)) {
            throw new \Exception("HTTP method [$method] is not supported.");
        }
        $method = strtoupper($method);
        $uri = $arguments[0] ?? '/';
        $action = $arguments[1] ?? null;
        $middleware = $arguments[2] ?? null;
        self::add($method, $uri, $action,$middleware);
    }
    public static function routes()
    {
        return self::$routes;
    }
}
