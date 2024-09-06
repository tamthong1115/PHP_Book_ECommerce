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

    public function activepage()
    { 
        $this->render('pages/activepage');
    }
    public function forgot_password()
    { 
        $this->render('pages/forgotpassword');
    }
    public function resetpassword()
    { 
        $this->render('pages/resetpassword');
    }
    public function sendpasswordreset()
    { 
        $this->render('pages/sendpasswordreset');
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

        // Fetch similar books by the same publisher
        $similarBooks = $this->bookSimilar($book['publisher'], $id);

        $this->render('pages/bookDetail', [
            'book' => $book,
            'similarBooks' => $similarBooks
        ]);
    }
    private function bookSimilar($publisher, $excludeBookId)
    {
        $bookModel = new Book();
        return $bookModel->getBooksByPublisher($publisher, $excludeBookId);
    }
}
