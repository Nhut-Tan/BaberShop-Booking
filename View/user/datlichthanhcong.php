<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Lịch Thành Công</title>
    <!-- Liên kết tới Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .container {
            background: white;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4caf50;
        }
        .btn-custom {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            color: white;
            background-color: #4caf50;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-custom:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Đặt Lịch Thành Công!</h1>
        <p class="text-center">Cảm ơn bạn <b><?php echo htmlspecialchars($tenkh); ?></b> đã đặt lịch hẹn với chúng tôi.</p>
        <p class="text-center"><b>Vui lòng kiểm tra email để nhận mã cuộc hẹn</b></p>
        <p class="text-center"><b>Ngày giờ bắt đầu:</b> <?php echo htmlspecialchars($giobd); ?></p>
        <p class="text-center"><b>Giờ kết thúc dự kiến:</b> <?php echo htmlspecialchars($giokt); ?></p>
        <div class="text-center">
            <a href="index.php" class="btn btn-custom">Trở về Trang Chủ</a>
        </div>
    </div>

    <!-- Liên kết tới Bootstrap JS và jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
