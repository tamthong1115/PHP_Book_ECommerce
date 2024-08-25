<?php
namespace Core;

use PDO;
use PDOException;

class Model
{
    protected $pdo;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB()
    {
        $host = $_ENV['HOST_DB_NAME'] ?? 'localhost';
        $db   = 'book_ecommerce';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
    
        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getAll($table)
    {
        $stmt = $this->pdo->query("SELECT * FROM {$table}");
        return $stmt->fetchAll();
    }

    public function getById($table, $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}