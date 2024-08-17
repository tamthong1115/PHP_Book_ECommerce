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
        $sql = "INSERT INTO books (name, description, summary, price, stock, author, publisher,supplier,language,publication_year,pages,weight,format, created_at) 
                VALUES (:name, :description, :summary, :price, :stock, :author, :publisher,:supplier,:language,:publication_year,:pages,:weight,:format, CURRENT_TIMESTAMP)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $this->pdo->lastInsertId();
    }

    public function getBookById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getImagesByBookId($bookId)
    {
        $sql = "SELECT image_url FROM book_images WHERE book_id = :book_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':book_id', $bookId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBookCategories($bookId, $categories)
    {
        $sql = "INSERT INTO book_categories (book_id, category_id, created_at) VALUES (:book_id, :category_id, CURRENT_TIMESTAMP)";
        $stmt = $this->pdo->prepare($sql);
        foreach ($categories as $categoryId) {
            $stmt->execute(['book_id' => $bookId, 'category_id' => $categoryId]);
        }
    }

    public function addBookImages($bookId, $imageNames)
    {
        foreach ($imageNames as $imageName) {
            $sql = "INSERT INTO book_images (book_id, image_url) VALUES (:book_id, :image_url)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['book_id' => $bookId, 'image_url' => $imageName]);
        }
    }

    public function getAllCategories()
    {
        return $this->getAll('categories');
    }

    public function getAllImagesByBookId($bookId)
    {
        $sql = "SELECT * FROM book_images WHERE book_id = :book_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['book_id' => $bookId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // change the return type to string
    public function getFirstImageByBookId($bookId): string
    {
        $sql = "SELECT image_url FROM book_images WHERE book_id = :book_id LIMIT 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['book_id' => $bookId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['image_url'] : '';
    }


    public function getBookByCategoryNameAndLimit($categoryName, $limit)
    {
        $sql = "SELECT b.* FROM books b
                JOIN book_categories bc ON b.id = bc.book_id
                JOIN categories c ON bc.category_id = c.id
                WHERE c.name = :category_name OR c.parent_id = (SELECT id FROM categories WHERE name = :category_name2)
                GROUP BY b.id
                ORDER BY b.created_at DESC
                LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['category_name' => $categoryName, 'category_name2' => $categoryName, 'limit' => $limit]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // get newsetBooks and limit
    public function getNewestBooks($limit)
    {
        $sql = "SELECT * FROM books ORDER BY created_at DESC LIMIT :limit";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}