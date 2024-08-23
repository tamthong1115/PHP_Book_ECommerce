<?php

namespace Models;

use Core\Model;
use PDO;

class User extends Model
{
    public function getAllUsers()
    {
        return $this->getAll('users');
    }

    public function createUser($data): bool
    {
        try {
            $this->pdo->beginTransaction();

            $sql = "INSERT INTO users (avatar, first_name, last_name, username, email, password, birth_of_date, phone_number) 
                    VALUES (:avatar, :first_name, :last_name, :username, :email, :password, :birth_of_date, :phone_number)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'avatar' => $data['avatar'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
                'birth_of_date' => $data['birth_of_date'],
                'phone_number' => $data['phone_number']
            ]);

            $userId = $this->pdo->lastInsertId();

            $cartSql = "INSERT INTO cart (user_id, created_at) VALUES (:user_id, CURRENT_TIMESTAMP)";
            $cartStmt = $this->pdo->prepare($cartSql);
            $cartStmt->execute(['user_id' => $userId]);

            $this->pdo->commit();
            return true;
        } catch (\PDOException $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }

    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("
            SELECT u.id, u.first_name, u.last_name, u.username, u.email, u.phone_number, u.birth_of_date, u.avatar, 
                   a.address_line_1, a.address_line_2, a.ward, a.district, a.city 
            FROM users u 
            LEFT JOIN addresses a ON u.id = a.user_id 
            WHERE u.id = :id
        ");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateUser($id, $data)
    {
        $this->pdo->beginTransaction();
        try {
            $fields = [];
            $params = ['id' => $id];

            foreach ($data as $key => $value) {
                if (!empty($value)) {
                    $fields[] = "$key = :$key";
                    $params[$key] = $value;
                }
            }

            if (!empty($fields)) {
                $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = :id";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($params);
            }

            $addressFields = ['address_line_1', 'address_line_2', 'ward', 'district', 'city'];
            $addressData = array_intersect_key($data, array_flip($addressFields));
            if (!empty($addressData)) {
                $addressData['user_id'] = $id;
                $sql = "
                INSERT INTO addresses (user_id, address_line_1, address_line_2, ward, district, city) 
                VALUES (:user_id, :address_line_1, :address_line_2, :ward, :district, :city)
                ON DUPLICATE KEY UPDATE 
                address_line_1 = :address_line_1, address_line_2 = :address_line_2, ward = :ward, district = :district, city = :city
            ";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute($addressData);
            }

            $this->pdo->commit();
        } catch (\PDOException $e) {
            $this->pdo->rollBack();
            throw $e;
        }
    }


    public function findByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function findByUsername($username)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
