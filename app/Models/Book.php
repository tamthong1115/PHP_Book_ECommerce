<?php

namespace Models;

use Core\Model;
use PDO;

class Book extends Model
{
    public function getAllBooks()
    {
        return $this->getAll('books');
    }

    public function createBook($data)
    {
        $sql = "INSERT INTO books (name, description, summary, price, stock, author, publisher, created_at) 
                VALUES (:name, :description, :summary, :price, :stock, :author, :publisher, CURRENT_TIMESTAMP)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId(); 
    }

    public function addBookCategories($bookId, $categories)
    {
        $sql = "INSERT INTO book_categories (book_id, category_id, created_at) VALUES (:book_id, :category_id, CURRENT_TIMESTAMP)";
        $stmt = $this->pdo->prepare($sql);
        foreach ($categories as $categoryId) {
            $stmt->execute(['book_id' => $bookId, 'category_id' => $categoryId]);
        }
    }

    public function getAllCategories()
    {
        return $this->getAll('categories');
    }
}
