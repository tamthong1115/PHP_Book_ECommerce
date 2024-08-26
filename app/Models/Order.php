<?php

namespace Models;

use Core\Model;
use PDO;
use Ramsey\Uuid\Uuid;


class Order extends Model
{

    public function insertOrder( $userId, $totalAmount, $status, $orderSubtotal)
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
}
