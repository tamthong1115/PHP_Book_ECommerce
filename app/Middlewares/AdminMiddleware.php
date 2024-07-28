<?php
namespace App\Middleware;

class AdminMiddleware
{
    public function handle($request, $next)
    {
        if (!isset($_SESSION['user']) || !$_SESSION['user']['isAdmin']) {
            http_response_code(403);
            echo "403 Forbidden";
            exit;
        }
        return $next($request);
    }
}