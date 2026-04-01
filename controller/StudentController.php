<?php
// nạp lớp Model
require_once 'model/Student.php';

// controller điều phối giữa request, model và view
class StudentController {
    private $studentModel;

    public function __construct() {
        // khởi tạo model sinh viên
        $this->studentModel = new Student();
    }

    public function list() {
        // đọc từ query string keyword (tìm kiếm tên sinh viên)
        $keyword = $_GET['keyword'] ?? '';

        if (!empty($keyword)) {
            // nếu có keyword thì tìm theo tên
            $students = $this->studentModel->searchByName($keyword);
        } else {
            // nếu không thì lấy toàn bộ danh sách
            $students = $this->studentModel->getAll();
        }

        // hiển thị view danh sách
        include 'view/student_list.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // xử lý form submit
            $name = trim($_POST['name']);
            $major = trim($_POST['major']);

            // validate dữ liệu
            if (strlen($name) < 3 || empty($major)) {
                $error = "Tên ≥ 3 ký tự và ngành học không được trống!";
                include 'view/student_form.php';
                return;
            }

            // thêm mới vào model
            $this->studentModel->add($name, $major);

            // chuyển hướng về danh sách sau khi thêm
            header("Location: index.php?action=list");
        } else {
            // hiển thị form thêm mới
            include 'view/student_form.php';
        }
    }

    public function delete($id) {
        // xóa sinh viên theo id
        $this->studentModel->delete($id);

        // quay về list
        header("Location: index.php?action=list");
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // xử lý cập nhật từ form
            $name = trim($_POST['name']);
            $major = trim($_POST['major']);

            // validate dữ liệu
            if (strlen($name) < 3 || empty($major)) {
                $error = "Tên ≥ 3 ký tự và ngành học không được trống!";
                $student = $this->studentModel->getById($id);
                include 'view/student_form.php';
                return;
            }

            // cập nhật model
            $this->studentModel->update($id, $name, $major);

            // quay lại danh sách
            header("Location: index.php?action=list");
        } else {
            // hiển thị form edit với dữ liệu hiện tại
            $student = $this->studentModel->getById($id);
            include 'view/student_form.php';
        }
    }
}
