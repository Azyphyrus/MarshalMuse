<?php

class RoleController extends Controller
{
    private $roleModel;

    public function __construct()
    {
        require_once '../app/models/Role.php';
        require_once '../app/models/User.php';
        $this->roleModel = new Role();
    }

    public function index()
    {
        // Ensure session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Check if logged in
        if (!isset($_SESSION['user'])) {
            header('Location: ' . BASE_URL . 'index.php?url=signin');
            exit;
        }

        // Admin-only
        $userModel = new User();
        $user = $_SESSION['user'];

        if (!$userModel->hasRole($user['id'], 'admin')) {
            http_response_code(403);
            echo "<h1>403 - Forbidden</h1><p>You do not have permission to access this page.</p>";
            exit;
        }

        // Fetch all roles
        $roles = $this->roleModel->getAll();
        $this->view('roles', [
            'roles' => $roles,
            'user' => $user,
            'pageTitle' => 'Roles Management'
        ]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name']);
            $description = trim($_POST['description'] ?? '');

            if (!empty($name)) {
                $this->roleModel->create($name, $description);
            }
        }

        header('Location: ' . BASE_URL . 'index.php?url=admin/roles');
        exit;
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = trim($_POST['name']);
            $description = trim($_POST['description'] ?? '');

            if (!empty($id) && !empty($name)) {
                $this->roleModel->update($id, $name, $description);
            }
        }

        header('Location: ' . BASE_URL . 'index.php?url=admin/roles');
        exit;
    }

    public function delete($id)
    {
        if (!empty($id)) {
            $this->roleModel->delete($id);
        }

        header('Location: ' . BASE_URL . 'index.php?url=admin/roles');
        exit;
    }

    public function assign()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'];
            $roleId = $_POST['role_id'];

            require_once '../app/models/User.php';
            $userModel = new User();

            $userModel->assignRole($userId, $roleId);
        }

        header('Location: ' . BASE_URL . 'index.php?url=admin/roles');
        exit;
    }
}
