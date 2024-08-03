<?php
namespace App\Middleware;
require_once 'app/utils/jwtUtil.php';
use Utils\JwtUtil;

class AuthMiddleware
{
    public function handle($request, $next)
    {
        if (!isset($_COOKIE['auth_token'])) {
            http_response_code(401);
            echo "401 Unauthorized";
            exit;
        }

        try {
            $decoded = JwtUtil::decode($_COOKIE['auth_token']);
            $_SESSION['user'] = [
                'id' => $decoded->user_id,
                'username' => $decoded->username,
                'isAdmin' => $decoded->isAdmin
            ];
        } catch (\Exception $e) {
            http_response_code(401);
            echo "401 Unauthorized";
            exit;
        }

        return $next($request);
    }
}