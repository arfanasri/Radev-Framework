<?php

namespace Arfanasri\RadevFramework\System;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, string $controller, string $function): void
    {
        self::$routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'function' => $function
        ];
    }

    public function run(): void
    {
        $path = "/";
        if (isset($_SERVER["PATH_INFO"])) {
            $path = $_SERVER["PATH_INFO"];
        }
        $method = $_SERVER["REQUEST_METHOD"];

        foreach (self::$routes as $route) {
            $pattern = "#^" . $route['path'] . "$#";
            // if ($path == $route['path'] && $method == $route['method']) {
            if (preg_match($pattern, $path, $variables) && $method == $route['method']) {
                $controllerpath = 'Arfanasri\RadevFramework\Controller\\' . $route["controller"];
                $controller = new $controllerpath;
                $function = $route["function"];
                array_shift($variables);
                call_user_func_array([$controller, $function], $variables);
                // $controller->$function();
                return;
            }
        }

        http_response_code(404);
        echo "CONTROLLER NOT FOUND";
    }
}