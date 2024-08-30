<?php

namespace App\Controllers;

use Core\Controller;
use Models\Book;

class SearchController extends Controller
{
    public function index()
    {
        $query = $_GET['query'] ?? '';
        $page = $_GET['page'] ?? 1;
        $limit = 4;
        $offset = ($page - 1) * $limit;

        $bookModel = new Book();
        if ($query) {
            $results = $bookModel->searchBooks($query, $limit, $offset);
            $totalResults = $bookModel->countSearchResults($query);
        } else {
            $results = $bookModel->getBooks($limit, $offset);
            $totalResults = $bookModel->countBooks();
        }

        $totalPages = ceil($totalResults / $limit);
        
        $this->render('pages/searchResults', [
            'results' => $results,
            'query' => $query,
            'currentPage' => $page,
            'totalPages' => $totalPages
        ]);
    }
}
