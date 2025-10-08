<?php
require_once __DIR__ . '/../core/Database.php';

class User
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function createUser($username, $email, $password, $full_name = null)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, email, password_hash, full_name)
                VALUES (:username, :email, :password_hash, :full_name)";
        $stmt = $this->db->prepare($sql);

        try {
            $stmt->execute([
                ':username' => $username,
                ':email' => $email,
                ':password_hash' => $hashedPassword,
                ':full_name' => $full_name
            ]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function findByEmailOrUsername($identifier)
    {
        $sql = "SELECT * FROM users WHERE email = :identifier OR username = :identifier";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':identifier' => $identifier]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyUser($identifier, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :identifier OR username = :identifier";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':identifier' => $identifier]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password_hash'])) {
            return $user; // Return user data on success
        }

        return false; // Invalid credentials
    }

    public function assignRole($userId, $roleId)
    {
        $sql = "INSERT INTO user_roles (user_id, role_id)
                VALUES (:user_id, :role_id)
                ON CONFLICT (user_id, role_id) DO NOTHING";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':user_id' => $userId, ':role_id' => $roleId]);
    }

    public function getUserRoles($userId)
    {
        $sql = "SELECT r.* FROM roles r
                INNER JOIN user_roles ur ON r.id = ur.role_id
                WHERE ur.user_id = :user_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hasRole($userId, $roleName)
    {
        $sql = "SELECT COUNT(*) FROM roles r
                INNER JOIN user_roles ur ON r.id = ur.role_id
                WHERE ur.user_id = :user_id AND r.name = :role_name";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId, ':role_name' => $roleName]);
        return $stmt->fetchColumn() > 0;
    }
}
