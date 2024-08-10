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
        $sql = "INSERT INTO users (avatar, first_name, last_name, username, email, password, birth_of_date, phone_number, address) 
                VALUES (:avatar, :first_name, :last_name, :username, :email, :password, :birth_of_date, :phone_number, :address)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
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
