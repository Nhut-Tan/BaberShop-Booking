<?php
require_once 'Database.php';  // Giả sử bạn có lớp Database để kết nối cơ sở dữ liệu

class Dichvudat {

    // Thêm dịch vụ vào cuộc hẹn
    public static function themDichVuVaoCuocHen($mach, $madv) {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();

        try {
            // Kiểm tra xem dịch vụ này đã được thêm vào cuộc hẹn chưa
            $stmt = $conn->prepare("SELECT COUNT(*) FROM dichvudat WHERE mach = :mach AND madv = :madv");
            $stmt->bindParam(':mach', $mach, PDO::PARAM_INT);
            $stmt->bindParam(':madv', $madv, PDO::PARAM_INT);
            $stmt->execute();
            $count = $stmt->fetchColumn();

            if ($count == 0) {
                // Nếu dịch vụ chưa tồn tại, thêm vào bảng dichvudat
                $stmt = $conn->prepare("INSERT INTO dichvudat (mach, madv) VALUES (:mach, :madv)");
                $stmt->bindParam(':mach', $mach, PDO::PARAM_INT);
                $stmt->bindParam(':madv', $madv, PDO::PARAM_INT);
                $stmt->execute();
            }
        } catch (Exception $e) {
            error_log("Lỗi khi thêm dịch vụ vào cuộc hẹn: " . $e->getMessage());
        }

        $db->closeDatabase();
    }

    // Lấy danh sách dịch vụ của một cuộc hẹn
    public static function layDichVuCuaCuocHen($mach) {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("
                SELECT d.tendv, d.mota, d.gia, d.thoiluong 
                FROM dichvudat dv 
                JOIN dichvu d ON dv.madv = d.madv
                WHERE dv.mach = :mach
            ");
            $stmt->bindParam(':mach', $mach, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Lỗi khi lấy danh sách dịch vụ của cuộc hẹn: " . $e->getMessage());
            $result = [];
        }

        $db->closeDatabase();
        return $result;
    }

    // Xóa dịch vụ khỏi cuộc hẹn
    public static function xoaDichVuKhoiCuocHen($mach, $madv) {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("DELETE FROM dichvudat WHERE mach = :mach AND madv = :madv");
            $stmt->bindParam(':mach', $mach, PDO::PARAM_INT);
            $stmt->bindParam(':madv', $madv, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            error_log("Lỗi khi xóa dịch vụ khỏi cuộc hẹn: " . $e->getMessage());
        }

        $db->closeDatabase();
    }
}
?>