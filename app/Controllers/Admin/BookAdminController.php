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
            ];
            $bookId = $this->model->createBook($data);
            $categories = $_POST['categories'];
            $this->model->addBookCategories($bookId, $categories);
            $this->redirect('/admin/books');
        } else {
            $categories = $this->model->getAllCategories();
            $this->render('admin/books/addBook', ['categories' => $categories]);
        }
    }
}
