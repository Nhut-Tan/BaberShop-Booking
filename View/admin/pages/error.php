<div class="container mt-4">
    <h2 class="text-center">Lỗi</h2>
    <div class="alert alert-danger">
        <?php echo isset($errorMessage) ? $errorMessage : "Đã có lỗi xảy ra."; ?>
    </div>
    <div class="text-right">
        <a href="index.php?controller=dscuochen" class="btn btn-secondary">Trở Về</a>
    </div>
</div>
