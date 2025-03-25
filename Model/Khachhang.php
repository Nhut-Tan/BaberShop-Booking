<?php
require_once 'Database.php';

class Khachhang {

    // Lấy thông tin khách hàng theo email
    public static function layKhachHangTheoEmail($emailkh) {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT * FROM khachhang WHERE emailkh = :emailkh");
            $stmt->bindParam(':emailkh', $emailkh, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Lỗi khi lấy khách hàng theo email: " . $e->getMessage());
            $result = null;
        }

        $db->closeDatabase();
        return $result;
    }

    // Thêm khách hàng mới
    public static function themKhachHang($tenkh, $sdt, $emailkh) {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("INSERT INTO khachhang (ten, sdt, emailkh) VALUES (:tenkh, :sdt, :emailkh)");
            $stmt->bindParam(':tenkh', $tenkh, PDO::PARAM_STR);
            $stmt->bindParam(':sdt', $sdt, PDO::PARAM_STR);
            $stmt->bindParam(':emailkh', $emailkh, PDO::PARAM_STR);
            $stmt->execute();
            $insert_id = $conn->lastInsertId();
        } catch (Exception $e) {
            error_log("Lỗi khi thêm khách hàng mới: " . $e->getMessage());
            $insert_id = null;
        }

        $db->closeDatabase();
        return $insert_id;
    }
}
?>