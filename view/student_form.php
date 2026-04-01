<!DOCTYPE html>
<html>
<head>
    <title>Form Sinh viên</title>
    <meta charset="UTF-8">
    <!-- View: form thêm/sửa sinh viên -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f6f9;
        }
        .form-container {
            width: 700px; /* rộng hơn */
            margin: auto;
            padding: 30px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 20px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }
        .actions {
            margin-top: 30px;
            text-align: center;
        }
        button {
            padding: 12px 25px;
            font-size: 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        a {
            margin-left: 20px;
            font-size: 16px;
            text-decoration: none;
            color: #333;
        }
        .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2><?= isset($student) ? "Sửa sinh viên" : "Thêm sinh viên" ?></h2>

        <?php if (!empty($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>

        <form method="post">
            <label>Họ tên:</label>
            <input type="text" name="name" value="<?= isset($student) ? htmlspecialchars($student['name']) : '' ?>">

            <label>Ngành học:</label>
            <input type="text" name="major" value="<?= isset($student) ? htmlspecialchars($student['major']) : '' ?>">

            <div class="actions">
                <button type="submit"><?= isset($student) ? "Cập nhật" : "Thêm mới" ?></button>
                <a href="index.php?action=list">Quay lại danh sách</a>
            </div>
        </form>
    </div>
</body>
</html>
