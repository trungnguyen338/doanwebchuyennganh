<!DOCTYPE html>
<html>

<head>
    <title>Sửa sinh viên</title>
</head>

<body>
    <h2>Sửa sinh viên</h2>
    <form method="POST" action="">
        Tên: <input type="text" name="name" value="<?= $student['name'] ?>" required><br><br>
        Email: <input type="email" name="email" value="<?= $student['email'] ?>" required><br><br>
        <button type="submit">Cập nhật</button>
    </form>
    <a href="index.php">← Quay lại</a>
</body>

</html>