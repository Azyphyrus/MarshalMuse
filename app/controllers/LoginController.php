<?php

class LoginController extends Controller
{
    public function index()
    {
        // If already logged in, redirect
        if (isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'index.php?url=home');
            exit;
        }
        // This simply loads the login view
        $this->view('login');
    }

        public function authenticate()
    {
        require_once __DIR__ . '/../models/User.php';
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $identifier = trim($_POST['identifier'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (empty($identifier) || empty($password)) {
                $error = "Please fill in all fields.";
                $this->view('login', ['error' => $error]);
                return;
            }

            $userModel = new User();
            $user = $userModel->verifyUser($identifier, $password);

            if ($user) {
                // Store user session (omit sensitive data)
                $_SESSION['user'] = [
                    'id' => $user['user_id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'full_name' => $user['full_name']
                ];

                header('Location: ' . BASE_URL . 'index.php?url=home');
                exit;
            } else {
                $error = "Invalid email/username or password.";
                $this->view('login', ['error' => $error]);
            }
        } else {
            header('Location: ' . BASE_URL . 'index.php?url=login');
        }
    }
}
