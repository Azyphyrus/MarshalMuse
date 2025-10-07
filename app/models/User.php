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
}
