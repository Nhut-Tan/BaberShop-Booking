<?php
class Logout {
    // Hàm xử lý đăng xuất
    public static function logout() {
        session_unset(); 
        session_destroy();
        // Chuyển hướng về trang đăng nhập với tham số controller=admin
        header("Location: ../../index.php?controller=admin");
        exit();
    }
}
?>
