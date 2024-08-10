<?php

namespace App\Controllers\Admin;

use Core\Controller;

class HomeAdminController extends Controller
{

    public function index()
    {
        $this->render('admin/pages/homeAdmin');
    }
}
