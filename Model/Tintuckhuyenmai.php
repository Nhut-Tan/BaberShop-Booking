<?php
require_once 'Database.php';

class Tintuckhuyenmai {
    // Lấy danh sách tất cả tin tức khuyến mãi
    public static function layDanhSachTinTuc() {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT * FROM tintuckhuyenmai ORDER BY ngaydang DESC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về danh sách tin tức dưới dạng mảng liên kết
        } catch (Exception $e) {
            error_log("Lỗi khi lấy danh sách tin tức: " . $e->getMessage());
            $result = [];
        }

        $db->closeDatabase();
        return $result;
    }

    // Lấy một tin tức khuyến mãi theo ID
    public static function layTinTucTheoID($matintuc) {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT * FROM tintuckhuyenmai WHERE matintuc = :matintuc");
            $stmt->bindParam(':matintuc', $matintuc, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Trả về thông tin tin tức
        } catch (Exception $e) {
            error_log("Lỗi khi lấy tin tức theo ID: " . $e->getMessage());
            $result = null;
        }

        $db->closeDatabase();
        return $result;
    }

    // Thêm tin tức khuyến mãi
    public static function taoTinTuc($data, $file) {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();

        try {
            $hinh = '';
            if ($file && $file['error'] === UPLOAD_ERR_OK) {
                $targetDir = "../../Public/user/hinhkm/";
                $hinh = basename($file['name']);
                $targetFilePath = $targetDir . $hinh;

                if (!move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                    throw new Exception("Không thể upload hình ảnh.");
                }
            }

            $stmt = $conn->prepare("INSERT INTO tintuckhuyenmai (tieude, noidung, hinhanh, maqt) VALUES (:tieude, :noidung, :hinhanh, :maqt)");
            $stmt->bindParam(':tieude', $data['tieude'], PDO::PARAM_STR);
            $stmt->bindParam(':noidung', $data['noidung'], PDO::PARAM_STR);
            $stmt->bindParam(':hinhanh', $hinh, PDO::PARAM_STR);
            $stmt->bindParam(':maqt', $data['maqt'], PDO::PARAM_STR);
            $stmt->execute();

            $result = $stmt->rowCount() > 0;
        } catch (Exception $e) {
            error_log("Lỗi khi thêm tin tức: " . $e->getMessage());
            $result = false;
        }

        $db->closeDatabase();
        return $result;
    }

    // Cập nhật tin tức khuyến mãi
    public static function capNhatTinTuc($matintuc, $data, $file) {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT hinhanh FROM tintuckhuyenmai WHERE matintuc = :matintuc");
            $stmt->bindParam(':matintuc', $matintuc, PDO::PARAM_INT);
            $stmt->execute();
            $tintuc = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($tintuc) {
                $hinhanh = $tintuc['hinhanh'];
                if ($file && $file['error'] === UPLOAD_ERR_OK) {
                    $targetDir = "../../Public/user/hinhkm/";
                    $hinhanh = basename($file['name']);
                    $targetFilePath = $targetDir . $hinhanh;

                    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                        if ($tintuc['hinhanh']) {
                            $oldFilePath = $targetDir . $tintuc['hinhanh'];
                            if (file_exists($oldFilePath)) {
                                unlink($oldFilePath);
                            }
                        }
                    } else {
                        throw new Exception("Không thể upload hình ảnh.");
                    }
                }

                $stmt = $conn->prepare("UPDATE tintuckhuyenmai SET tieude = :tieude, noidung = :noidung, hinhanh = :hinhanh WHERE matintuc = :matintuc");
                $stmt->bindParam(':tieude', $data['tieude'], PDO::PARAM_STR);
                $stmt->bindParam(':noidung', $data['noidung'], PDO::PARAM_STR);
                $stmt->bindParam(':hinhanh', $hinhanh, PDO::PARAM_STR);
                $stmt->bindParam(':matintuc', $matintuc, PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->rowCount() > 0;
            } else {
                $result = false;
            }
        } catch (Exception $e) {
            error_log("Lỗi khi cập nhật tin tức: " . $e->getMessage());
            $result = false;
        }

        $db->closeDatabase();
        return $result;
    }

    // Xóa tin tức khuyến mãi
    public static function xoaTinTuc($matintuc) {
        $db = new Database();
        $db->connect();
        $conn = $db->getConnection();

        try {
            $stmt = $conn->prepare("SELECT hinhanh FROM tintuckhuyenmai WHERE matintuc = :matintuc");
            $stmt->bindParam(':matintuc', $matintuc, PDO::PARAM_INT);
            $stmt->execute();
            $tintuc = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($tintuc) {
                if ($tintuc['hinhanh']) {
                    $targetDir = "../../Public/user/hinhkm/";
                    $targetFilePath = $targetDir . $tintuc['hinhanh'];

                    if (file_exists($targetFilePath)) {
                        unlink($targetFilePath);
                    }
                }

                $stmt = $conn->prepare("DELETE FROM tintuckhuyenmai WHERE matintuc = :matintuc");
                $stmt->bindParam(':matintuc', $matintuc, PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->rowCount() > 0;
            } else {
                $result = false;
            }
        } catch (Exception $e) {
            error_log("Lỗi khi xóa tin tức: " . $e->getMessage());
            $result = false;
        }

        $db->closeDatabase();
        return $result;
    }
}
?>