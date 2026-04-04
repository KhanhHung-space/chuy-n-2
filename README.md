# Ứng dụng Quản lý Sinh viên

## Cách chạy
1. Copy thư mục `MVC_Sinhvien` vào thư mục `htdocs` của XAMPP.
   Ví dụ: C:\xampp\htdocs\MVC_Sinhvien
2. Khởi động Apache trong XAMPP.
3. Truy cập trình duyệt: http://localhost/MVC-Sinhvien/index.php?action=list
4. link code (do code nhiều tệp quá không up được lên git nên up lên drive): https://drive.google.com/drive/folders/1kYMNAJSLysrbJ3Iwq89ZWghT7UBKDe7A?usp=drive_link
## Các chức năng đã làm
- Hiển thị danh sách sinh viên (ID, Họ tên, Ngành học).
- Thêm sinh viên (form nhập, > 3 ky tu, nghanh hoc khong de trong).
- Xóa sinh viên theo ID.
- Sửa thông tin sinh viên (form có dữ liệu cũ).
- Routing đơn giản qua `index.php?action=...`.

## Phần nâng cao
- Lưu dữ liệu bằng SESSION (không dùng mảng cố định, dữ liệu không mất khi reload).
- Có thể mở rộng thêm chức năng tìm kiếm sinh viên theo tên.
- Có thể mở rộng thêm phân trang (5 sinh viên/trang).

## Ghi chú
- Code được viết theo mô hình MVC:
  - Model: `Student.php`
  - Controller: `StudentController.php`
  - View: `student_list.php`, `student_form.php`
- Validation cơ bản đã được xử lý trong Controller.
