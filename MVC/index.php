<?php
require_once "app/controllers/StudentController.php";
require_once("app/controllers/TeacherController.php");
require_once "app/controllers/AuthController.php";

$controllerName = $_GET["controller"] ?? 'student';
$action = $_GET["action"] ?? "index";
$id = $_GET['id'] ?? null;

if ($controllerName === 'teachers') {
    $controller = new TeacherController();
} elseif ($controllerName === 'auth') {
    $controller = new AuthController();
} else {
    $controller = new StudentController();
}



// Gọi action
if ($id !== null) {
    $controller->$action($id);
} else {
    $controller->$action();
}
