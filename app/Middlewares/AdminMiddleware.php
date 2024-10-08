<?php

namespace App\Middleware;


use Utils\jwtUtil;

class AdminMiddleware
{
    public function handle($request, $next)
    {
        if (!isset($_COOKIE['auth_token'])) {
            http_response_code(401);
            echo "401 Unauthorized";
            exit;
        }

        try {
            $decoded = jwtUtil::decode($_COOKIE['auth_token']);
            if (!$decoded->isAdmin) {
                http_response_code(403);
                echo "403 Forbidden";
                exit;
            }
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
