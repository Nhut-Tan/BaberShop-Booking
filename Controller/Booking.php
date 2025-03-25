<?php
include ('../../Model/Cuochen.php');
class Booking{
     public static function getAllListBooking() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $result = Cuochen::layDsCuochen($page);    
        // Số hàng mỗi trang cố định
        $limit = 10;
        // Tính tổng số hàng trong bảng
        $totalRows = Cuochen::demSoCuochen();
        // Tính tổng số trang
        $totalPages = ceil($totalRows / $limit);
        require_once('../../View/admin/pages/listBooking.php');    
    }
    public static function getBookingByMach() {
        // Nhận mã cuộc hẹn từ yêu cầu GET
        $mach = isset($_GET['mach']) ? intval($_GET['mach']) : 0;
    
        // Kiểm tra mã cuộc hẹn có hợp lệ không
        if ($mach > 0) {
            $cuocHen = Cuochen::layCuochenTheoMach($mach);
    
            if ($cuocHen) {
                // Nếu tìm thấy cuộc hẹn, truyền dữ liệu vào view
                require_once ('../../View/admin/pages/chitietcuochen.php');
            } else {
                // Nếu không tìm thấy cuộc hẹn, truyền thông báo lỗi vào view
                $errorMessage = "Không tìm thấy cuộc hẹn với mã: " . htmlspecialchars($mach);
                require_once ('../../View/admin/pages/error.php'); // Chuyển hướng đến view error
            }
        } else {
            // Nếu mã cuộc hẹn không hợp lệ, truyền thông báo lỗi vào view
            $errorMessage = "Vui lòng nhập mã cuộc hẹn hợp lệ.";
            require_once ('../../View/admin/pages/error.php'); // Chuyển hướng đến view error
        }
    }
}
?>