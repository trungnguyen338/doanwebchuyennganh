<?php
require_once("app/models/Teacher.php");
class TeacherController
{
    private $teacherModel;
    public function __construct()
    {
        $this->teacherModel = new teacher();
        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=auth&action=login');
            exit;
        }
    }
    public function index()
    {
        $teacher = $this->teacherModel->getAll();
        include("app/Views/teachers/index.php");
    }
    public function create()
    {

        if ($_SESSION['user']['role'] !== 'teacher') {
            die("Bạn không có quyền thêm học sinh!");
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $errors = [];
            if (empty($errors) && $this->teacherModel->existsByEmail($email)) {
                $errors[] = "Email này đã tồn tại trong hệ thống";
            }

            // 3️⃣ Nếu có lỗi → hiện lại form
            if (!empty($errors)) {
                include "app/views/teachers/create.php";
                return;
            }

            $this->teacherModel->create($name, $email);
            header("Location:index.php?controller=teachers");
        } else {
            include("app/Views/teachers/create.php");
        }
    }
    public function edit($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $this->teacherModel->edit($id, $name, $email);
            header("Location:index.php?controller=teachers");
        } else {
            $teachers = $this->teacherModel->getById($id);
            include("app/Views/teachers/edit.php");
        }
    }
    public function delete($id)
    {
        if ($this->teacherModel->delete($id)) {
            header("Location:index.php?controller=teachers");
        } else
            echo " Xoa khong thanh cong ";
    }
}
