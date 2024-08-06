<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\AuthController;

use App\Controllers\Admin\HomeAdminController;
use App\Controllers\Admin\BookAdminController;

use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;



$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [HomeController::class, 'about']);

$router->get('/sign-in', [AuthController::class, 'signIn']);
$router->post('/sign-in', [AuthController::class, 'signIn']);
$router->get('/sign-up', [AuthController::class, 'signUp']);
$router->post('/sign-up', [AuthController::class, 'signUp']);


$router->get('/users', [UserController::class, 'index'], [AdminMiddleware::class]);
$router->get('/users/create', [UserController::class, 'create'], [AdminMiddleware::class]);
$router->post('/users/create', [UserController::class, 'create'], [AdminMiddleware::class]);

$router->get('/admin', [HomeAdminController::class, 'index'], [AdminMiddleware::class]);
$router->get('/admin/books', [BookAdminController::class, 'index'], [AdminMiddleware::class]);
$router->get('/admin/books/add-book', [BookAdminController::class, 'add'], [AdminMiddleware::class]);
$router->post('/admin/books/add-book', [BookAdminController::class, 'add'], [AdminMiddleware::class]);
