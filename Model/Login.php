<?php
require_once('Database.php');

class Login extends Database
{
    public function getUser($username) {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();

        try {
            // Truy vấn để lấy thông tin người dùng theo username
            $sql = "SELECT maqt, tendn, matkhau FROM quantrivien WHERE tendn = :username";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            // Trả về kết quả là mảng liên kết, lấy 1 kết quả duy nhất
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Nếu không có kết quả, trả về null
            if (count($result) > 0) {
                return $result;
            } else {
                return null;
            }

        } catch (Exception $e) {
            // Log lỗi nếu có vấn đề
            error_log("Lỗi khi lấy thông tin người dùng: " . $e->getMessage());
            return null;
        }

        $db->closeDatabase();
    }
}
?>