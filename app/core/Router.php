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

        // Strip the query string from the URI
        $uri = parse_url($uri, PHP_URL_PATH);

        $uri = $this->stripBasePath($uri);
        $queryParams = [];
        
        // Parse query string
        if (strpos($uri, '?') !== false) {
            list($uri, $queryString) = explode('?', $uri, 2);
            parse_str($queryString, $queryParams);
        }

        foreach ($this->routes[$method] as $routeUri => $route) {
            $pattern = preg_replace('/\{[^\}]+\}/', '([^/]+)', $routeUri);
            if (preg_match('#^' . $pattern . '$#', $uri, $matches)) {
                array_shift($matches);

                $action = $route['action'];
                $middleware = $route['middleware'];
                $request = $_SERVER;
                $next = function ($request) use ($action, $matches, $queryParams) {
                    if (is_callable($action)) {
                        call_user_func_array($action, array_merge($matches, [$queryParams]));
                    } elseif (is_array($action)) {
                        $controller = new $action[0]();
                        $method = $action[1];
                        call_user_func_array([$controller, $method], array_merge($matches, [$queryParams]));
                    }
                };
                foreach (array_reverse($middleware) as $middlewareClass) {
                    $next = function ($request) use ($middlewareClass, $next) {
                        $middlewareInstance = new $middlewareClass();
                        $middlewareInstance->handle($request, $next);
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
        if (strpos($uri, $this->basePath) === 0) {
            return substr($uri, strlen($this->basePath));
        }
        return $uri;
    }
}