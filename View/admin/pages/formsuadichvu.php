<?php
if (isset($dichvu)) {
   $madv=$dichvu['madv'];
   $tendv=$dichvu['tendv'];
   $mota=$dichvu['mota'];
   $gia=$dichvu['gia'];
   $thoiluong=$dichvu['thoiluong'];
   $maloai=$dichvu['maloai'];
    $hinh = $dichvu['hinh']; // Hình ảnh hiện tại của nhân viên
} else {
    echo "<p class='text-danger'>Nhân viên không tồn tại hoặc có lỗi xảy ra!</p>";
    exit;
}
?>
<div class="container mt-4">
    <h2 class="text-center">Sửa Dịch Vụ</h2>
    <form action="index.php?controller=suaDichvu&madv=<?= $madv ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="tendv">Tên dịch vụ</label>
            <input type="text" class="form-control" name="tendv" value="<?= $tendv ?>" required>
        </div>
        <div class="form-group">
            <label for="mota">Mô tả</label>
            <input type="text" class="form-control" name="mota" value="<?= $mota ?>" required>
        </div>
        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="text" class="form-control" name="gia" value="<?= $gia ?>" required>
        </div>
        <div class="form-group">
            <label for="thoiluong">Thời lượng</label>
            <input type="text" class="form-control" name="thoiluong" value="<?= $thoiluong ?>" required>
        </div>
        <div>
            <label for="maloai">Loại dịch vụ</label>
            <select name="maloai" >
            <?php
                foreach ($result as $row) {
                    $selected = $row['maloai'] == $maloai ? 'selected' : '';
                    echo "<option value='{$row['maloai']}' $selected>{$row['tenloai']}</option>";
                }
            ?>
            </select>
        </div>
        <div class="form-group">
            <label for="hinh">Hình Ảnh (Nếu có)</label>
            <!-- Hiển thị hình ảnh cũ nếu có -->
            <?php if ($hinh): ?>
                <div>
                    <img src="../../Public/user/hinhdv/<?= $hinh ?>" alt="Hình ảnh cũ" width="100px">
                </div>
            <?php endif; ?>
            <input type="file" class="form-control-file" id="hinh" name="hinh">
        </div>
        <button type="submit" class="btn btn-primary">Sửa Dịch Vụ</button>
        <a href="index.php?controller=danhsachdichvu" class="btn btn-secondary">Hủy</a>
    </form>
</div>
