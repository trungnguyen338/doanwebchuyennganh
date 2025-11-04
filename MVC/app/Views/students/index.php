<!DOCTYPE html>
<html>

<head>
    <title>Danh sách sinh viên</title>

    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>
    <h2>Danh sách sinh viên</h2>
    <?php include __DIR__ . '/../layouts/layout.php'; ?>
    <a href="index.php?action=create">+ Thêm sinh viên</a>
    <table border="1" cellpadding="5" cellspacing="0">

        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student['id'] ?></td>
                <td><?= $student['name'] ?></td>
                <td><?= $student['email'] ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $student['id'] ?>">Sửa</a> |
                    <a href="index.php?action=delete&id=<?= $student['id'] ?>" onclick="return confirm('Xóa sinh viên này?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


    <h2>Tìm sinh viên</h2>
    <div style="position: relative; width: 300px;">
        <input type="text" id="searchBox" placeholder="Nhập tên hoặc email..."
            style="width: 100%; padding: 5px;">
        <div id="suggestBox"
            style="position: absolute; top: 35px; left: 0; width: 100%;
                background: white; border: 1px solid #ccc; display: none;
                max-height: 200px; overflow-y: auto; z-index: 10;"></div>
    </div>

    <script>
        const searchBox = document.getElementById('searchBox');
        const suggestBox = document.getElementById('suggestBox');

        searchBox.addEventListener('keyup', async () => {
            const keyword = searchBox.value.trim();

            if (keyword.length === 0) {
                suggestBox.style.display = 'none';
                suggestBox.innerHTML = '';
                return;
            }

            const res = await fetch(`index.php?action=search&keyword=${encodeURIComponent(keyword)}`);
            const html = await res.text();
            suggestBox.innerHTML = html;
            suggestBox.style.display = 'block';
        });
    </script>


</body>

</html>