<?php
require_once 'Database.php'; 

class Nhanvien {
    // Hàm tạo nhân viên
    public static function taoNhanVien($data, $file) {
        $db = new Database();
        $db->connect();

        try {
            $conn = $db->getConnection();

            // Xử lý upload hình ảnh
            $hinh = '';
            if ($file && $file['error'] === UPLOAD_ERR_OK) {
                $targetDir = "../../Public/user/hinhnv/"; // Đường dẫn thư mục lưu ảnh
                $hinh = basename($file['name']);
                $targetFilePath = $targetDir . $hinh;

                // Di chuyển file từ tmp vào thư mục đích
                if (!move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                    throw new Exception("Không thể upload hình ảnh.");
                }
            }

            // Thêm nhân viên vào cơ sở dữ liệu
            $stmt = $conn->prepare("INSERT INTO nhanvien (ten, sdt, email, hinh, maqt) VALUES (:ten, :sdt, :email, :hinh, :maqt)");
            $stmt->bindParam(':ten', $data['ten']);
            $stmt->bindParam(':sdt', $data['sdt']);
            $stmt->bindParam(':email', $data['email']);
            $stmt->bindParam(':hinh', $hinh);
            $stmt->bindParam(':maqt', $data['maqt']);

            $stmt->execute();
            $result = $stmt->rowCount() > 0; // Kiểm tra có thêm thành công không

        } catch (Exception $e) {
            $result = false;
            error_log("Lỗi khi thêm nhân viên: " . $e->getMessage());
        }

        $db->closeDatabase();
        return $result;
    }

    // Hàm lấy thông tin một nhân viên theo mã nhân viên
    public static function layNhanVien($manv) {
        $db = new Database();
        $db->connect();

        try {
            $conn = $db->getConnection();
            $stmt = $conn->prepare("SELECT * FROM nhanvien WHERE manv = :manv");
            $stmt->bindParam(':manv', $manv, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy một nhân viên
        } catch (Exception $e) {
            $result = false;
            error_log("Lỗi khi lấy nhân viên: " . $e->getMessage());
        }

        $db->closeDatabase();
        return $result;
    }

    // Hàm lấy tất cả nhân viên từ cơ sở dữ liệu
    public static function layDanhSachNhanVien() {
        $db = new Database();
        $db->connect();

        try {
            $conn = $db->getConnection();
            $stmt = $conn->prepare("SELECT * FROM nhanvien");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lấy danh sách nhân viên
        } catch (Exception $e) {
            $result = false;
            error_log("Lỗi khi lấy danh sách nhân viên: " . $e->getMessage());
        }

        $db->closeDatabase();
        return $result;
    }

    // Hàm xóa nhân viên
    public static function xoaNhanVien($manv) {
        $db = new Database();
        $db->connect();

        try {
            $conn = $db->getConnection();

            // Lấy thông tin nhân viên để xóa hình ảnh nếu có
            $stmt = $conn->prepare("SELECT hinh FROM nhanvien WHERE manv = :manv");
            $stmt->bindParam(':manv', $manv, PDO::PARAM_INT);
            $stmt->execute();
            $nhanvien = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($nhanvien) {
                // Xóa hình ảnh nếu tồn tại
                $hinh = $nhanvien['hinh'];
                if ($hinh) {
                    $targetDir = "../../Public/user/hinhnv/";
                    $targetFilePath = $targetDir . $hinh;

                    if (file_exists($targetFilePath)) {
                        unlink($targetFilePath); // Xóa file ảnh
                    }
                }

                // Xóa nhân viên khỏi cơ sở dữ liệu
                $stmt = $conn->prepare("DELETE FROM nhanvien WHERE manv = :manv");
                $stmt->bindParam(':manv', $manv, PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->rowCount() > 0;
            } else {
                $result = false;
            }

        } catch (Exception $e) {
            $result = false;
            error_log("Lỗi khi xóa nhân viên: " . $e->getMessage());
        }

        $db->closeDatabase();
        return $result;
    }

    // Hàm sửa thông tin nhân viên
    public static function suaNhanVien($manv, $data, $file) {
        $db = new Database();
        $db->connect();

        try {
            $conn = $db->getConnection();

            // Lấy thông tin hiện tại của nhân viên
            $stmt = $conn->prepare("SELECT hinh FROM nhanvien WHERE manv = :manv");
            $stmt->bindParam(':manv', $manv, PDO::PARAM_INT);
            $stmt->execute();
            $nhanvien = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($nhanvien) {
                // Xử lý hình ảnh mới
                $hinh = $nhanvien['hinh'];
                if ($file && $file['error'] === UPLOAD_ERR_OK) {
                    $targetDir = "../../Public/user/hinhnv/";
                    $hinh = basename($file['name']);
                    $targetFilePath = $targetDir . $hinh;

                    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
                        // Xóa ảnh cũ
                        $oldFilePath = $targetDir . $nhanvien['hinh'];
                        if (file_exists($oldFilePath)) {
                            unlink($oldFilePath);
                        }
                    } else {
                        throw new Exception("Không thể upload hình ảnh.");
                    }
                }

                // Cập nhật thông tin nhân viên
                $stmt = $conn->prepare("UPDATE nhanvien SET ten = :ten, sdt = :sdt, email = :email, hinh = :hinh WHERE manv = :manv");
                $stmt->bindParam(':ten', $data['ten']);
                $stmt->bindParam(':sdt', $data['sdt']);
                $stmt->bindParam(':email', $data['email']);
                $stmt->bindParam(':hinh', $hinh);
                $stmt->bindParam(':manv', $manv, PDO::PARAM_INT);
                $stmt->execute();

                $result = $stmt->rowCount() > 0;
            } else {
                $result = false;
            }

        } catch (Exception $e) {
            $result = false;
            error_log("Lỗi khi sửa nhân viên: " . $e->getMessage());
        }

        $db->closeDatabase();
        return $result;
    }
}