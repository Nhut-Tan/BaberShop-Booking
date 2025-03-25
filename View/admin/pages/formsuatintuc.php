<?php
// Kiểm tra xem có biến $tintuc hay không (lấy thông tin tin tức từ Controller)
if (isset($tintuc)) {
    $matintuc = $tintuc['matintuc'];
    $tieude = $tintuc['tieude'];
    $noidung = $tintuc['noidung'];
    $hinhanh = $tintuc['hinhanh']; // Hình ảnh hiện tại của tin tức
} else {
    echo "<p class='text-danger'>Tin tức không tồn tại hoặc có lỗi xảy ra!</p>";
    exit;
}
?>

<div class="container mt-4">
    <h2 class="text-center">Sửa Tin Tức</h2>
    <form action="index.php?controller=suaTintuc&matintuc=<?= $matintuc ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="tieude">Tiêu Đề</label>
            <input type="text" class="form-control" id="tieude" name="tieude" value="<?= $tieude ?>" required>
        </div>
        <div class="form-group">
            <label for="noidung">Nội Dung</label>
            <textarea class="form-control" id="noidung" name="noidung" rows="5" required><?= $noidung ?></textarea>
        </div>
        <div class="form-group">
            <label for="hinhanh">Hình Ảnh (Nếu có)</label>
            <!-- Hiển thị hình ảnh cũ nếu có -->
            <?php if ($hinhanh): ?>
                <div>
                    <img src="../../Public/user/hinhkm/<?= $hinhanh ?>" alt="Hình ảnh cũ" width="150px">
                </div>
            <?php endif; ?>
            <input type="file" class="form-control-file" id="hinhanh" name="hinhanh">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật Tin Tức</button>
        <a href="index.php?controller=danhsachtintuc" class="btn btn-secondary">Hủy</a>
    </form>
</div>
