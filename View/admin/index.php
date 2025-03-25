<?php
ob_start();  // Bắt đầu đệm đầu ra
require('layouts/header.php');  
$controller = isset($_GET['controller']) ? $_GET['controller'] : '';
// Gọi controller phù hợp
switch ($controller) {
    case 'logout':
        require_once '../../Controller/Logout.php';
        Logout::logout();
        break;
    case 'dscuochen':
        require_once '../../Controller/Booking.php';
        Booking::getAllListBooking();  // Hiển thị danh sách nhân viên
        break;
    case 'danhsachnhanvien':
        // Gọi controller để lấy danh sách nhân viên
        require_once '../../Controller/NhanvienController.php';
        nhanvienController::hienThiDanhSachNhanVien();  // Hiển thị danh sách nhân viên
        break;

    case 'themNhanVien':
        require_once '../../Controller/NhanvienController.php';
        // Kiểm tra xem có phải là POST request không, nếu có thì xử lý thêm nhân viên
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            nhanvienController::themNhanVien();
        } else {
            // Hiển thị form thêm nhân viên
            nhanvienController::hienThiFormThemNhanVien(); 
        }
        break;
     case 'xoaNhanVien':
            require_once '../../Controller/NhanvienController.php';
            // Xử lý xóa nhân viên
            nhanvienController::xoaNhanVien();  // Gọi hàm xóa nhân viên từ controller
            break;
     case 'suaNhanVien':
                require_once '../../Controller/NhanvienController.php';
                // Xử lý sửa nhân viên
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    nhanvienController::suaNhanVien();  // Gọi hàm sửa nhân viên từ controller
                } else {
                    // Hiển thị form sửa nhân viên
                    nhanvienController::hienThiFormSuaNhanVien();  // Gọi hàm hiển thị form sửa nhân viên
                }
                break;
            // Các case cho TintucKhuyenmai
    case 'danhsachtintuc':
        require_once '../../Controller/TintucController.php';
        TintucController::hienThiDanhSachTinTuc();  
        break;

    case 'themTintuc':
        require_once '../../Controller/TintucController.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            TintucController::themTinTuc();
        } else {
            TintucController::hienThiFormThemTinTuc();  
        }
        break;

    case 'xoaTintuc':
        require_once '../../Controller/TintucController.php';
        TintucController::xoaTinTuc();  
        break;

    case 'suaTintuc':
        require_once '../../Controller/TintucController.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            TintucController:: suaTinTuc();  
        } else {
            TintucController::hienThiFormSuaTinTuc();  
        }
        break;
    case 'danhsachdichvu':
        require_once '../../Controller/DichvuController.php';
        DichvuController::hienThiDanhSachDichvu();  
        break;   
    case 'themDichvu':
        require_once '../../Controller/DichvuController.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            DichvuController::themDichvu();
        } else {
            DichvuController::hienThiFormThemDichvu();  
        }
        break;
    case 'suaDichvu':
        require_once '../../Controller/DichvuController.php';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            DichvuController:: suaDichVu();  
        } else {
            DichvuController::hienThiFormSuaDichVu();  
        }
        break;
    case 'xoaDichvu':
        require_once '../../Controller/DichvuController.php';
        DichvuController::xoaDichVu();  
        break;
    case 'timkiemcuochen':
        require_once '../../Controller/Booking.php';
        Booking::getBookingByMach();  // Gọi hàm tìm kiếm cuộc hẹn
        break;
    default:
        // Nếu không có controller hoặc controller không xác định, load trang chủ
        require('pages/home.php');  // Mặc định là hiển thị trang chủ
        break;
}
require('layouts/footer.php');  // Bao gồm footer chung
ob_end_flush();  // Kết thúc đệm đầu ra và gửi tất cả nội dung
?>
