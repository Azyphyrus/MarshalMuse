<?php

class AdminController extends Controller
{
    public function index()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Redirect if not logged in
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'index.php?url=signin');
            exit;
        }

        require_once '../app/models/User.php';
        $userModel = new User();
        $user = $_SESSION['user'];

        // Check if user has 'admin' role
        $isAdmin = $userModel->hasRole($user['id'], 'admin');

        if (!$isAdmin) {
            http_response_code(403);
            echo "<h1>403 - Forbidden</h1><p>You do not have permission to access this page.</p>";
            exit;
        }

        // ✅ Render admin view
        $this->view('admin', [
            'pageTitle' => 'Admin Dashboard',
            'user' => $user
        ]);
    }

        public function roles()
        {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if (!isset($_SESSION['user'])) {
                header('Location: ' . BASE_URL . 'index.php?url=signin');
                exit;
            }

            require_once __DIR__ . '/../models/User.php';
            require_once __DIR__ . '/../models/Role.php';
            $userModel = new User();
            $roleModel = new Role();
            $user = $_SESSION['user'];

            // Only allow admins
            if (!$userModel->hasRole($user['id'], 'admin')) {
                http_response_code(403);
                echo "<h1>403 - Forbidden</h1><p>You do not have permission to access this page.</p>";
                exit;
            }

            $roles = $roleModel->getAll();

            $this->view('roles', [
                'pageTitle' => 'Roles Management',
                'user' => $user,
                'roles' => $roles
            ]);
        }
}
