<?php
session_start(); 

include('../Model/Login.php'); 
$model = new Login();

// Kiểm tra nếu đã đăng nhập
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: ../View/admin/index.php');
    exit;
}

// Xử lý khi form đăng nhập được submit
if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $pass = trim($_POST['password']);
    $hashedPass = md5($pass); 

    // Kiểm tra nếu thông tin đăng nhập bị thiếu
    if (empty($username) || empty($pass)) {
        $_SESSION['error'] = "Vui lòng điền đầy đủ thông tin!";
        header("Location: ../index.php?controller=admin");
        exit;
    }

    // Lưu username vào session
    $_SESSION['username'] = $username;

    // Lấy thông tin user từ database
    $result = $model->getUser($username);

    // Kiểm tra kết quả
    if ($result) {
        $row = $result[0]; // Lấy kết quả đầu tiên
        // Kiểm tra mật khẩu
        if ($hashedPass === $row['matkhau']) {
            // Đăng nhập thành công
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;
            header('Location: ../View/admin/index.php');
            exit;
        } else {
            // Mật khẩu không đúng
            $_SESSION['error'] = "Bạn Đã Nhập Sai Mật Khẩu !!!";
            header("Location: ../index.php?controller=admin");
            exit();
        }
    } else {
        // Username không tồn tại
        $_SESSION['error'] = "Username Không Tồn Tại !";
        header("Location: ../index.php?controller=admin");
        exit(); 
    }
}
?>