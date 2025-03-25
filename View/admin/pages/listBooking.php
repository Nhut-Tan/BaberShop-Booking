<div class="container mt-4">
    <h2 class="text-center">Danh Sách Cuộc Hẹn</h2>
      <div class="container mt-4">
        <h5>Tìm kiếm cuộc hẹn</h5>
        <form method="GET" action="index.php">
            <input type="hidden" name="controller" value="timkiemcuochen">
            <div class="input-group mb-5">
                <input type="text" name="mach" class="form-control" placeholder="Nhập mã cuộc hẹn">
                <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </div>
        </form>
    </div>
   <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã cuộc hẹn</th>
                <th>Tên KH</th>
                <th>Dịch vụ</th>
                <th>Thời gian bắt đầu</th>
                <th>Nhân viên</th>
                <th>Tình trạng</th>
            </tr>
        </thead>
         <tbody>
            <?php if (!empty($result)) { ?>
                <?php foreach ($result as $arr) { ?>
                    <tr>
                        <td><?php echo '#' . $arr['mach']; ?></td>
                        <td><?php echo $arr['tenkh']; ?></td>
                        <td><?php echo $arr['dichvudat']; ?></td>
                        <td><?php echo $arr['giobd']; ?></td>
                        <td><?php echo $arr['tennv']; ?></td>
                        <td>
                            <?php 
                                if($arr['huy']==0)
                                    echo "<p class='text-success text-center'>Đã đặt</p>";
                                else
                                    echo "<p class='text-danger text-center'>Đã hủy</p>";
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            <?php } else { ?>
                <tr>
                    <td colspan="5" class="text-center">Không có dữ liệu</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Hiển thị phân trang -->
    <div class="pagination justify-content-end">
        <nav>
            <ul class="pagination justify-content-center">
                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="?controller=dscuochen&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
    </div>
</div>
