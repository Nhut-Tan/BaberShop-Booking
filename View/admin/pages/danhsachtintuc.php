<div class="container mt-4">
    <h2 class="text-center">Danh Sách Tin Tức Khuyến Mãi</h2>

    <div class="d-flex justify-content-end mb-3">
        <a href="index.php?controller=themTintuc" class="btn btn-primary">Thêm Tin Tức</a>
        <a href="index.php" class="btn btn-secondary">Trở Về</a>
    </div>

    <?php if (!empty($tintucs)): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hình Ảnh</th>
                    <th>Tiêu Đề</th>
                    <th>Nội Dung</th>
                    <th>Tác Vụ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tintucs as $index => $tin): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td>
                            <img src="../../Public/user/hinhkm/<?= $tin['hinhanh'] ?>" alt="<?= $tin['tieude'] ?>" 
                                 class="img-fluid" style="height: 100px; width: 150px; object-fit: cover;">
                        </td>
                        <td><?= htmlspecialchars($tin['tieude']) ?></td>
                        <td><?= htmlspecialchars(mb_substr($tin['noidung'], 0, 50)) ?>...</td>
                        <td>
                            <a href="index.php?controller=suaTintuc&matintuc=<?= $tin['matintuc'] ?>" 
                               class="btn btn-warning btn-sm">Sửa</a>
                            <a href="index.php?controller=xoaTintuc&matintuc=<?= $tin['matintuc'] ?>" 
                               class="btn btn-danger btn-sm" 
                               onclick="return confirm('Bạn có chắc chắn muốn xóa tin tức này?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center text-muted">Hiện chưa có tin tức khuyến mãi nào.</p>
    <?php endif; ?>
</div>
