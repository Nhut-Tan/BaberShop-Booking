<?php
require_once 'Database.php'; 
class Dichvu {
   public static function layDanhSachDichVu() {
        $db = new Database();
        $db->connect(); 
        $conn = $db->getConnection();

        $stmt = $conn->prepare("SELECT * FROM dichvu");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
        $db->closeDatabase(); 
        return $result;
    }

    public static function layDichVuTheoID($madv) {
        $db = new Database();
        $db->connect(); 
        $conn = $db->getConnection(); 

        $stmt = $conn->prepare("SELECT * FROM dichvu WHERE madv = :madv");
        $stmt->bindParam(':madv', $madv, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC); 

        $db->closeDatabase(); 
        return $result;
    }
    public static function layLoaiDichVu() {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM loaidichvu");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $db->closeDatabase();
        return $result;
    }

    public static function taoDichVu($data, $file) {
        $db = new Database();
        $db->connect();
       
        try {
            $conn = $db->getConnection();
            $conn->beginTransaction();

            $hinh = '';
            if ($file && $file['error'] === UPLOAD_ERR_OK) {
                $targetDir = "../../Public/user/hinhdv/";
                $hinh = basename($file['name']);
                $targetFilePath = $targetDir . $hinh;

                if (!move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                    throw new Exception("Không thể upload hình ảnh.");
                }
            }

            $stmt = $conn->prepare("INSERT INTO dichvu (tendv, mota, gia, thoiluong, maloai, hinh) VALUES (:tendv, :mota, :gia, :thoiluong, :maloai, :hinh)");
            $stmt->execute([
                ':tendv' => $data['tendv'],
                ':mota' => $data['mota'],
                ':gia' => $data['gia'],
                ':thoiluong' => $data['thoiluong'],
                ':maloai' => $data['maloai'],
                ':hinh' => $hinh
            ]);

            $conn->commit();
            $result = true;
        } catch (Exception $e) {
            $conn->rollBack();
            $result = false;
            error_log("Lỗi khi thêm dịch vụ: " . $e->getMessage());
        }

        $db->closeDatabase();
        return $result;
    }

    public static function updateDichVu($madv, $data, $file) {
        $db = new Database();
        $db->connect();

        try {
            $conn = $db->getConnection();
            $conn->beginTransaction();

            $stmt = $conn->prepare("SELECT hinh FROM dichvu WHERE madv = :madv");
            $stmt->execute([':madv' => $madv]);
            $dichvu = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dichvu) {
                $hinhanh = $dichvu['hinh'];
                if ($file && $file['error'] === UPLOAD_ERR_OK) {
                    $targetDir = "../../Public/user/hinhdv/";
                    $hinhanh = basename($file['name']);
                    $targetFilePath = $targetDir . $hinhanh;

                    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                        if ($dichvu['hinh']) {
                            $oldFilePath = $targetDir . $dichvu['hinh'];
                            if (file_exists($oldFilePath)) {
                                unlink($oldFilePath);
                            }
                        }
                    } else {
                        throw new Exception("Không thể upload hình ảnh.");
                    }
                }

                $stmt = $conn->prepare("UPDATE dichvu SET tendv = :tendv, mota = :mota, gia = :gia, thoiluong = :thoiluong, maloai = :maloai, hinh = :hinh WHERE madv = :madv");
                $stmt->execute([
                    ':tendv' => $data['tendv'],
                    ':mota' => $data['mota'],
                    ':gia' => $data['gia'],
                    ':thoiluong' => $data['thoiluong'],
                    ':maloai' => $data['maloai'],
                    ':hinh' => $hinhanh,
                    ':madv' => $madv
                ]);

                $conn->commit();
                $result = true;
            } else {
                $result = false;
            }
        } catch (Exception $e) {
            $conn->rollBack();
            $result = false;
            error_log("Lỗi khi sửa dịch vụ: " . $e->getMessage());
        }

        $db->closeDatabase();
        return $result;
    }

    public static function xoaDichVu($madv) {
        $db = new Database();
        $db->connect();

        try {
            $conn = $db->getConnection();
            $conn->beginTransaction();

            $stmt = $conn->prepare("SELECT hinh FROM dichvu WHERE madv = :madv");
            $stmt->execute([':madv' => $madv]);
            $dichvu = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($dichvu) {
                $hinh = $dichvu['hinh'];
                if ($hinh) {
                    $targetDir = "../../Public/user/hinhdv/";
                    $targetFilePath = $targetDir . $hinh;

                    if (file_exists($targetFilePath)) {
                        unlink($targetFilePath);
                    }
                }

                $stmt = $conn->prepare("DELETE FROM dichvu WHERE madv = :madv");
                $stmt->execute([':madv' => $madv]);

                $conn->commit();
                $result = true;
            } else {
                $result = false;
            }
        } catch (Exception $e) {
            $conn->rollBack();
            $result = false;
            error_log("Lỗi khi xóa dịch vụ: " . $e->getMessage());
        }

        $db->closeDatabase();
        return $result;
    }
}
?>

