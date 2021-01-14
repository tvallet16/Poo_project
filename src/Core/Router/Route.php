<?php

namespace App\Core\Router;

abstract class Route
{
    public static function __callStatic(string $name, array $arguments)
    {
        $method = strtoupper($name);
        if (in_array($method, Router::SUPPORTED_METHODS)) {
            // list($pattern, $dispatcher) = $arguments;
            [$pattern, $dispatcher] = $arguments;
            Router::getInstance()->addRoute($method, $pattern, $dispatcher);
        }
    }
}
