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

    public function getOrderById($orderId)
    {
        $sql = "SELECT * FROM order_details WHERE id = :order_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['order_id' => $orderId]);
        $order = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($order) {
            $order['items'] = $this->getOrderItemsByOrderId($orderId);
        }

        return $order;
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

    public function userIdInOrderDetails($orderId)
    {
        $sql = "SELECT user_id FROM order_details WHERE id = :order_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['order_id' => $orderId]);
        return $stmt->fetchColumn();
    }

    public function getAdminOrderItemsByOrderId($orderId)
    {
        $query = "
            SELECT
                go.name as guest_name,
                go.email as guest_email,
                go.phone_number as guest_phone_number,
                u.username as username,
                u.email as email,
                addresses.*, 
                oi.book_id,
                oi.quantity, 
                oi.price, 
                b.name AS book_name, 
                COALESCE(bi.image_url, 'default_image_url') AS image_url
            FROM order_item oi
            JOIN books b ON oi.book_id = b.id
            JOIN order_details od ON oi.order_id = od.id
            LEFT JOIN users u ON od.user_id = u.id
            LEFT JOIN guest_orders go ON go.order_id = od.id
            LEFT JOIN addresses ON  u.id = addresses.user_id OR go.id = addresses.guest_order_id
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

        $result  = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $orderDetail = [
            'order_id' => $orderId,
            'guest_name' => $result[0]['guest_name'],
            'guest_email' => $result[0]['guest_email'],
            'guest_phone_number' => $result[0]['guest_phone_number'],
            'username' => $result[0]['username'],
            'email' => $result[0]['email'],
            'address_line_1' => $result[0]['address_line_1'],
            'address_line_2' => $result[0]['address_line_2'],
            'ward' => $result[0]['ward'],
            'province' => $result[0]['province'],
            'district' => $result[0]['district'],
            'guest_order_id' => $result[0]['guest_order_id'],
        ];

        $orderDetail['items'] = array_map(function ($item) {
            return [
                'book_id' => $item['book_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
                'book_name' => $item['book_name'],
                'image_url' => $item['image_url'],
            ];
        }, $result);

        return $orderDetail;
    }

    public function getRecentOrders($limit)
    {
        $sql = "SELECT order_details.*, u.username as username
            FROM order_details 
                LEFT JOIN users u ON order_details.user_id = u.id
            ORDER BY order_details.created_at DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':limit', $limit, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getAllOrders($limit, $offset)
    {
        $sql = "SELECT od.*, u.username as username
                FROM order_details od
                LEFT JOIN users u ON od.user_id = u.id
                ORDER BY od.created_at DESC
                LIMIT :limit OFFSET :offset";
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
