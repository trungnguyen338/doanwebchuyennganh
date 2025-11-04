<?php
require_once 'app/models/User.php';

class AuthController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $userModel = new User();
            $user = $userModel->findByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'role' => $user['role']
                ];
                header('Location: index.php');
                exit;
            } else {
                echo "Sai tài khoản hoặc mật khẩu!";
            }
        } else {
            require 'app/Views/auth/login.php';
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: index.php');
    }
    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $role = $_POST['role'];

            if ($password !== $password_confirm) {
                echo "<p style='color:red'>Mật khẩu không khớp!</p>";
                return;
            }

            $userModel = new User();
            if ($userModel->findByUsername($username)) {
                echo "<p style='color:red'>Username đã tồn tại!</p>";
                return;
            }

            $hash = password_hash($password, PASSWORD_DEFAULT);
            $userModel->createUser($username, $hash, $role);

            echo "<p style='color:green'>Đăng ký thành công! <a href='index.php?controller=auth&action=login'>Đăng nhập ngay</a></p>";
            exit;
        }
        require 'app/Views/auth/register.php';
    }
}
