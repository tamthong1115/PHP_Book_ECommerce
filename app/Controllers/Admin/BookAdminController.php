<?php

namespace App\Controllers\Admin;

use Core\Controller;
use Models\Book;

class BookAdminController extends Controller
{

    public function __construct()
    {
        $this->loadModel('Book');
    }

    public function index()
    {
        $this->render('admin/books/index');
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'description' => $_POST['description'],
                'summary' => $_POST['summary'],
                'price' => $_POST['price'],
                'stock' => $_POST['stock'],
                'author' => $_POST['author'],
                'publisher' => $_POST['publisher'],
                'language' => $_POST['language'],
                'publication_year' => $_POST['publication_year'],
                'pages' => $_POST['pages'],
                'weight' => $_POST['weight'],
                'format' => $_POST['format'],
            ];

            // Create book and get the book ID
            $bookId = $this->model->createBook($data);

            $categories = $_POST['categories'];
            $this->model->addBookCategories($bookId, $categories);

            $images = $_FILES['images'];
            $imagePaths = $this->uploadImages($bookId, $images);

            // Save image paths to the database
            $this->model->addBookImages($bookId, $imagePaths);

            $this->redirect('/admin/books');
        } else {
            $categories = $this->model->getAllCategories();
            $this->render('admin/books/addBook', ['categories' => $categories]);
        }
    }

    private function uploadImages($bookId, $images)
    {
        $uploadDir = 'uploads/' . $bookId . '/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); 
        }

        $imagePaths = [];
        foreach ($images['tmp_name'] as $key => $tmpName) {
            $fileName = basename($images['name'][$key]);
            $filePath = $uploadDir . $fileName;
            if (move_uploaded_file($tmpName, $filePath)) {
                $imagePaths[] = $filePath;
            }
        }

        return $imagePaths;
    }
}
