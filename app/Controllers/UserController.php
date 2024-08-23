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
            ];


            $this->model->createUser($data);
            $this->redirect('/users');
        } else {
            $this->render('users/create');
        }
    }


    public function profile()
    {
        $id = $_SESSION['user_id'];
        $user = $this->model->getUserById($id);
        $this->render('users/profile', ['user' => $user]);
    }

    public function updateProfile()
    {
        $id = $_SESSION['user_id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [];
            if (!empty($_POST['avatar'])) {
                $data['avatar'] = $_POST['avatar'];
            }
            if (!empty($_POST['first_name'])) {
                $data['first_name'] = $_POST['first_name'];
            }
            if (!empty($_POST['last_name'])) {
                $data['last_name'] = $_POST['last_name'];
            }
            if (!empty($_POST['email'])) {
                $data['email'] = $_POST['email'];
            }
            if (!empty($_POST['phone_number'])) {
                $data['phone_number'] = $_POST['phone_number'];
            }
            if (!empty($_POST['birth_of_date'])) {
                $data['birth_of_date'] = $_POST['birth_of_date'];
            }
            if (!empty($_POST['address_line_1'])) {
                $data['address_line_1'] = $_POST['address_line_1'];
            }
            if (!empty($_POST['address_line_2'])) {
                $data['address_line_2'] = $_POST['address_line_2'];
            }
            if (!empty($_POST['ward'])) {
                $data['ward'] = $_POST['ward'];
            }
            if (!empty($_POST['district'])) {
                $data['district'] = $_POST['district'];
            }
            if (!empty($_POST['city'])) {
                $data['city'] = $_POST['city'];
            }

            if (!empty($data)) {
                $this->model->updateUser($id, $data);
            }
            $this->redirect('/users/profile');
        } else {
            $this->render('users/updateProfile', ['user' => $this->model->getUserById($id)]);
        }
    }
}
