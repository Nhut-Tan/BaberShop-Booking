<?php
require_once '../../Model/Tintuckhuyenmai.php';
class TintucController {

    // Hiển thị form thêm tin tức
    public static function hienThiFormThemTinTuc() {
        include '../../View/admin/pages/formthemtintuc.php'; // Hiển thị form thêm tin tức
    }

    // Hiển thị danh sách tin tức
    public static function hienThiDanhSachTinTuc() {
        $tintucs = Tintuckhuyenmai::layDanhSachTinTuc(); 
        include '../../View/admin/pages/danhsachtintuc.php'; // Gọi trang danh sách tin tức
    }

    // Thêm tin tức
    public static function themTintuc() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $data = [
                'tieude' => $_POST['tieude'] ?? '',
                'noidung' => $_POST['noidung'] ?? '',
                'maqt' => $_POST['maqt'] ?? '',
            ];
            $file = $_FILES['hinhanh'] ?? null;
    
            // Gọi phương thức thêm tin tức
            $result = Tintuckhuyenmai::taoTinTuc($data, $file);
    
            if ($result) {
                header("Location: index.php?controller=danhsachtintuc");
                exit; 
            } else {
                echo "<p class='text-danger text-center'>Có lỗi xảy ra khi thêm tin tức.</p>";
            }
        }
    }
    
    
    // Xóa tin tức
    public static function xoaTinTuc() {
        if (isset($_GET['matintuc'])) {
            $matintuc = $_GET['matintuc'];
            $result = Tintuckhuyenmai::xoaTinTuc($matintuc); 
    
            if ($result) {
                header("Location: index.php?controller=danhsachtintuc");
                exit; 
            } else {
                echo "<p class='text-danger text-center'>Có lỗi xảy ra khi xóa tin tức.</p>";
            }
        } else {
            echo "<p class='text-danger text-center'>Mã tin tức không hợp lệ.</p>";
        }
    }
    

    // Hiển thị form sửa tin tức
    public static function hienThiFormSuaTinTuc() {
        if (isset($_GET['matintuc'])) {
            $matintuc = $_GET['matintuc'];
            $tintuc = Tintuckhuyenmai::layTinTucTheoID($matintuc); // Lấy thông tin tin tức cần sửa
            include '../../View/admin/pages/formsuatintuc.php'; // Hiển thị form sửa tin tức
        } else {
            echo "<p class='text-danger'>Mã tin tức không hợp lệ.</p>";
        }
    }

    // Sửa tin tức
    public static function suaTinTuc() {
        if (isset($_GET['matintuc'])) {
            $matintuc = $_GET['matintuc']; // Lấy mã tin tức từ URL
            $data = [
                'tieude' => $_POST['tieude'] ?? '',
                'noidung' => $_POST['noidung'] ?? '',
            ];
            $file = $_FILES['hinhanh'] ?? null; // Lấy file hình ảnh từ form nếu có
            $result = Tintuckhuyenmai::capNhatTinTuc($matintuc, $data, $file);
            if ($result) {
                header("Location: index.php?controller=danhsachtintuc");
                exit;
            } else {
                echo "<p class='text-danger text-center'>Có lỗi xảy ra khi sửa tin tức.</p>";
            }
        } else {
            echo "<p class='text-danger text-center'>Mã tin tức không hợp lệ.</p>";
        }
    }
    
}
?>
