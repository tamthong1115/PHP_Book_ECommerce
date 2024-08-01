<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\AuthController;

use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;


$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [HomeController::class, 'about']);

$router->get('/users', [UserController::class, 'index'], [AdminMiddleware::class]);
$router->get('/users/create', [UserController::class, 'create'], [AdminMiddleware::class]);
$router->post('/users/create', [UserController::class, 'create'], [AdminMiddleware::class]);

$router->get('/sign-in', [AuthController::class, 'signIn']);
$router->post('/sign-in', [AuthController::class, 'signIn']);
$router->get('/sign-up', [AuthController::class, 'signUp']);
$router->post('/sign-up', [AuthController::class, 'signUp']);
