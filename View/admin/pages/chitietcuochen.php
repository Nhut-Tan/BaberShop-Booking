<div class="container mt-4">
    <h2 class="text-center">Chi Tiết Cuộc Hẹn</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã cuộc hẹn</th>
                <th>Tên KH</th>
                <th>Dịch vụ</th>
                <th>Thời gian bắt đầu</th>
                <th>Thời gian kết thúc</th>
                <th>Nhân viên</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo '#' . htmlspecialchars($cuocHen['mach']); ?></td>
                <td><?php echo htmlspecialchars($cuocHen['tenkh']); ?></td>
                <td><?php echo htmlspecialchars($cuocHen['dichvudat']); ?></td>
                <td><?php echo htmlspecialchars($cuocHen['giobd']); ?></td>
                <td><?php echo htmlspecialchars($cuocHen['giokt']); ?></td>
                <td><?php echo htmlspecialchars($cuocHen['tennv']); ?></td>
            </tr>
        </tbody>
    </table>
    <div class="text-right">
    <a href="index.php?controller=dscuochen" class="btn btn-secondary">Trở Về</a>
</div>
</div>

