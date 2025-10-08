<?php

class SigninController extends Controller
{
        public function index()
        {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_SESSION['user'])) {
                require_once '../app/models/User.php';
                $userModel = new User();

                $user = $_SESSION['user'];

                if ($userModel->hasRole($user['id'], 'admin')) {
                    header('Location: ' . BASE_URL . 'index.php?url=admin');
                    exit;
                } elseif ($userModel->hasRole($user['id'], 'user')) {
                    header('Location: ' . BASE_URL . 'index.php?url=apphub');
                    exit;
                } else {
                    header('Location: ' . BASE_URL . 'index.php?url=apphub');
                    exit;
                }
            }

            $this->view('login');
        }

        public function login()
    {
        require_once __DIR__ . '/../models/User.php';

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
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'full_name' => $user['full_name']
                ];

                if ($userModel->hasRole($user['id'], 'admin')) {
                    header('Location: ' . BASE_URL . 'index.php?url=admin');
                    exit;
                } elseif ($userModel->hasRole($user['id'], 'user')) {
                    header('Location: ' . BASE_URL . 'index.php?url=apphub');
                    exit;
                } else {
                    header('Location: ' . BASE_URL . 'index.php?url=home');
                    exit;
                }
            } else {
                $error = "Invalid email/username or password.";
                $this->view('login', ['error' => $error]);
            }
        } else {
            header('Location: ' . BASE_URL . 'index.php?url=login');
        }
    }
}
