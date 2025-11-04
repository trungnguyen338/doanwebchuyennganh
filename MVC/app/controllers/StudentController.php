<?php
require_once  "app/models/Student.php";

class StudentController
{
    private $studentModel;

    public function __construct()
    {
        $this->studentModel = new Student();
        session_start();
    }

    public function index()
    {
        $students = $this->studentModel->getAll();
        echo json_encode([
            "success" => true,
            "data" => $students
        ], JSON_UNESCAPED_UNICODE);
        // include "app/views/students/index.php";
    }

    // public function create()
    // {
    //     if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //         $name = $_POST["name"];
    //         $email = $_POST["email"];
    //         $this->studentModel->create($name, $email);
    //         header("Location: index.php");
    //     } else {
    //         include  "app/views/students/create.php";
    //     }
    // }
    public function create()
    {
        // session_start();
        // if (!isset($_SESSION['user'])) {
        //     header('Location: index.php?controller=auth&action=login');
        //     exit;
        // }
        // if ($_SESSION['user']['role'] !== 'teacher') {
        //     die("Bạn không có quyền thêm học sinh!");    
        // }
        header('Content-Type: application/json; charset=utf-8');

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $input = json_decode(file_get_contents('php://input', JSON_UNESCAPED_UNICODE), true);
            $name = $input['name'] ?? null;
            $email = $input['email'] ?? null;

            if ($name && $email) {
                $this->studentModel->create($name, $email);
                echo json_encode(["success" => true, "message" => "Thêm sinh viên thành công!"]);
            } else {
                echo json_encode(["success" => false, "message" => "Tên và email không được để trống!"]);
            }
        }
    }


    public function edit($id)
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $input = json_decode(file_get_contents('php://input', JSON_UNESCAPED_UNICODE), true);
            $name = $input["name"] ?? null;
            $email = $input["email"] ?? null;

            if ($name && $email) {
                $this->studentModel->update($id, $name, $email);
                echo json_encode(["success" => true, "message" => "Thêm sinh viên thành công!"]);
            } else {
                echo json_encode(["success" => false, "message" => "Tên và email không được để trống!"]);
            }
            header("Location: index.php");
        } else {
            $student = $this->studentModel->getById($id);
            include "app/views/students/edit.php";
        }
    }

    public function delete($id)
    {
        $this->studentModel->delete($id);
        header("Location: index.php");
    }
    public function search()
    {
        if (isset($_GET['keyword'])) {
            $keyword = $_GET['keyword'];
            $students = $this->studentModel->search($keyword);
            include "app/views/students/search.php";
        } else {
            include "app/views/students/search.php";
        }
    }
}
