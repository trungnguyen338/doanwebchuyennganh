<!DOCTYPE html>
<html>

<head>
    <title>Đăng ký</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <h2>Đăng ký</h2>
    <form method="POST">
        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Nhập lại Password:</label><br>
        <input type="password" name="password_confirm" required><br><br>

        <label>Role:</label><br>
        <select name="role" required>
            <option value="student">Học sinh</option>
            <option value="teacher">Giáo viên</option>
        </select><br><br>

        <button type="submit">Đăng ký</button>
    </form>
    <p>Đã có tài khoản? <a href="index.php?controller=auth&action=login">Đăng nhập</a></p>
</body>

</html>