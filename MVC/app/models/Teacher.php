<?php
require_once("core/Database.php");
class teacher
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }
    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM teachers");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * From teachers where id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($name, $email)
    {
        $stmt = $this->conn->prepare("INSERT INTO teachers(name,email) values(?,?)");
        return $stmt->execute([$name, $email]);
    }
    public function existsByEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM teachers WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetchColumn() > 0;
    }
    public function edit($id, $name, $email)
    {
        $stmt = $this->conn->prepare("UPDATE teachers set name =?,email =? where id =?");
        return $stmt->execute([$name, $email, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE from teachers where id =?");
        return $stmt->execute([$id]);
    }
}
