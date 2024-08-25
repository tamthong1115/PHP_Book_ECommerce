<?php
session_start();
define('BASE_URL', '/PHP_Book_ECommerce');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';


use Core\Router;
use Firebase\JWT\JWT;

// Load environment variables
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Initialize the router
$router = new Router(BASE_URL);

require_once __DIR__ . '/app/Routes/web.php';

use Utils\AuthUtil;

$router->dispatch($_SERVER['REQUEST_URI']);



/**
 * Generate a URL with the base URL.
 *
 * @param string $route The route to append to the base URL.
 * @return string The full URL.
 */
function base_url($route = '')
{
    return BASE_URL . $route;
}
