<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/style.css">
    <title>Document</title>
</head>

<body>

    <nav>
        <?php if (isset($_SESSION['user'])): ?>
            <span>Xin chào, <?= $_SESSION['user']['role'] ?></span>
            <a href="index.php?controller=auth&action=logout">Đăng xuất</a>
        <?php else: ?>
            <a href="index.php?controller=auth&action=login">Đăng nhập</a>
        <?php endif; ?>
    </nav>
    <br>
    <br>


    <a class="btn" href="index.php?controller=students&action=index">Sinh viên</a>

    <a class="btn" href="index.php?controller=teachers&action=index">Giáo viên</a>
    <br>

</body>

</html>