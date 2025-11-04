<!DOCTYPE html>
<html>

<head>
    <title>Danh sách giảng viên</title>

    <link rel="stylesheet" href="public/css/style.css">
</head>

<body>


    <h2>Danh sách giảng viên</h2>
    <?php include __DIR__ . '/../layouts/layout.php'; ?>
    <a href="index.php?controller=teachers&action=create">+ Thêm giảng viên</a>
    <a href="index.php?action=create">+ Thêm sinh viên</a>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Email</th>
            <th>Hành động</th>
        </tr>
        <?php foreach ($teacher as $teacher): ?>
            <tr>
                <td><?= $teacher['id'] ?></td>
                <td><?= $teacher['name'] ?></td>
                <td><?= $teacher['email'] ?></td>
                <td>
                    <a href="index.php?controller=teachers&action=edit&id=<?= $teacher['id'] ?>">Sửa</a> |
                    <a href="index.php?controller=teachers&action=delete&id=<?= $teacher['id'] ?>" onclick="return confirm('Xóa giảng viên này?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>


    <h2>Tìm giảng viên</h2>
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

            const res = await fetch(`index.php?controller=teachers&action=search&keyword=${encodeURIComponent(keyword)}`);
            const html = await res.text();
            suggestBox.innerHTML = html;
            suggestBox.style.display = 'block';
        });

        // Hàm chọn sinh viên trong danh sách
        function selectStudent(name) {
            searchBox.value = name;
            suggestBox.style.display = 'none';
        }
    </script>

</body>

</html>