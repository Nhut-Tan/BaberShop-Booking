  <!-- Phần Slideshow -->

 
<div class="slideshow-container">
    <div class="slides">
      <div class="mySlides">
        <img src="Public/user/HinhAnhThuoc/nhung-kieu-toc-cua-hieuthuhai-tang-luc-hut-kho-cuong-cho-ban-1.png" style="width:100%">
      </div>
      <div class="mySlides">
        <img src="Public/user/HinhAnhThuoc/nhung-kieu-toc-cua-hieuthuhai-tang-luc-hut-kho-cuong-cho-ban-2.png" style="width:100%">
      </div>
      <div class="mySlides">
        <img src="Public/user/HinhAnhThuoc/nhung-kieu-toc-cua-hieuthuhai-tang-luc-hut-kho-cuong-cho-ban-3.png" style="width:100%">
      </div>
      <div class="mySlides">
        <img src="Public/user/HinhAnhThuoc/nhung-kieu-toc-cua-hieuthuhai-tang-luc-hut-kho-cuong-cho-ban-4.png" style="width:100%">
      </div>
      <div class="mySlides">
        <img src="Public/user/HinhAnhThuoc/nhung-kieu-toc-cua-hieuthuhai-tang-luc-hut-kho-cuong-cho-ban-5.png" style="width:100%">
      </div>
    </div>
    <div class="dot-container">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
  </div>
  </div> 
 <?php
require_once 'Model/Dichvu.php';
require_once 'Model/Tintuckhuyenmai.php';
// Lấy danh sách dịch vụ từ cơ sở dữ liệu
$dichvus = Dichvu::layDanhSachDichVu();
// Lấy danh sách tin tức khuyến mãi từ cơ sở dữ liệu
$tinTucs = Tintuckhuyenmai::layDanhSachTinTuc();
?>
 <div id="dichvu" class="container py-5">
    <h2 class="text-center">Dịch Vụ Của Chúng Tôi</h2>
    <div class="row mt-4">
        <?php if (!empty($dichvus)): ?>
            <?php foreach ($dichvus as $dichvu): ?>
                <div class="col-md-4">
                    <div class="service-box text-center p-3 border rounded">
                        <img src="Public/user/hinhdv/<?= $dichvu['hinh'] ?>" alt="<?= $dichvu['tendv'] ?>" class="img-fluid mb-3" style="height: 150px; object-fit: cover;">
                        <h4><?= $dichvu['tendv'] ?></h4>
                        <p><?= $dichvu['mota'] ?></p>
                        <p><strong>Giá:</strong> <?= number_format($dichvu['gia'], 0, ',', '.') ?> VNĐ</p>
                        <p><strong>Thời gian:</strong> <?= $dichvu['thoiluong'] ?> phút</p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Hiện chưa có dịch vụ nào.</p>
        <?php endif; ?>
    </div>
</div>

<div id="khuyenmai" class="container py-5">
    <h2 class="text-center">Tin Tức Khuyến Mãi</h2>
    <div class="row mt-4">
        <?php if (!empty($tinTucs)): ?>
            <?php foreach ($tinTucs as $tin): ?>
                <div class="col-md-4">
                    <div class="promotion-box text-center p-3 border rounded">
                        <img src="Public/user/hinhkm/<?= $tin['hinhanh'] ?>" alt="<?= $tin['tieude'] ?>" class="img-fluid mb-3" style="height: 150px; object-fit: cover;">
                        <h4><?= $tin['tieude'] ?></h4>
                        <p><?= substr($tin['noidung'], 0, 100) ?>...</p>
                        <a href="index.php?controller=hienthitintuc&id=<?= $tin['matintuc'] ?>" class="btn btn-primary mt-2">Xem Chi Tiết</a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Hiện chưa có tin tức khuyến mãi nào.</p>
        <?php endif; ?>
    </div>
</div>


  <script>
 document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault(); // Ngừng sự kiện mặc định (không tải lại trang)

        // Lấy phần tử mà chúng ta muốn cuộn đến
        const targetElement = document.querySelector(this.getAttribute('href'));

        // Hàm cuộn mượt mà với tốc độ tùy chỉnh
        smoothScroll(targetElement);
    });
});

function smoothScroll(target) {
    const startPosition = window.scrollY || document.documentElement.scrollTop;
    const targetPosition = target.offsetTop;
    const offset = 70; // Điều chỉnh khoảng cách offset
    const distance = targetPosition - startPosition - offset;
    const duration = 100;

    let startTime = null;

    // Kiểm tra hướng cuộn (lên hoặc xuống)
    const scrollDirection = distance > 0 ? 'down' : 'up'; // Nếu distance dương => cuộn xuống, nếu âm => cuộn lên

    function animation(currentTime) {
        if (startTime === null) startTime = currentTime;
        const timeElapsed = currentTime - startTime;
        const run = easeInOut(timeElapsed, startPosition, distance, duration);
        window.scrollTo(0, run);

        // Nếu cuộn lên (scrolling up), điều chỉnh để cuộn cao hơn một chút
        if (scrollDirection === 'up' && timeElapsed < duration / 2) {
            window.scrollTo(0, run - 20); // Điều chỉnh offset khi cuộn lên (thêm 20px khi cuộn lên)
        }

        if (timeElapsed < duration) {
            requestAnimationFrame(animation);
        }
    }

    function easeInOut(t, b, c, d) {
        let time = t / (d / 2);
        if (time < 1) return (c / 2) * time * time + b;
        time--;
        return (-c / 2) * (time * (time - 2) - 1) + b;
    }

    requestAnimationFrame(animation);
}


  </script>



  <script>
    let slideIndex = 0;
    const slides = document.querySelector('.slides');
    const dots = document.getElementsByClassName('dot');

    function showSlides() {
      slideIndex++;
      if (slideIndex >= dots.length) { slideIndex = 0; }
      updateSlidePosition();
      setTimeout(showSlides, 2000); // Tự động chuyển slide sau mỗi 2 giây
    }

    function currentSlide(n) {
      slideIndex = n - 1;
      updateSlidePosition();
    }

    function updateSlidePosition() {
      slides.style.transform = `translateX(-${slideIndex * 100}vw)`;
      for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove("active");
      }
      dots[slideIndex].classList.add("active");
    }

    showSlides(); // Bắt đầu trình chiếu
  </script>