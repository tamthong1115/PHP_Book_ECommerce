<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Controllers\HomeController;
use App\Controllers\UserController;
use Core\Router;

// Initialize the router
$router = new Router();

// Include the routes
require_once __DIR__ . '/app/Routes/web.php';

// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI']);