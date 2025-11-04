<!DOCTYPE html>
<html>

<head>
    <title>Sửa giảng viên</title>
</head>

<body>
    <h2>Sửa giảng viên</h2>
    <form method="POST" action="">
        Tên: <input type="text" name="name" value="<?= $teachers['name'] ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $teachers['email'] ?>" required><br><br>
        <button type="submit">Cập nhật</button>
    </form>
    <a href="index.php?controller=teachers">← Quay lại</a>
</body>

</html>