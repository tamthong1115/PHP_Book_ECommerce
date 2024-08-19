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

            $sql = "INSERT INTO users (avatar, first_name, last_name, username, email, password, birth_of_date, phone_number, address) 
                    VALUES (:avatar, :first_name, :last_name, :username, :email, :password, :birth_of_date, :phone_number, :address)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($data);

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
