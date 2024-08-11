<?php
namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{

    public function index()
    {
        $this->render('pages/home');
    }

    public function about()
    {
        $this->render('pages/about');
    }
    public function contact()
    {
        $this->render('pages/contact');
    }
}