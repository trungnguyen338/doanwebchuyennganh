<?php
require_once 'core/Database.php';

class User
{
    private $db;

    public function __construct()
    {
        $db = new Database();
        $this->db = $db->connect();
    }

    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function createUser($username, $hash, $role, $ref_id = 1)
    {
        $stmt = $this->db->prepare("INSERT INTO users (username, password, role, ref_id) VALUES (:u, :p, :r, :ref)");
        $stmt->bindParam(':u', $username);
        $stmt->bindParam(':p', $hash);
        $stmt->bindParam(':r', $role);
        $stmt->bindParam(':ref', $ref_id);
        return $stmt->execute();
    }
}
