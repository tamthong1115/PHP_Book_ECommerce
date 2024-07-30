<?php
define('BASE_URL', '/PHP_Book_ECommerce');

require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/app/core/Router.php';

use App\Controllers\HomeController;
use App\Controllers\UserController;
use Core\Router;

$basePath = '/PHP_Book_ECommerce';

// Initialize the router
$router = new Router(BASE_URL);

// Include the routes
require_once __DIR__ . '/app/Routes/web.php';

// Dispatch the request
$router->dispatch($_SERVER['REQUEST_URI']);

/**
 * Generate a URL with the base URL.
 *
 * @param string $route The route to append to the base URL.
 * @return string The full URL.
 */
function base_url($route = '') {
    return BASE_URL . $route;
}