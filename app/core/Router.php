<?php

namespace Core;

require_once 'app/Middlewares/AuthMiddleware.php';
require_once 'app/Middlewares/AdminMiddleware.php';

class Router
{
    protected $routes = [];
    protected $basePath;

    public function __construct($basePath = '/')
    {
        $this->basePath = $basePath;
    }

    public function get($uri, $action, $middleware = [])
    {
        $this->routes['GET'][$uri] = ['action' => $action, 'middleware' => $middleware];
    }

    public function post($uri, $action, $middleware = [])
    {
        $this->routes['POST'][$uri] = ['action' => $action, 'middleware' => $middleware];
    }

    public function put($uri, $action, $middleware = [])
    {
        $this->routes['PUT'][$uri] = ['action' => $action, 'middleware' => $middleware];
    }

    public function delete($uri, $action, $middleware = [])
    {
        $this->routes['DELETE'][$uri] = ['action' => $action, 'middleware' => $middleware];
    }

    public function dispatch($uri)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $this->stripBasePath($uri);

        if (isset($this->routes[$method][$uri])) {
            $route = $this->routes[$method][$uri];
            $action = $route['action'];
            $middleware = $route['middleware'];

            $request = $_SERVER;
            $next = function ($request) use ($action) {
                if (is_callable($action)) {
                    call_user_func($action);
                } elseif (is_array($action)) {
                    $controller = new $action[0]();
                    $method = $action[1];
                    $controller->$method();
                }
            };

            foreach (array_reverse($middleware) as $middlewareClass) {
                $next = function ($request) use ($middlewareClass, $next) {
                    $middlewareInstance = new $middlewareClass();
                    return $middlewareInstance->handle($request, $next);
                };
            }

            $next($request);
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    private function stripBasePath($uri)
    {
        if ($this->basePath && strpos($uri, $this->basePath) === 0) {
            return substr($uri, strlen($this->basePath));
        }
        return $uri;
    }
}
