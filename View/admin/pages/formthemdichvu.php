<div class="container mt-4">
    <h2 class="text-center">Thêm Dịch Vụ</h2>
    <form action="index.php?controller=themDichvu" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="tendv">Tên dịch vụ</label>
            <input type="text" class="form-control" name="tendv" required>
        </div>
        <div class="form-group">
            <label for="mota">Mô tả</label>
            <input type="text" class="form-control" name="mota" required>
        </div>
        <div class="form-group">
            <label for="gia">Giá</label>
            <input type="text" class="form-control" name="gia" required>
        </div>
        <div class="form-group">
            <label for="thoiluong">Thời lượng</label>
            <input type="text" class="form-control" name="thoiluong" required>
        </div>
        <div>
            <label for="maloai">Loại dịch vụ</label>
            <select name="maloai" >
                <?php
                if ($result) {
                    // Duyệt qua từng dòng dữ liệu
                    foreach ($result as $row) 
                    { 
                    ?>
                    <option value="<?php echo $row['maloai']?>"><?php echo $row['tenloai']?></option>
                    <?php
                    }   
            }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="hinh">Hình Ảnh</label>
            <input type="file" class="form-control-file" id="hinh" name="hinh" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm Dịch Vụ</button>
        <a href="index.php?controller=danhsachdichvu" class="btn btn-secondary">Hủy</a>
    </form>
</div>
