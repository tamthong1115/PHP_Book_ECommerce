<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;
use App\Controllers\AuthController;

use App\Controllers\Admin\HomeAdminController;
use App\Controllers\Admin\BookAdminController;
use App\Controllers\CartController;
use App\Middleware\AdminMiddleware;
use App\Middleware\AuthMiddleware;


global $router;

$router->get('/', [HomeController::class, 'index']);
$router->get('/about', [HomeController::class, 'about']);
$router->get('/contact', [HomeController::class, 'contact']);

// /book?detail-id=1
$router->get('/book/{id}', [HomeController::class, 'bookDetail']);

// cart
$router->get('/cart', [CartController::class, 'index']);
$router->post('/cart/add/{bookId}', [CartController::class, 'add']);
$router->post('/cart/remove/{bookId}', [CartController::class, 'remove']);
$router->post('/cart/updateQuantity/{bookId}/{quantity}', [CartController::class, 'updateQuantity']);



$router->get('/sign-in', [AuthController::class, 'signIn']);
$router->post('/sign-in', [AuthController::class, 'signIn']);
$router->get('/sign-up', [AuthController::class, 'signUp']);
$router->post('/sign-up', [AuthController::class, 'signUp']);
$router->get('/logout', [AuthController::class, 'logout']);


// User profile routes
$router->get('/users/profile', [UserController::class, 'profile']);
$router->get('/users/updateProfile', [UserController::class, 'updateProfile']);
$router->post('/users/updateProfile', [UserController::class, 'updateProfile']);


$router->get('/admin', [HomeAdminController::class, 'index'], [AdminMiddleware::class]);
$router->get('/admin/books', [BookAdminController::class, 'index'], [AdminMiddleware::class]);
$router->get('/admin/books/add-book', [BookAdminController::class, 'add'], [AdminMiddleware::class]);
$router->post('/admin/books/add-book', [BookAdminController::class, 'add'], [AdminMiddleware::class]);
$router->post('/admin/books/delete/{id}', [BookAdminController::class, 'delete'], [AdminMiddleware::class]);
