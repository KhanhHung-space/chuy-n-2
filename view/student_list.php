<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
    <meta charset="UTF-8">
    <!-- View: hiển thị bảng sinh viên, form tìm kiếm, và hành động Sửa/Xóa -->
    <style>
        body { font-family: Arial; margin: 40px; background-color: #f4f6f9; }
        .container { width: 900px; margin: auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { text-align: center; margin-bottom: 20px; }
        form { text-align: center; margin-bottom: 20px; }
        input[type="text"] { padding: 8px; width: 250px; }
        button { padding: 8px 15px; }
        a.add-btn { display: inline-block; margin-bottom: 15px; padding: 10px 20px; background-color: #28a745; color: white; text-decoration: none; border-radius: 5px; }
        a.add-btn:hover { background-color: #218838; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: center; }
        th { background-color: #007bff; color: white; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .action-links a { margin: 0 5px; text-decoration: none; color: #007bff; font-weight: bold; }
        .action-links a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Danh sách sinh viên</h2>

        <form method="get" action="index.php">
            <input type="hidden" name="action" value="list">
            <input type="text" name="keyword" placeholder="Nhập tên sinh viên..." value="<?= isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : '' ?>">
            <button type="submit">Tìm kiếm</button>
        </form>

        <a href="index.php?action=add" class="add-btn">+ Thêm sinh viên</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Ngành học</th>
                <th>Hành động</th>
            </tr>
            <?php if (!empty($students)): ?>
                <?php foreach ($students as $s): ?>
                    <tr>
                        <td><?= $s['id'] ?></td>
                        <td><?= htmlspecialchars($s['name']) ?></td>
                        <td><?= htmlspecialchars($s['major']) ?></td>
                        <td class="action-links">
                            <a href="index.php?action=edit&id=<?= $s['id'] ?>">Sửa</a> |
                            <a href="index.php?action=delete&id=<?= $s['id'] ?>" onclick="return confirm('Xóa sinh viên này?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4">Không có sinh viên nào.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>
