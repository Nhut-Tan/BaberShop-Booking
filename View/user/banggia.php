<?php
require_once 'Model/Dichvu.php';
$dichvus = Dichvu::layDanhSachDichVu();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Giá</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0; /* Màu nền nhẹ */
        }
        #hinh {
            max-width: 30%; /* Kích thước tối đa của hình ảnh */
            max-height: 30%; /* Kích thước tối đa của hình ảnh */
            margin-left: 655px; /* Lệch sang phải bằng cách giảm margin-right */
        }
    </style>
</head>
<body>
 <div id="dichvu" class="container py-5">
    <h2 class="text-center">BẢNG GIÁ DỊCH VỤ</h2>
    <div class="row mt-4">
        <?php if (!empty($dichvus)): ?>
            <?php foreach ($dichvus as $dichvu): ?>
                <div class="col-md-4">
                    <div class="service-box text-center p-3 border rounded">
                        <img src="Public/user/hinhdv/<?= $dichvu['hinh'] ?>" alt="<?= $dichvu['tendv'] ?>" class="img-fluid mb-3" style="height: 150px; object-fit: cover;">
                        <h4><?= $dichvu['tendv'] ?></h4>
                        <p><?= $dichvu['mota'] ?></p>
                        <p><strong>Giá:</strong> <?= number_format($dichvu['gia'], 0, ',', '.') ?> VNĐ</p>
                        <p><strong>Thời gian:</strong> <?= $dichvu['thoiluong'] ?> phút</p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Hiện chưa có dịch vụ nào.</p>
        <?php endif; ?>
    </div>
</div>  
</body>
</html>
