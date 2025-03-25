<?php
require_once 'Model/Tintuckhuyenmai.php';

// Lấy ID từ URL
$matintuc = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Lấy tin tức từ cơ sở dữ liệu
$tin = Tintuckhuyenmai::layTinTucTheoID($matintuc);
if (!$tin) {
    echo "Tin tức không tồn tại.";
    exit;
}
?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center"><?= $tin['tieude'] ?></h1>
            <img src="Public/user/hinhkm/<?= $tin['hinhanh'] ?>" alt="<?= $tin['tieude'] ?>" class="img-fluid mb-4">
            <p><?= nl2br($tin['noidung']) ?></p>
        </div>
    </div>
</div>
