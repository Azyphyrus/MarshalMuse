<?php
require_once __DIR__ . '/../core/Database.php';

class Role
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM roles ORDER BY name ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM roles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $description = '')
    {
        $sql = "INSERT INTO roles (id, name, description)
                VALUES (gen_random_uuid(), :name, :description)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':name' => $name, ':description' => $description]);
    }

    public function update($id, $name, $description = '')
    {
        $sql = "UPDATE roles SET name = :name, description = :description WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id, ':name' => $name, ':description' => $description]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM roles WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
