<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm giảng viên</title>
</head>

<body>
    <?php if (!empty($errors)): ?>
        <ul style="color: red; list-style: none;">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <h2>Thêm giảng viên </h2>
    <form action="" method="POST">
        Tên: <input type="text" name="name" placeholder="Nhập tên" required> <br>
        Email: <input type="text" name="email" required> <br>
        <button type="submit"> Send</button>

        <a href="index.php?controller=teachers">Back</a>



    </form>

</body>

</html>