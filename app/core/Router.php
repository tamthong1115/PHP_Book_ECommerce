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

        foreach ($this->routes[$method] as $routeUri => $route) {
            $pattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $routeUri);
            if (preg_match('#^' . $pattern . '$#', $uri, $matches)) {
                array_shift($matches); // Remove the full match

                $action = $route['action'];
                $middleware = $route['middleware'];

                $request = $_SERVER;
                $next = function ($request) use ($action, $matches) {
                    if (is_callable($action)) {
                        call_user_func_array($action, $matches);
                    } elseif (is_array($action)) {
                        $controller = new $action[0]();
                        $method = $action[1];
                        call_user_func_array([$controller, $method], $matches);
                    }
                };

                foreach (array_reverse($middleware) as $middlewareClass) {
                    $next = function ($request) use ($middlewareClass, $next) {
                        $middlewareInstance = new $middlewareClass();
                        return $middlewareInstance->handle($request, $next);
                    };
                }

                $next($request);
                return;
            }
        }

        // Handle 404 Not Found
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }

    private function stripBasePath($uri)
    {
        if ($this->basePath && strpos($uri, $this->basePath) === 0) {
            return substr($uri, strlen($this->basePath));
        }
        return $uri;
    }
}
