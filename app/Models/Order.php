<?php

namespace Models;

use Core\Model;
use PDO;
use Ramsey\Uuid\Uuid;


class Order extends Model
{

    public function insertOrder($userId, $totalAmount, $status, $orderSubtotal)
    {

        $orderId = Uuid::uuid4()->toString();


        $stmt = $this->pdo->prepare("INSERT INTO order_details (id, user_id, total, status, order_subtotal, created_at) VALUES (:id, :user_id, :total, :status, :order_subtotal, NOW())");
        $stmt->execute([
            ':id' => $orderId,
            ':user_id' => $userId,
            ':total' => $totalAmount,
            ':status' => $status,
            ':order_subtotal' => $orderSubtotal
        ]);

        return $orderId;
    }

    public function insertOrderItem($orderId, $bookId, $quantity, $price)
    {
        $stmt = $this->pdo->prepare("INSERT INTO order_item (order_id, book_id, quantity, price, created_at) VALUES (:order_id, :book_id, :quantity, :price, NOW())");
        $stmt->execute([
            ':order_id' => $orderId,
            ':book_id' => $bookId,
            ':quantity' => $quantity,
            ':price' => $price
        ]);
    }

    public function updatePaymentIntent($orderId, $paymentIntentId)
    {
        $stmt = $this->pdo->prepare("UPDATE order_details SET payment_intent_id = :payment_intent_id WHERE id = :id");
        $stmt->execute([
            ':payment_intent_id' => $paymentIntentId,
            ':id' => $orderId
        ]);
    }

    public function updateOrderStatus($orderId, $status)
    {
        $stmt = $this->pdo->prepare("UPDATE order_details SET status = :status WHERE id = :id");
        $stmt->execute([
            ':status' => $status,
            ':id' => $orderId
        ]);
    }

    public function getOrdersByUserId($userId)
    {
        $sql = "SELECT od.*, u.username as username
                FROM order_details od
                JOIN users u ON od.user_id = u.id
                WHERE od.user_id = :user_id
                ORDER BY od.created_at DESC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['user_id' => $userId]);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getOrderItemsByOrderId($orderId)
    {
        $query = "
            SELECT 
                oi.book_id,
                oi.quantity, 
                oi.price, 
                b.name AS book_name, 
                COALESCE(bi.image_url, 'default_image_url') AS image_url
            FROM order_item oi
            JOIN books b ON oi.book_id = b.id
            LEFT JOIN (
                SELECT book_id, MIN(image_url) AS image_url
                FROM book_images
                GROUP BY book_id
            ) bi ON b.id = bi.book_id
            WHERE oi.order_id = :order_id
        ";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':order_id', $orderId);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function getRecentOrders($limit)
    {
        $sql = "SELECT order_details.*, u.username as username
            FROM order_details 
            JOIN users u ON order_details.user_id = u.id
            ORDER BY order_details.created_at DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function getAllOrders($limit, $offset)
    {
        $sql = "SELECT *, u.username as username,
            FROM order_details ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getBookNamesByOrderId($orderId)
    {
        $sql = "SELECT b.name
                FROM books b
                JOIN order_item oi ON b.id = oi.book_id
                WHERE oi.order_id = :order_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['order_id' => $orderId]);
        return $stmt->fetchAll(\PDO::FETCH_COLUMN);
    }
}
