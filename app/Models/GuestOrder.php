<?php

namespace Models;

use Core\Model;
use PDO;

class GuestOrder extends Model
{
    public function create($data)
    {
        try {
            $this->pdo->beginTransaction();

            // Insert into guest_orders table
            $stmt = $this->pdo->prepare("INSERT INTO guest_orders (name, email, phone_number, order_id, note, created_at) VALUES (:name, :email, :phone_number, :order_id, :note, NOW())");
            $stmt->execute([
                ':name' => $data['name'],
                ':email' => $data['email'],
                ':phone_number' => $data['phone_number'],
                ':order_id' => $data['order_id'],
                ':note' => $data['note']
            ]);
            $guestOrderId = $this->pdo->lastInsertId();

            // Insert into addresses table
            $stmt = $this->pdo->prepare("INSERT INTO addresses (guest_order_id, address_line_1, address_line_2, province, district, ward) VALUES (:guest_order_id, :address_line_1, :address_line_2, :province, :district, :ward)");
            $stmt->execute([
                ':guest_order_id' => $guestOrderId,
                ':address_line_1' => $data['address_line_1'],
                ':address_line_2' => $data['address_line_2'],
                ':province' => $data['province'],
                ':district' => $data['district'],
                ':ward' => $data['ward']
            ]);

            $this->pdo->commit();
            return $guestOrderId;
        } catch (\PDOException $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }
}
