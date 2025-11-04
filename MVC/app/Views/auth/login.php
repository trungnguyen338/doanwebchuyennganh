<form method="POST" action="index.php?controller=auth&action=login">
    <h2>Đăng nhập</h2>
    <input type="text" name="username" placeholder="Tên đăng nhập" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>
    <button type="submit">Đăng nhập</button>
</form>
<p>Chưa có tài khoản? <a href="index.php?controller=auth&action=register">Đăng ký</a></p>