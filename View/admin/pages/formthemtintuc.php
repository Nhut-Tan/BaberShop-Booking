<div class="container mt-4">
    <h2 class="text-center">Thêm Tin Tức Khuyến Mãi</h2>
    <form action="index.php?controller=themTintuc" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tieude" class="form-label">Tiêu Đề</label>
                    <input type="text" class="form-control" id="tieude" name="tieude" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="hinhanh" class="form-label">Hình Ảnh</label>
                    <input type="file" class="form-control" id="hinhanh" name="hinhanh" accept="image/*" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="noidung" class="form-label">Nội Dung</label>
            <textarea class="form-control" id="noidung" name="noidung" rows="6" required></textarea>
        </div>
        <div class="mb-3">
          <input type="hidden" id="maqt" name="maqt" value="3">
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Thêm Tin Tức</button>
            <a href="index.php?controller=danhsachtintuc" class="btn btn-secondary ms-3">Hủy</a>
        </div>
    </form>
</div>
