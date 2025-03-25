<!DOCTYPE html>
<html lang="en">

<head>
  <title>IRON CAP</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&display=swap"
    rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="Public/user/style.css">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="Public/user/css/ionicons.min.css">
  <link rel="stylesheet" href="Public/user/css/style.css">

</head>

<body>

   <!-- Phần điều hướng (Navbar) -->
   <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
  <div class="container-fluid">
    <div class="col-lg-3 col-sm-12">
        <a class="navbar-brand" style="color: aliceblue; font-size:2em;" href="#"><img width="50px" height="50px" src="Public/user/HinhAnhThuoc/images.jfif" alt="">IRONCAP</a>
        <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    </div>
   <div class="col-lg-9">
      <div class="collapse navbar-collapse justify-content-around" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
                    <a class="nav-link text-light" href="index.php">
                        <i class="bi bi-house-door"></i> Trang Chủ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#dichvu">
                        <i class="bi bi-gear"></i> Dịch Vụ
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#khuyenmai">
                        <i class="bi bi-tag"></i> Tin Tức Khuyến Mãi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="index.php?controller=hienthiformhuy">
                      <i class="bi bi-calendar-x"></i> Hủy Đặt Lịch
                    </a>
                </li>
                 <li class="nav-item">
                <a class="nav-link text-light" href="index.php?controller=hienbanggia">
                  <i class="bi bi-card-list"></i> Bảng Giá
                </a>
             </li>
          </ul>
          <form class="d-flex" method="POST" action="index.php?controller=hienthiformdatlich" onsubmit="return validatePhoneNumber()">
                  <input style="border-radius:15px; font-size: 20px; margin-top:6px;" class="form-control me-2" type="text" placeholder="Nhập Số Điện Thoại Để Đặt Lịch" aria-label="nhap so dt" name="sdt" id="sdt" value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : ''; ?>">
                  <button class="btn btn-outline-light" style="font-size: 17px; font-weight: bold; border-radius:15px;" type="submit">ĐẶT LỊCH</button>
            </form>
        </div>
   </div>
</div>
</nav>

  <script>

    function validatePhoneNumber() {
    const phoneNumber = document.getElementById('sdt').value;

    if (phoneNumber.length==0) {
      alert("Vui lòng nhập số điện thoại");
      return false;
    }
    // Kiểm tra độ dài tối đa 10 số
    if (phoneNumber.length != 10 ) {
      alert("Số điện thoại Sai ");
      return false;
    }

    // Kiểm tra xem số điện thoại chỉ chứa chữ số
    if (!/^\d*$/.test(phoneNumber)) {
      alert("Số điện thoại chỉ được chứa các chữ số!");
      return false;
    }

    return true;
  }
    // Lấy thanh menu
    const navbar = document.getElementById("navbar");

    // Lắng nghe sự kiện cuộn trang
    window.onscroll = function () {
      stickyNavbar();
    };

    // Thêm/loại bỏ lớp sticky khi cuộn trang
    function stickyNavbar() {
      if (window.pageYOffset > navbar.offsetTop) {
        navbar.classList.add("sticky");
      } else {
        navbar.classList.remove("sticky");
      }
    }
  </script>