<?php

namespace Models;

use Core\Model;
use PDO;

class Cart extends Model
{
    public function getCartItems($userId = null)
    {
        if ($userId) {
            $sql = "SELECT ci.*, b.name, b.price, i.image_url, b.stock
                    FROM cart_item ci
                    JOIN books b ON ci.book_id = b.id
                    JOIN book_images i ON ci.book_id = i.book_id
                    WHERE ci.cart_id = (SELECT id FROM cart WHERE user_id = :user_id)
                    GROUP BY ci.id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['user_id' => $userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $cartItems = $this->getCartItemsFromCookie();
            $bookIds = array_keys($cartItems);

            if (empty($bookIds)) {
                return [];
            }

            $placeholders = implode(',', array_fill(0, count($bookIds), '?'));
            $sql = "SELECT b.id as book_id, b.name, b.price, i.image_url,b.stock
                    FROM books b
                    JOIN book_images i ON b.id = i.book_id
                    WHERE b.id IN ($placeholders)
                    GROUP BY b.id";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($bookIds);
            $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($books as &$book) {
                $book['quantity'] = $cartItems[$book['book_id']];
            }

            return $books;
        }
    }

    public function addToCart($bookId, $quantity = 1, $userId = null)
    {
        if ($userId) {
            $cartId = $this->getCartIdByUserId($userId);
            if (!$cartId) {
                $cartId = $this->createCart($userId);
            }

            $sql = "INSERT INTO cart_item (cart_id, book_id, quantity, created_at) 
            VALUES (:cart_id, :book_id, :quantity, CURRENT_TIMESTAMP)
            ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':cart_id', $cartId);
            $stmt->bindParam(':book_id', $bookId);
            $stmt->bindParam(':quantity', $quantity);
            $stmt->execute();
        } else {
            $this->addToCartCookie($bookId, $quantity);
        }

        echo json_encode(['success' => true]);
    }

    public function getBookStock($bookId)
    {
        $sql = "SELECT stock FROM books WHERE id = :book_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['book_id' => $bookId]);
        return $stmt->fetchColumn();
    }

    public function updateCartQuantity($bookId, $quantity, $userId = null)
    {
        if ($userId) {
            $cartId = $this->getCartIdByUserId($userId);
            if ($cartId) {
                $sql = "UPDATE cart_item SET quantity = :quantity WHERE cart_id = :cart_id AND book_id = :book_id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['quantity' => $quantity, 'cart_id' => $cartId, 'book_id' => $bookId]);
            }
        } else {
            $this->updateCartQuantityCookie($bookId, $quantity);
        }
    }

    private function updateCartQuantityCookie($bookId, $quantity)
    {
        $cart = $this->getCartItemsFromCookie();
        if (isset($cart[$bookId])) {
            $cart[$bookId] = $quantity;
        } else {
            $cart[$bookId] = $quantity;
        }
        setcookie('cart', json_encode($cart), time() + (86400 * 30), "/"); // 30 days
    }

    public function removeFromCart($bookId, $userId = null)
    {
        if ($userId) {
            $cartId = $this->getCartIdByUserId($userId);
            if ($cartId) {
                $sql = "DELETE FROM cart_item WHERE cart_id = :cart_id AND book_id = :book_id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute(['cart_id' => $cartId, 'book_id' => $bookId]);
            }
        } else {
            $this->removeFromCartCookie($bookId);
        }
    }

    private function getCartIdByUserId($userId)
    {
        $sql = "SELECT id FROM cart WHERE user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchColumn();
    }

    private function createCart($userId)
    {
        $sql = "INSERT INTO cart (user_id, created_at) VALUES (:user_id, CURRENT_TIMESTAMP)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        return $this->pdo->lastInsertId();
    }

    private function getCartItemsFromCookie()
    {
        return isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];
    }

    private function addToCartCookie($bookId, $quantity)
    {
        $cart = $this->getCartItemsFromCookie();
        if (isset($cart[$bookId])) {
            $cart[$bookId] += $quantity;
        } else {
            $cart[$bookId] = $quantity;
        }
        setcookie('cart', json_encode($cart), time() + (86400 * 30), "/"); // 30 days
    }

    private function removeFromCartCookie($bookId)
    {
        $cart = $this->getCartItemsFromCookie();
        if (isset($cart[$bookId])) {
            unset($cart[$bookId]);
        }
        setcookie('cart', json_encode($cart), time() + (86400 * 30), "/"); // 30 days
    }
}
