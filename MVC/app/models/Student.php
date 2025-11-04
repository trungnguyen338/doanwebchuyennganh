<?php
/*
require_once "core/Database.php";

class Student
{
    private $conn;
    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * FROM students");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $email)
    {
        $stmt = $this->conn->prepare("INSERT INTO students (name, email) VALUES (?, ?)");
        return $stmt->execute([$name, $email]);
    }

    public function update($id, $name, $email)
    {
        $stmt = $this->conn->prepare("UPDATE students SET name = ?, email = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $id]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM students WHERE id = ?");
        return $stmt->execute([$id]);
    }
        
}
    */

require_once("core/Database.php");
class Student
{
    private $conn;
    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }
    public function getAll()
    {
        $stmt = $this->conn->prepare("SELECT * From students");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * from students where id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create($name, $email)
    {
        $stmt = $this->conn->prepare("INSERT INTO students (name,email) values(?,?)");
        return  $stmt->execute([$name, $email]);
    }
    public function update($id, $name, $email)
    {
        $stmt = $this->conn->prepare("UPDATE students set name = ? , email = ? where id = ?");
        return $stmt->execute([$name, $email, $id]);
    }
    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE from students where id =?");
        return $stmt->execute([$id]);
    }
    public function search($keyword)
    {
        $stmt = $this->conn->prepare("
        SELECT * FROM students 
        WHERE name LIKE ? OR email LIKE ? 
        LIMIT 5");
        $searchterm = "%$keyword%";
        $stmt->execute([$searchterm, $searchterm]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
