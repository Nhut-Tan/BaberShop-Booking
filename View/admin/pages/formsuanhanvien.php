<?php
// Kiểm tra xem có biến $nhanvien hay không (lấy thông tin nhân viên từ Controller)
if (isset($nhanvien)) {
    $manv = $nhanvien['manv'];
    $ten = $nhanvien['ten'];
    $sdt = $nhanvien['sdt'];
    $email = $nhanvien['email'];
    $hinh = $nhanvien['hinh']; // Hình ảnh hiện tại của nhân viên
} else {
    echo "<p class='text-danger'>Nhân viên không tồn tại hoặc có lỗi xảy ra!</p>";
    exit;
}
?>

<div class="container mt-4">
    <h2 class="text-center">Sửa Nhân Viên</h2>
    <form action="index.php?controller=suaNhanVien&manv=<?= $manv ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="ten">Họ Tên</label>
            <input type="text" class="form-control" id="ten" name="ten" value="<?= $ten ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>" required>
        </div>
        <div class="form-group">
            <label for="sdt">Số Điện Thoại</label>
            <input type="text" class="form-control" id="sdt" name="sdt" value="<?= $sdt ?>" required>
        </div>
        <div class="form-group">
            <label for="hinh">Hình Ảnh (Nếu có)</label>
            <!-- Hiển thị hình ảnh cũ nếu có -->
            <?php if ($hinh): ?>
                <div>
                    <img src="../../Public/user/hinhnv/<?= $hinh ?>" alt="Hình ảnh cũ" width="100px">
                </div>
            <?php endif; ?>
            <input type="file" class="form-control-file" id="hinh" name="hinh">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật Nhân Viên</button>
        <a href="index.php?controller=danhsachnhanvien" class="btn btn-secondary">Hủy</a>
    </form>
</div>
