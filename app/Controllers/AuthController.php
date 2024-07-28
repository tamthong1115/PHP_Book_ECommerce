<?php
namespace App\Controllers;

use Core\Controller;
use Models\User;

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
                // Set session or token for authenticated user
                $_SESSION['user_id'] = $user['id'];
                $this->redirect('/');
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
            $data = [
                'avatar' => $_POST['avatar'] ?? null,
                'first_name' => $_POST['first_name'] ?? null,
                'last_name' => $_POST['last_name'] ?? null,
                'username' => $_POST['username'],
                'email' => $_POST['email'] ?? null,
                'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                'birth_of_date' => $_POST['birth_of_date'] ?? null,
                'phone_number' => $_POST['phone_number'] ?? null,
                'address' => $_POST['address'] ?? null,
            ];
            $userModel = new User();
            $userModel->createUser($data);
            $this->redirect('/sign-in');
        } else {
            $this->render('auth/sign-up');
        }
    }
}