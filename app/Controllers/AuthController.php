<?php

namespace App\Controllers;


use Core\Controller;
use Models\User;
use Utils\jwtUtil;
use Utils\Csrf;
use \Exception;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->loadModel('User');
    }
    public function signIn()
    {
        $redirectUrl = $_POST['redirectUrl'] ?? '/';

        // Start output buffering to prevent premature output
        ob_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identifier = $_POST['identifier'];
            $password = $_POST['sign-in-password'];

            // Check if the identifier is an email or username
            if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
                $user = $this->model->findByEmail($identifier);
            } else {
                $user = $this->model->findByUsername($identifier);
            }

            if ($user && password_verify($password, $user['password']) && $user['account_activation_hash'] === null) {
                $payload = [
                    'user_id' => $user['id'],
                    'username' => $user['username'],
                    'isAdmin' => $user['isAdmin']
                ];
                $jwt = JwtUtil::encode($payload);

                Csrf::generateToken();

                setcookie('auth_token', $jwt, time() + (86400 * 30), "/");

                header('Content-Type: application/json');
                echo json_encode(['type' => 'success', 'message' => 'Login successful!', 'isAdmin' => $user['isAdmin']]);

                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['isAdmin'] = $user['isAdmin'];

                // Ensure output buffer is flushed and the script is terminated
                ob_end_flush();
                exit();
            } else {
                // Set the header to application/json
                header('Content-Type: application/json');
                echo json_encode(['type' => 'error', 'message' => 'Invalid credentials.']);
                // Ensure output buffer is flushed and the script is terminated
                ob_end_flush();
                exit();
            }
        } else {
            $this->redirect($redirectUrl);
        }
    }

    public function signUp()
    {   $redirectUrl = $_POST['redirectUrl'] ?? '/';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = !empty($_POST['email']) ? $_POST['email'] : null;
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($password !== $confirmPassword) {
                $this->render('layout/layout', ['error' => 'Passwords do not match']);
                return;
            }
            $activation_token = bin2hex(random_bytes(16));
            $activation_token_hash = hash("sha256", $activation_token);
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
                'account_activation_hash' => $activation_token_hash
            ];

            $userModel = new User();
        if ($userModel->createUser($data)) {
            

            // Gửi email kích hoạt
            $mail = require __DIR__ . "/mailer.php";
            $mail->setFrom("noreply@example.com");
            $mail->addAddress($_POST['email']);
            $mail->Subject = "Account Activation";
            $mail->Body = <<<END
            Click <a href="http://localhost/PHP_Book_ECommerce/app/Views/pages/activepage.php?token=$activation_token_hash">ở đây</a> 
            để kích hoạt tài khoản.
            END;

            try {
                $mail->send();
                $this->render('layout/layout', ['success' => 'Please check your email to activate your account']);
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer error: {$mail->ErrorInfo}";
                exit;
            }
        } else {
            $this->render('layout/layout', ['error' => 'Failed to create user']);
        }
    } else {
        $this->redirect('/');
    }
    }
    public function activateAccount()
    {
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        $token_hash = hash("sha256", $token);

        $userModel = new User();
        if ($userModel->activateUser($token_hash)) {
            $this->render('layout/layout', ['success' => 'Your account has been activated successfully']);
        } else {
            $this->render('layout/layout', ['error' => 'Invalid activation token']);
        }
    } else {
        $this->redirect('/');
    }
    }

    public function logout()
    {
        setcookie('auth_token', '', time() - 3600, "/");
        session_destroy();
        $this->redirect('/');
    }
    
}

