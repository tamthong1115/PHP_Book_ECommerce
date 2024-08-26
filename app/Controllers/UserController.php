<?php

namespace App\Controllers;

use Core\Controller;
use Models\User;
use NguyenAry\VietnamAddressAPI\Address;


class UserController extends Controller
{
    public function __construct()
    {
        $this->loadModel('User');
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
            if (!empty($_POST['update_avatar'])) {
                $data['avatar'] = $_POST['update_avatar'];
            }
            if (!empty($_POST['update_first_name'])) {
                $data['first_name'] = $_POST['update_first_name'];
            }
            if (!empty($_POST['update_last_name'])) {
                $data['last_name'] = $_POST['update_last_name'];
            }
            if (!empty($_POST['update_email'])) {
                $data['email'] = $_POST['update_email'];
            }
            if (!empty($_POST['update_phone_number'])) {
                $data['phone_number'] = $_POST['update_phone_number'];
            }
            if (!empty($_POST['update_birth_of_date'])) {
                $data['birth_of_date'] = $_POST['update_birth_of_date'];
            }
            if (!empty($_POST['update_address_line_1'])) {
                $data['address_line_1'] = $_POST['update_address_line_1'];
            }
            if (!empty($_POST['update_address_line_2'])) {
                $data['address_line_2'] = $_POST['update_address_line_2'];
            }
            if (!empty($_POST['update_province'])) {
                $data['province'] = $_POST['update_province'];
            }
            if (!empty($_POST['update_district'])) {
                $data['district'] = $_POST['update_district'];
            }
            if (!empty($_POST['update_ward'])) {
                $data['ward'] = $_POST['update_ward'];
            }
            $this->model->updateUser($id, $data);
            $this->redirect('/users/profile');
        } else {
            $user = $this->model->getUserById($id);
            $this->render('users/updateProfile', ['user' => $user]);
        }
    }
}
