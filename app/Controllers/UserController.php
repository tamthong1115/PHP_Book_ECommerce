<?php
namespace App\Controllers;

use Core\Controller;
use Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->loadModel('User');
    }

    public function index()
    {
        $users = $this->model->getAllUsers();
        $this->render('users/index', ['users' => $users]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'avatar' => $_POST['avatar'],
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name'],
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'birth_of_date' => $_POST['birth_of_date'],
                'phone_number' => $_POST['phone_number'],
                'address' => $_POST['address'],
            ];
            $this->model->createUser($data);
            $this->redirect('/users');
        } else {
            $this->render('users/create');
        }
    }
}