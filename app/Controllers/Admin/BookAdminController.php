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
        $bookModel = new Book();
        $bookLiteratures = $bookModel->getBookByCategoryNameAndLimit('Văn Học', 8);
        foreach ($bookLiteratures as $key => $book) {
            $bookLiteratures[$key]['image'] = $bookModel->getFirstImageByBookId($book['id']);
        }
        $this->render('admin/books/index', ['bookLiteratures' => $bookLiteratures]);
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
                'supplier' => $_POST['supplier'],
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
            $imageNames = $this->uploadImages($bookId, $images);

            // Save image paths to the database
            $this->model->addBookImages($bookId, $imageNames);

            $this->redirect('/admin/books');
        } else {
            $categories = $this->model->getAllCategories();
            $this->render('admin/books/addBook', ['categories' => $categories]);
        }
    }

    public function delete($bookId)
    {
        $this->model->deleteBook($bookId);
        $this->redirect('/admin/books');

    }

    private function uploadImages($bookId, $images)
{
    $uploadDir = 'uploads/' . $bookId . '/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imageData = [];
    foreach ($images['name'] as $key => $name) {
        $imageData[] = [
            'name' => $name,
            'tmp_name' => $images['tmp_name'][$key],
        ];
    }

    // Sort the array by file name using natural sorting
    usort($imageData, function($a, $b) {
        return strnatcmp($a['name'], $b['name']);
    });

    print_r($imageData);

    $imageNames = [];
    foreach ($imageData as $image) {
        $fileName = basename($image['name']);
        $filePath = $uploadDir . $fileName;
        if (move_uploaded_file($image['tmp_name'], $filePath)) { 
            $imageNames[] = $fileName; // Store only the file name
        }
    }

    return $imageNames;
}


    // get all categories
    // e.g [parentCategory => [childCategory1, childCategory2], parentCategory2 => [childCategory3, childCategory4]]
    // public function getCategories()
    // {
    //     $categories = $this->model->getAllCategories();
    //     $categoryMap = [];
    //     foreach ($categories as $category) {
    //         if ($category['parent_id'] === null) {
    //             $categoryMap[$category['id']] = [];
    //         } else {
    //             $categoryMap[$category['parent_id']][] = $category;
    //         }
    //     }
    //     return $categoryMap;
    // }
}
