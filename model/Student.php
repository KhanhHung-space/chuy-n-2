<?php
// model quản lý dữ liệu sinh viên dùng session (mô phỏng DB tạm thời)
class Student {
    private $students;

    public function __construct() {
        // khởi tạo session nếu chưa có
        if (!isset($_SESSION)) session_start();

        // dữ liệu mẫu ban đầu nếu chưa có trong session
        if (!isset($_SESSION['students'])) {
            $_SESSION['students'] = [
                ['id' => 1, 'name' => 'Nguyễn Văn A', 'major' => 'CNTT'],
                ['id' => 2, 'name' => 'Trần Thị B', 'major' => 'Kinh tế']
            ];
        }

        // liên kết biến cục bộ với session để thay đổi tự động lưu
        $this->students = &$_SESSION['students'];
    }

    // lấy tất cả sinh viên
    public function getAll() {
        return $this->students;
    }

    // lấy sinh viên theo id
    public function getById($id) {
        foreach ($this->students as $s) {
            if ($s['id'] == $id) return $s;
        }
        return null;
    }

    // thêm sinh viên mới
    public function add($name, $major) {
        $id = count($this->students) > 0 ? max(array_column($this->students, 'id')) + 1 : 1;
        $this->students[] = ['id' => $id, 'name' => $name, 'major' => $major];
    }

    // xóa sinh viên theo id
    public function delete($id) {
        foreach ($this->students as $key => $s) {
            if ($s['id'] == $id) {
                unset($this->students[$key]);
            }
        }
    }

    // cập nhật sinh viên theo id
    public function update($id, $name, $major) {
        foreach ($this->students as &$s) {
            if ($s['id'] == $id) {
                $s['name'] = $name;
                $s['major'] = $major;
            }
        }
    }

    // tìm kiếm sinh viên theo tên (không phân biệt hoa thường)
    public function searchByName($keyword) {
        $result = [];
        foreach ($this->students as $s) {
            if (stripos($s['name'], $keyword) !== false) {
                $result[] = $s;
            }
        }
        return $result;
    }
}
