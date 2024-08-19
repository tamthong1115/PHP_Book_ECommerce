<?php

namespace App\Controllers;

use Core\Controller;
use Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        $cartModel = new Cart();
        $userId = $this->getUserId();
        $cartItems = $cartModel->getCartItems($userId);
        $totalPrice = array_reduce($cartItems, function ($carry, $item) {
            return $carry + $item['quantity'];
        }, 0);
        $totalBooks = count($cartItems);
        $this->render('pages/cart', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice, 'totalBooks' => $totalBooks]);
    }

    public function add($bookId)
    {
        $cartModel = new Cart();
        $userId = $this->getUserId();


        $cartModel->addToCart($bookId, 1, $userId);
    }


    public function remove($bookId)
    {
        $cartModel = new Cart();
        $userId = $this->getUserId();
        $cartModel->removeFromCart($bookId, $userId);
        $this->redirect('/cart');
    }

    private function getUserId()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        return $_SESSION['user_id'] ?? null;
    }
}
