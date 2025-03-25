<?php
// Kết nối tới cơ sở dữ liệu và lấy danh sách nhân viên và dịch vụ
require_once 'Model/Dichvu.php';
require_once 'Model/Nhanvien.php';

// Lấy danh sách dịch vụ từ database
$dichvus = Dichvu::layDanhSachDichVu();
// Lấy danh sách nhân viên từ database
$nhanviens = Nhanvien::layDanhSachNhanVien();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Cuộc Hẹn</title>
    <!-- Liên kết tới Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 0 auto;
        }

        /* Bảng thời gian */
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
            cursor: pointer;
        }

        td.disabled {
            background-color: #f5f5f5;
            color: #aaa;
            cursor: not-allowed;
        }

        td.selected {
            background-color: #007bff;
            color: #fff;
        }

        .service-option {
        display: flex;
        align-items: center;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px;
        margin-bottom: 10px;
        cursor: pointer;
        transition: background-color 0.3s, border-color 0.3s;
    }

    .service-option:hover {
        background-color: #f9f9f9;
        border-color: #007bff;
    }

    .service-option input {
        display: none; /* Ẩn checkbox */
    }

    .service-option img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 5px;
        margin-right: 15px;
    }

    .service-option.checked {
        background-color: #007bff;
        border-color: #007bff;
        color: #fff;
    }

    .service-option label {
        margin: 0;
        font-size: 16px;
    }
    .form-group {
        margin-bottom: 20px;
    }

    .nhanvien-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .nhanvien-item {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 10px;
        display: flex;
        align-items: center;
        width: calc(33.33% - 10px); /* 3 cột */
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .nhanvien-item input {
        display: none;
    }

    .nhanvien-item img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
        margin-right: 10px;
    }

    .nhanvien-item:hover {
        background-color: #f0f0f0;
    }

    .nhanvien-item input:checked + label {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }
    
    </style>
</head>
<body>
<div class="container">
        <div class="form-container">
            <form action="index.php?controller=datlichhen" method="POST" onsubmit="return validateForm()">
                <h1 class="text-center mb-4">Đặt Cuộc Hẹn</h1>

                <!-- Thông tin khách hàng -->
                <div class="form-group">
                    <label for="tenkh">Tên Khách Hàng:</label>
                    <input type="text" class="form-control" id="tenkh" name="tenkh">
                    <small class="error-message" id="tenkh-error" style="color: red;"></small>
                </div>

                <div class="form-group">
                    <label for="sdt">Số Điện Thoại:</label>
                    <input type="text" class="form-control" id="sdt" name="sdt" value="<?php echo isset($_POST['sdt']) ? $_POST['sdt'] : ''; ?>" required>
                    <small class="error-message" id="sdt-error" style="color: red;"></small>
                </div>

                <div class="form-group">
                    <label for="emailkh">Email:</label>
                    <input type="email" class="form-control" id="emailkh" name="emailkh">
                    <small class="error-message" id="emailkh-error" style="color: red;"></small>
                </div>

                <!-- Chọn nhân viên -->
                <div class="form-group">
                    <label for="manv">Chọn Nhân Viên:</label>
                    <div class="nhanvien-container">
                        <?php foreach ($nhanviens as $nhanvien): ?>
                        <div class="nhanvien-item">
                            <input type="radio" name="manv" id="nhanvien-<?= $nhanvien['manv'] ?>" value="<?= $nhanvien['manv'] ?>">
                            <label for="nhanvien-<?= $nhanvien['manv'] ?>" style="width: 100%; display: flex; align-items: center;">
                                <img src="Public/user/hinhnv/<?= $nhanvien['hinh'] ?>" alt="<?= $nhanvien['ten'] ?>">
                                <span><?= $nhanvien['ten'] ?></span>
                            </label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <small class="error-message" id="manv-error" style="color: red;"></small>
                </div>
                <!-- Chọn dịch vụ -->
                <div class="form-group">
                <label for="dichvu">Chọn Dịch Vụ:</label><br>
                     <?php foreach ($dichvus as $dichvu): ?>
                        <div class="service-option" onclick="toggleCheckbox(this)">
                          <input type="checkbox" name="dichvu[]" value="<?= $dichvu['madv'] ?>" data-thoiluong="<?= $dichvu['thoiluong'] ?>"> <!-- Thêm thuộc tính thời lượng -->
                          <img src="Public/user/hinhdv/<?= $dichvu['hinh'] ?>" alt="<?= $dichvu['tendv'] ?>" style="width: 50px; height: 50px; margin-right: 10px;">
                         <label><?= $dichvu['tendv'] ?><br><small>(Thời gian: <?= $dichvu['thoiluong'] ?> phút)</small></label>
                </div>
                     <?php endforeach; ?>
                     <small class="error-message" id="dichvu-error" style="color: red;"></small>
               </div>
                <!-- Chọn ngày -->
                <div class="form-group">
                    <label for="ngay">Chọn Ngày:</label>
                    <input type="date" class="form-control" id="ngay" name="ngay">
                    <small class="error-message" id="ngay-error" style="color: red;"></small>
                </div>

                <!-- Chọn giờ -->
                <div class="form-group">
                    <label for="gio">Chọn Giờ:</label>
                    <table id="timeTable" class="table table-bordered">
                        <!-- Thời gian sẽ được tạo động -->
                    </table>
                    <small class="error-message" id="gio-error" style="color: red;"></small>
                </div>

                <!-- Input ẩn để lưu giá trị datetime -->
                <input type="hidden" id="giobd" name="giobd">

                <button type="submit" class="btn btn-primary btn-block">Đặt Cuộc Hẹn</button>
            </form>
        </div>
    </div>
    <!-- Liên kết tới Bootstrap JS (và jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
          function validateForm() {
            let isValid = true;

            // Lấy các phần tử cần kiểm tra
            const tenkh = document.getElementById("tenkh");
            const sdt = document.getElementById("sdt");
            const emailkh = document.getElementById("emailkh");
            const manv = document.querySelector("input[name='manv']:checked");
            const dichvu = document.querySelectorAll("input[name='dichvu[]']:checked");
            const ngay = document.getElementById("ngay");
            const giobd = document.getElementById("giobd");

            // Xóa thông báo lỗi cũ
            document.querySelectorAll(".error-message").forEach(msg => msg.textContent = "");

            // Kiểm tra tên khách hàng
            if (tenkh.value.trim() === "") {
                document.getElementById("tenkh-error").textContent = "Tên khách hàng không được để trống.";
                isValid = false;
                tenkh.scrollIntoView();
            }

            // Kiểm tra số điện thoại
            if (!/^\d{10}$/.test(sdt.value.trim())) {
                document.getElementById("sdt-error").textContent = "Số điện thoại phải là 10 chữ số.";
                isValid = false;
                sdt.scrollIntoView();
            }

            // Kiểm tra email
            if (!/\S+@\S+\.\S+/.test(emailkh.value.trim())) {
                document.getElementById("emailkh-error").textContent = "Email không hợp lệ.";
                isValid = false;
                emailkh.scrollIntoView();
            }

            // Kiểm tra nhân viên
            if (!manv) {
                document.getElementById("manv-error").textContent = "Vui lòng chọn một nhân viên.";
                isValid = false;
                document.querySelector(".nhanvien-container").scrollIntoView();
            }

            // Kiểm tra dịch vụ
            if (dichvu.length === 0) {
                document.getElementById("dichvu-error").textContent = "Vui lòng chọn ít nhất một dịch vụ.";
                isValid = false;
                document.querySelector(".service-option").scrollIntoView();
            }

            // Kiểm tra ngày
            if (!ngay.value) {
                document.getElementById("ngay-error").textContent = "Vui lòng chọn ngày.";
                isValid = false;
                ngay.scrollIntoView();
            }

            // Kiểm tra giờ bắt đầu
            if (!giobd.value) {
                document.getElementById("gio-error").textContent = "Vui lòng chọn giờ.";
                isValid = false;
                giobd.scrollIntoView();
            }

            return isValid; // Trả về true nếu form hợp lệ
        }

        function toggleCheckbox(element) {
    const checkbox = element.querySelector('input[type="checkbox"]');
    checkbox.checked = !checkbox.checked;

    // Thêm hoặc xóa lớp CSS `checked` dựa trên trạng thái của checkbox
    if (checkbox.checked) {
        element.classList.add('checked');
    } else {
        element.classList.remove('checked');
    }

    // Gọi hàm tính thời gian kết thúc (nếu cần)
    calculateEndTime();
}

        // Đặt ngày tối thiểu là hôm nay
        const hours = ["07:00", "08:00", "09:00", "10:00", "11:00", "12:00", 
                       "13:00", "14:00", "15:00", "16:00", "17:00", "18:00", 
                       "19:00", "20:00", "21:00"];

        const ngayInput = document.getElementById('ngay');
        const gioInput = document.getElementById('giobd');
        const timeTable = document.getElementById('timeTable');

        let selectedHour = null; // Lưu giờ được chọn

        // Tạo bảng thời gian
        function renderTimeTable() {
            timeTable.innerHTML = ''; // Reset bảng
            const selectedDate = new Date(ngayInput.value);
            const now = new Date();
            let row;

            hours.forEach((hour, index) => {
                const [h, m] = hour.split(':');
                const isToday = selectedDate.toDateString() === now.toDateString();
                const isPast = isToday && parseInt(h) <= now.getHours();

                // Bắt đầu dòng mới
                if (index % 4 === 0) {
                    row = document.createElement('tr');
                    timeTable.appendChild(row);
                }

                // Tạo ô
                const cell = document.createElement('td');
                cell.textContent = hour;

                // Vô hiệu hóa giờ trong quá khứ
                if (isPast) {
                    cell.classList.add('disabled');
                } else {
                    cell.addEventListener('click', () => selectTime(cell, hour));
                }

                row.appendChild(cell);
            });
        }

        // Chọn thời gian
        function selectTime(cell, hour) {
            // Bỏ chọn tất cả ô
            document.querySelectorAll('#timeTable td').forEach(td => td.classList.remove('selected'));
            // Chọn ô hiện tại
            cell.classList.add('selected');
            // Lưu giờ được chọn
            selectedHour = hour;
            updateDateTime();
        }

        // Cập nhật giá trị datetime
        function updateDateTime() {
            const selectedDate = ngayInput.value;
            if (selectedDate && selectedHour) {
                gioInput.value = `${selectedDate} ${selectedHour}:00`; // Gộp ngày và giờ
            }
        }

        // Cập nhật bảng giờ khi thay đổi ngày
        ngayInput.addEventListener('change', () => {
            selectedHour = null; // Xóa giờ đã chọn nếu thay đổi ngày
            updateDateTime();
            renderTimeTable();
        });

        // Đặt ngày tối thiểu là hôm nay
        const today = new Date().toISOString().split('T')[0];
        ngayInput.setAttribute('min', today);

        // Gọi lần đầu khi load trang
        ngayInput.value = today; // Mặc định chọn hôm nay
        renderTimeTable();

// Hàm tính thời gian kết thúc
function calculateEndTime() {
    let totalDuration = 0;
    let startTime = document.getElementById('giobd').value;

    // Tính tổng thời gian của các dịch vụ đã chọn
    document.querySelectorAll('input[name="dichvu[]"]:checked').forEach(function (checkbox) {
        totalDuration += parseInt(checkbox.getAttribute('data-thoiluong'));
    });

    if (startTime && totalDuration > 0) {
        let startDate = new Date(startTime);
        startDate.setMinutes(startDate.getMinutes() + totalDuration);  // Cộng thời gian vào

        // Hiển thị thời gian kết thúc
        document.getElementById('giokt').value = startDate.toISOString().slice(0, 16);  // Đảm bảo định dạng ISO
    }
}

// Tính thời gian kết thúc khi người dùng thay đổi giờ bắt đầu
document.getElementById('giobd').addEventListener('change', function () {
    calculateEndTime();
});

</script>
</body>
</html>
