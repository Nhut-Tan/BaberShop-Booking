<?php
require_once '../../Model/Dichvu.php';
class DichvuController {

    public static function hienThiFormThemDichvu() {
            $result = Dichvu::layloaiDichvu();
            include '../../View/admin/pages/formthemdichvu.php';
    }
    public static function hienThiDanhSachDichvu() {
        $dichvus = Dichvu::layDanhSachDichVu();
        include '../../View/admin/pages/danhsachdichvu.php';
    }

    public static function themDichvu() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'tendv' => $_POST['tendv'] ?? '',
                'mota' => $_POST['mota'] ?? '',
                'gia' => $_POST['gia'] ?? '',
                'thoiluong' => $_POST['thoiluong'] ?? '',
                'maloai' => $_POST['maloai'] ?? '',
            ];
            $file = $_FILES['hinh'] ?? null;

            $result = Dichvu::taoDichvu($data, $file);
            if ($result) {
                header("Location: index.php?controller=danhsachdichvu");
                exit;  
            } else {
                echo "<p class='text-danger text-center'>Có lỗi xảy ra khi thêm dịch vụ.</p>";
            }
            
        }
    }
     // Hàm xóa nhân viên
     public static function xoaDichVu() {
        if (isset($_GET['madv'])) {
            $madv = $_GET['madv'];
            $result = Dichvu::xoaDichvu($madv);  

            if ($result) {
                header("Location: index.php?controller=danhsachdichvu");
                exit; 
            } else {
                echo "<p class='text-danger text-center'>Có lỗi xảy ra khi xóa dịch vụ.</p>";
            }
        } else {
            echo "<p class='text-danger text-center'>Mã dịch vụ không hợp lệ.</p>";
        }
    }
    public static function hienThiFormSuaDichVu() {
        if (isset($_GET['madv'])) {
            $madv = $_GET['madv'];
            $dichvu = Dichvu::layDichVuTheoID($madv);  // Lấy thông tin nhân viên cần sửa
            $result = Dichvu::layloaiDichvu();
            include '../../View/admin/pages/formsuadichvu.php';  // Hiển thị form sửa
        } else {
            echo "<p class='text-danger'>Mã dịch vụ không hợp lệ.</p>";
        }
    }


    public static function suaDichVu() {
        if (isset($_GET['madv'])) {
            $madv = $_GET['madv']; 
            $data = [
                'tendv' => $_POST['tendv'] ?? '',
                'mota' => $_POST['mota'] ?? '',
                'gia' => $_POST['gia'] ?? '',
                'thoiluong' => $_POST['thoiluong'] ?? '',
                'maloai' => $_POST['maloai'] ?? '',
            ];
            $file = $_FILES['hinh'] ?? null;

            $result = Dichvu::updateDichvu($madv, $data, $file);

            if ($result) {
                header("Location: index.php?controller=danhsachdichvu");
                exit;
            } else {
                echo "<p class='text-danger text-center'>Có lỗi xảy ra khi sửa dịch vụ.</p>";
            }
        }
    }
}
?>
