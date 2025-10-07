<?php
class SignupController extends Controller
{
    public function index()
    {
        $this->view('signup');
    }

        public function register()
    {
        require_once __DIR__ . '/../models/User.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm = $_POST['confirm_password'] ?? '';
            $full_name = trim($_POST['full_name'] ?? '');

            if (empty($username) || empty($email) || empty($password)) {
                $error = "All required fields must be filled out.";
                return $this->view('register', ['error' => $error]);
            }

            if ($password !== $confirm) {
                $error = "Passwords do not match.";
                return $this->view('register', ['error' => $error]);
            }

            $userModel = new User();

            if ($userModel->findByEmailOrUsername($email) || $userModel->findByEmailOrUsername($username)) {
                $error = "Username or email already taken.";
                return $this->view('register', ['error' => $error]);
            }

            if ($userModel->createUser($username, $email, $password, $full_name)) {
                header("Location: " . BASE_URL . "index.php?url=login");
                exit;
            } else {
                $error = "Registration failed. Try again.";
                return $this->view('register', ['error' => $error]);
            }
        } else {
            $this->view('register');
        }
    }
}