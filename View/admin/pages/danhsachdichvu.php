<div class="container mt-4">
    <h2 class="text-center">Danh Sách Dịch vụ</h2>

    <div class="d-flex justify-content-end mb-3">
        <a href="index.php?controller=themDichvu" class="btn btn-primary">Thêm Dịch Vụ</a>
        <a href="index.php" class="btn btn-secondary">Trở Về</a>
    </div>

    <?php if (!empty($dichvus)): ?>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Mã dịch vụ</th>
                    <th>Tên dịch vụ</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Thời lượng</th>
                    <th>Hình</th>
                    <th>Tác vụ</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($dichvus as $dichvu): ?>
                <tr>
                    <td><?= $dichvu['madv'] ?></td>
                    <td><?= $dichvu['tendv'] ?></td>
                    <td><?= $dichvu['mota'] ?></td>
                    <td><?= number_format($dichvu['gia'])." VND"?></td>
                    <td><?= $dichvu['thoiluong'] ?></td>
                    <td>
                        <img src="../../Public/user/hinhdv/<?= $dichvu['hinh'] ?>"  style="width: 50px; height: 50px; object-fit: cover;">
                    </td>
                    <td>
                        <a href="index.php?controller=suaDichvu&madv=<?= $dichvu['madv'] ?>" class="btn btn-warning btn-sm">Sửa</a>
                        <a href="index.php?controller=xoaDichvu&madv=<?= $dichvu['madv'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center text-muted">Hiện chưa có dịch vụ nào.</p>
    <?php endif; ?>
</div>
