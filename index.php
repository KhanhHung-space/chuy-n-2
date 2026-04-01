<?php
// nạp lớp Controller để xử lý luồng điều khiển (MVC)
require_once 'controller/StudentController.php';

// xác định hành động từ query string (?action=...)
// nếu không có action thì mặc định hiển thị danh sách
$action = $_GET['action'] ?? 'list';

// khởi tạo controller
$controller = new StudentController();

// điều hướng hành động sang phương thức phù hợp của controller
switch ($action) {
    case 'list':
        // hiển thị danh sách sinh viên
        $controller->list();
        break;
    case 'add':
        // thêm mới sinh viên
        $controller->add();
        break;
    case 'delete':
        // xóa theo id nếu id tồn tại trong query string
        if (isset($_GET['id'])) {
            $controller->delete($_GET['id']);
        }
        break;
    case 'edit':
        // sửa thông tin sinh viên theo id
        if (isset($_GET['id'])) {
            $controller->edit($_GET['id']);
        }
        break;
    default:
        // nếu action không hợp lệ, chuyển về danh sách
        $controller->list();
}
