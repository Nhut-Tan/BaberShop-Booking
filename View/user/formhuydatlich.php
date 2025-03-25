<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hủy Cuộc Hẹn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header text-center text-black">
                        <h4>Hủy Cuộc Hẹn</h4>
                    </div>
                    <div class="card-body">
                                <?php 
                                    if (!empty($errors['general'])){
                                        ?>
                                         <span class="text-danger"><?= $errors['general'] ?></span>
                                        <?php
                                    }
                                ?>
                        <form action="index.php?controller=huydatlich" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="text" name="email" class="form-control" placeholder="Nhập email đã đặt" required>
                                <?php 
                                    if (!empty($errors['email'])){
                                        ?>
                                         <span class="text-danger"><?= $errors['email'] ?></span>
                                        <?php
                                    }
                                ?>

                            </div>
                            <div class="mb-3">
                                <label class="form-label">Mã cuộc hẹn:</label>
                                <input type="text" name="mach" class="form-control" placeholder="Nhập mã cuộc hẹn" required>
                                <?php 
                                    if (!empty($errors['mach'])){
                                        ?>
                                         <span class="text-danger"><?= $errors['mach'] ?></span>
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-danger">Hủy cuộc hẹn</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
