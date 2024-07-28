<?php
use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\AuthController;


$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [HomeController::class, 'about']);

$router->get('/users', [UserController::class, 'index']);
$router->get('/users/create', [UserController::class, 'create']);
$router->post('/users/create', [UserController::class, 'create']);

$router->get('/sign-in', [AuthController::class, 'signIn']);
$router->post('/sign-in', [AuthController::class, 'signIn']);
$router->get('/sign-up', [AuthController::class, 'signUp']);
$router->post('/sign-up', [AuthController::class, 'signUp']);