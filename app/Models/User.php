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

            $existingUser = $this->findByEmailOrUsername($data['email'], $data['username']);
            if ($existingUser) {
            throw new \Exception('Email hoặc username đã tồn tại');
            }

            

            $sql = "INSERT INTO users (avatar, first_name, last_name, username, email, password, birth_of_date, phone_number,account_activation_hash) 
                    VALUES (:avatar, :first_name, :last_name, :username, :email, :password, :birth_of_date, :phone_number, :account_activation_hash)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'avatar' => $data['avatar'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
                'birth_of_date' => $data['birth_of_date'],
                'phone_number' => $data['phone_number'],
                'account_activation_hash' => $data['account_activation_hash']
            ]);
            

            $userId = $this->pdo->lastInsertId();

            $cartSql = "INSERT INTO cart (user_id, created_at) VALUES (:user_id, CURRENT_TIMESTAMP)";
            $cartStmt = $this->pdo->prepare($cartSql);
            $cartStmt->execute(['user_id' => $userId]);

            $this->pdo->commit();
            return true;
        } catch (\PDOException $e) {
            $this->pdo->rollBack();
            throw $e;}
        }

    
        public function findByActivationHash($hash)
    {
        $sql = "SELECT * FROM users WHERE account_activation_hash = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$hash]);
        return $stmt->fetch();
    }

    public function activateUser($userId)
    {
        $sql = "UPDATE users SET account_activation_hash = NULL WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);
    }

    public function getUserById($id)
    {
        $stmt = $this->pdo->prepare("SELECT u.id, u.first_name, u.last_name, u.username, u.email, u.phone_number, u.birth_of_date, u.avatar, 
                   a.address_line_1, a.address_line_2, a.province,  a.ward, a.district
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
            // Update user fields
            $userFields = ['first_name', 'last_name', 'email', 'phone_number', 'birth_of_date', 'avatar'];

            $userData = array_intersect_key($data, array_flip($userFields));
            if (!empty($userData)) {
                $sql = "UPDATE users SET " . implode(', ', array_map(fn($key) => "$key = :$key", array_keys($userData))) . " WHERE id = :id";
                $stmt = $this->pdo->prepare($sql);
                $userData['id'] = $id;
                $stmt->execute($userData);
            }

            // Update address fields
            $addressFields = ['address_line_1', 'address_line_2', 'province', 'district', 'ward'];
            $addressData = array_intersect_key($data, array_flip($addressFields));
            if (!empty($addressData)) {
                $addressData = array_merge([
                    'address_line_1' => null,
                    'address_line_2' => null,
                    'province' => null,
                    'district' => null,
                    'ward' => null,
                ], $addressData);

                $sql = "INSERT INTO addresses (user_id, address_line_1, address_line_2, province, district, ward) 
                VALUES (:user_id, :address_line_1, :address_line_2, :province, :district, :ward)
                ON DUPLICATE KEY UPDATE
                address_line_1 = VALUES(address_line_1),
                address_line_2 = VALUES(address_line_2),
                province = VALUES(province),
                district = VALUES(district),
                ward = VALUES(ward)";
                $stmt = $this->pdo->prepare($sql);
                $addressData['user_id'] = $id;
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
    public function findByEmailOrUsername($email, $username)
{
    $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    return $stmt->fetch();
}

public function setPasswordResetToken($email) {
    $token = bin2hex(random_bytes(16));
    $token_hash = hash("sha256", $token);
    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

    $sql = "UPDATE users
            SET reset_token_hash = :token_hash,
                reset_token_expires_at = :expiry
            WHERE email = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':token_hash', $token_hash);
    $stmt->bindParam(':expiry', $expiry);
    $stmt->bindParam(':email', $email);

    
    return $stmt->execute();
} 
public function getPasswordResetToken($email) {
    $sql = "SELECT reset_token_hash FROM users WHERE email = :email";
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user ? $user['reset_token_hash'] : null;
}
public function findByResetTokenHash($token_hash)
    {
        $sql = "SELECT * FROM users WHERE reset_token_hash = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$token_hash]);
        return $stmt->fetch();
    }

    public function updatePassword($user_id, $password_hash)
    {
        $sql = "UPDATE users SET password = ?, reset_token_hash = NULL, reset_token_expires_at = NULL WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$password_hash, $user_id]);
    }
}
