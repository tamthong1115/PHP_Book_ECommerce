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
        $totalBooks = count($cartItems);
        $this->render('pages/cart', [
            'cartItems' => $cartItems,
            'totalBooks' => $totalBooks,
        ]);
    }

    public function add($bookId)
    {
        $cartModel = new Cart();
        $userId = $this->getUserId();


        $cartModel->addToCart($bookId, 1, $userId);
    }

    public function updateQuantity($bookId, $quantity)
    {
        $cartModel = new Cart();
        $userId = $this->getUserId();
        $availableStock = $cartModel->getBookStock($bookId);

        if ($quantity <= $availableStock) {
            $cartModel->updateCartQuantity($bookId, $quantity, $userId);
            echo json_encode(['success' => true, 'message' => 'Quantity updated successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Quantity exceeds available stock']);
        }
    }

    public function remove($bookId)
    {
        $cartModel = new Cart();
        $userId = $this->getUserId();
        try {
            $cartModel->removeFromCart($bookId, $userId);
            echo json_encode(['success' => true, 'message' => 'Item removed successfully']);
        } catch (\Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Failed to remove item']);
        }
    }

    private function getUserId()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        return $_SESSION['user_id'] ?? null;
    }
}
