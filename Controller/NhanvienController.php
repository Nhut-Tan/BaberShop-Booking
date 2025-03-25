<?php
require_once '../../Model/Nhanvien.php';
class NhanvienController {

    public static function hienThiFormThemNhanVien() {
            include '../../View/admin/pages/formthemnhanvien.php';  
    }
    public static function hienThiDanhSachNhanVien() {
        $nhanviens = Nhanvien::layDanhSachNhanVien();
        include '../../View/admin/pages/danhsachnhanvien.php';
    }

    public static function themNhanVien() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'ten' => $_POST['ten'] ?? '',
                'sdt' => $_POST['sdt'] ?? '',
                'email' => $_POST['email'] ?? '',
                'maqt' => $_POST['maqt'] ?? '',
            ];
            $file = $_FILES['hinh'] ?? null;

            $result = Nhanvien::taoNhanVien($data, $file);

            if ($result) {
                header("Location: index.php?controller=danhsachnhanvien");
                exit;  // Đảm bảo dừng lại sau khi chuyển hướng
            } else {
                echo "<p class='text-danger text-center'>Có lỗi xảy ra khi thêm nhân viên.</p>";
            }
            
        }
    }
     // Hàm xóa nhân viên
     public static function xoaNhanVien() {
        if (isset($_GET['manv'])) {
            $manv = $_GET['manv'];
            $result = Nhanvien::xoaNhanVien($manv);  // Gọi hàm xóa từ model

            if ($result) {
                header("Location: index.php?controller=danhsachnhanvien");
                exit;  // Đảm bảo dừng lại sau khi chuyển hướng
            } else {
                echo "<p class='text-danger text-center'>Có lỗi xảy ra khi xóa nhân viên.</p>";
            }
        } else {
            echo "<p class='text-danger text-center'>Mã nhân viên không hợp lệ.</p>";
        }
    }
    public static function hienThiFormSuaNhanVien() {
        if (isset($_GET['manv'])) {
            $manv = $_GET['manv'];
            $nhanvien = Nhanvien::layNhanVien($manv);  // Lấy thông tin nhân viên cần sửa
            include '../../View/admin/pages/formsuanhanvien.php';  // Hiển thị form sửa
        } else {
            echo "<p class='text-danger'>Mã nhân viên không hợp lệ.</p>";
        }
    }

    // Sửa nhân viên
    public static function suaNhanVien() {
        if (isset($_GET['manv'])) {
            $manv = $_GET['manv']; // Lấy mã nhân viên từ URL
            $data = [
                'ten' => $_POST['ten'] ?? '',
                'sdt' => $_POST['sdt'] ?? '',
                'email' => $_POST['email'] ?? '',
            ];
            $file = $_FILES['hinh'] ?? null;

            $result = Nhanvien::suaNhanVien($manv, $data, $file);

            if ($result) {
                header("Location: index.php?controller=danhsachnhanvien");
                exit;
            } else {
                echo "<p class='text-danger text-center'>Có lỗi xảy ra khi sửa nhân viên.</p>";
            }
        }
    }
}
?>
