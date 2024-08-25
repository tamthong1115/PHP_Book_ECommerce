<?php

namespace App\Controllers;

use Core\Controller;
use Models\Book;

class HomeController extends Controller
{

    public function index()
    {
        $bookModel = new Book();
        $bookLiteratures = $bookModel->getBookByCategoryNameAndLimit('Văn Học', 8);
        foreach ($bookLiteratures as $key => $book) {
            $bookLiteratures[$key]['image'] = $bookModel->getFirstImageByBookId($book['id']);
        }
        $newestBooks = $bookModel->getNewestBooks(8);
        foreach ($newestBooks as $key => $book) {
            $newestBooks[$key]['image'] = $bookModel->getFirstImageByBookId($book['id']);
        }
        $this->render('pages/home', [
            'bookLiteratures' => $bookLiteratures,
            'newestBooks' => $newestBooks
        ]);
    }

    public function about()
    {
        $this->render('pages/about');
    }
    public function contact()
    {
        $this->render('pages/contact');
    }

    public function bookDetail($id)
    {
        $bookModel = new Book();
        $book = $bookModel->getBookById($id);
        $book['images'] = $bookModel->getImagesByBookId($id);
        $imageUrls = array_map(function ($image) {
            return $image['image_url'];
        }, $book['images']);
        $book['images'] = $imageUrls;
        $this->render('pages/bookDetail', ['book' => $book]);
    }
}
