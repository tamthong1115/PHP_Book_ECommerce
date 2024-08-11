<?php

namespace App\Controllers;

require_once 'app/utils/jwtUtil.php';

use Core\Controller;
use Models\User;
use Utils\JwtUtil;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->loadModel('User');
    }
    public function signIn()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identifier = $_POST['identifier'];
            $password = $_POST['password'];

            // Check if the identifier is an email or username
            if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
                $user = $this->model->findByEmail($identifier);
            } else {
                $user = $this->model->findByUsername($identifier);
            }

            if ($user && password_verify($password, $user['password'])) {
                $payload = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'isAdmin' => $user['isAdmin']
                ];
                $jwt = JwtUtil::encode($payload);

                setcookie('auth_token', $jwt, time() + (86400 * 30), "/");
                
                if ($user['isAdmin']) {
                    $this->redirect('/admin');
                } else {
                    $this->redirect('/');
                }
            } else {
                $this->render('auth/sign-in', ['error' => 'Invalid email/username or password']);
            }
        } else {
            $this->render('auth/sign-in');
        }
    }
    public function signUp()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = !empty($_POST['email']) ? $_POST['email'] : null;
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($password !== $confirmPassword) {
                $this->render('auth/sign-up', ['error' => 'Passwords do not match']);
                return;
            }

            $data = [
                'avatar' => $_POST['avatar'] ?? null,
                'first_name' => $_POST['first_name'] ?? null,
                'last_name' => $_POST['last_name'] ?? null,
                'username' => $_POST['username'],
                'email' => $email,
                'password' => password_hash($password, PASSWORD_BCRYPT),
                'birth_of_date' => $_POST['birth_of_date'] ?? null,
                'phone_number' => $_POST['phone_number'] ?? null,
                'address' => $_POST['address'] ?? null,
            ];

            $userModel = new User();
            if ($userModel->createUser($data)) {
                $this->render('auth/sign-up', ['success' => 'User created successfully']);
            } else {
                $this->render('auth/sign-up', ['error' => 'Failed to create user']);
            }
        } else {
            $this->render('auth/sign-up');
        }
    }
}
