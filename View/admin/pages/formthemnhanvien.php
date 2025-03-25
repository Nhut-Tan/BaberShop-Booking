<div class="container mt-4">
    <h2 class="text-center">Thêm Nhân Viên</h2>
    <form action="index.php?controller=themNhanVien" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="ten">Họ Tên</label>
            <input type="text" class="form-control" id="ten" name="ten" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="sdt">Số Điện Thoại</label>
            <input type="text" class="form-control" id="sdt" name="sdt" required>
        </div>
        <div class="form-group">
            <label for="hinh">Hình Ảnh</label>
            <input type="file" class="form-control-file" id="hinh" name="hinh" required>
        </div>
        <div class="mb-3">
          <input type="hidden" id="maqt" name="maqt" value="3">
        </div>
        <button type="submit" class="btn btn-primary">Thêm Nhân Viên</button>
        <a href="index.php?controller=danhsachnhanvien" class="btn btn-secondary">Hủy</a>
    </form>
</div>
