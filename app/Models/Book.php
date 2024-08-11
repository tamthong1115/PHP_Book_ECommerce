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
        $sql = "INSERT INTO books (name, description, summary, price, stock, author, publisher,language,publication_year,pages,weight,format, created_at) 
                VALUES (:name, :description, :summary, :price, :stock, :author, :publisher,:language,:publication_year,:pages,:weight,:format, CURRENT_TIMESTAMP)";
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

    public function addBookImages($bookId, $imagePaths)
    {
        $sql = "INSERT INTO book_images (book_id, image_url, created_at) VALUES (:book_id, :image_url, CURRENT_TIMESTAMP)";
        $stmt = $this->pdo->prepare($sql);
        foreach ($imagePaths as $imagePath) {
            $stmt->execute(['book_id' => $bookId, 'image_url' => $imagePath]);
        }
    }

    public function getAllCategories()
    {
        return $this->getAll('categories');
    }
}
