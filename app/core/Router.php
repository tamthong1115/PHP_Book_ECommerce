<?php
// File: app/core/Router.php
namespace Core;

class Router
{
    protected $routes = [];
    protected $basePath;

    public function __construct($basePath = '')
    {
        $this->basePath = $basePath;
    }

    public function get($uri, $action)
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post($uri, $action)
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch($uri)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $this->stripBasePath($uri);
    
        // Debugging statements
        error_log("Request Method: $method");
        error_log("Processed URI: $uri");
        error_log("Available Routes: " . print_r($this->routes, true));

        if (isset($this->routes[$method][$uri])) {
            $action = $this->routes[$method][$uri];
            if (is_callable($action)) {
                call_user_func($action);
            } elseif (is_array($action)) {
                $controller = new $action[0]();
                $method = $action[1];
                $controller->$method();
            }
        } else {
            http_response_code(404);
            echo "404 Not Found";
        }
    }

    protected function stripBasePath($uri)
    {
        if (strpos($uri, $this->basePath) === 0) {
            return substr($uri, strlen($this->basePath));
        }
        return $uri;
    }
}