<?php
// Kết nối tới cơ sở dữ liệu và lấy danh sách nhân viên và dịch vụ
require_once 'Model/Dichvu.php';
require_once 'Model/Nhanvien.php';
require_once 'Model/Khachhang.php';
require_once 'Model/Cuochen.php';
require_once 'Model/Dichvudat.php';
require_once 'mail/sendmail.php';
class DatCuocHenController {

    private $dichvus;
    private $nhanviens;

    public function __construct() {
        // Lấy danh sách dịch vụ và nhân viên từ database
        $this->dichvus = Dichvu::layDanhSachDichVu();
        $this->nhanviens = Nhanvien::layDanhSachNhanVien();
    }

    public static function hienThiFormDatLich() {
        include 'View/user/formdatlich.php';  
    }

    public static function datlich() {
        // Xử lý khi form được submit
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra sự tồn tại của các chỉ mục trước khi truy cập
            $tenkh = isset($_POST['tenkh']) ? $_POST['tenkh'] : '';
            $sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
            $emailkh = isset($_POST['emailkh']) ? $_POST['emailkh'] : '';
            $manv = isset($_POST['manv']) ? $_POST['manv'] : '';
            $giobd = isset($_POST['giobd']) ? $_POST['giobd'] : '';
            $dichvu = isset($_POST['dichvu']) ? $_POST['dichvu'] : [];

            // Kiểm tra xem các giá trị đã có đúng không
            if (empty($tenkh) || empty($sdt) || empty($emailkh) || empty($manv) || empty($giobd) || empty($dichvu)) {
                // Nếu có trường nào còn trống, có thể thông báo lỗi cho người dùng
                echo "Vui lòng điền đầy đủ thông tin!";
                header("Location: index.php?controller=hienthiformdatlich");
                exit(); 
                return; // Dừng thực thi nếu thiếu thông tin
            }

            // Kiểm tra thông tin khách hàng, nếu không có thì thêm mới
            $khachhang = Khachhang::layKhachHangTheoEmail($emailkh);
            if (!$khachhang) {
                $makh = Khachhang::themKhachHang($tenkh, $sdt, $emailkh);
            } else {
                $makh = $khachhang['makh'];
            }

            // Tính toán giờ kết thúc
            $thoiluong = 0;
            foreach ($dichvu as $madv) {
                $dichvuInfo = Dichvu::layDichVuTheoID($madv);
                $thoiluong += $dichvuInfo['thoiluong']; // Tổng thời gian của dịch vụ
            }

            // Tính giờ kết thúc
            $giokt = date('Y-m-d H:i:s', strtotime($giobd) + $thoiluong * 60);

            // Tạo cuộc hẹn
            $data = [
                'makh' => $makh,
                'manv' => $manv,
                'giobd' => $giobd,
                'giokt' => $giokt,
                'dichvu' => $dichvu
            ];
            $mach = Cuochen::taoCuocHen($data);

            // Thêm các dịch vụ vào cuộc hẹn
            foreach ($dichvu as $madv) {
                Dichvudat::themDichVuVaoCuocHen($mach, $madv);
            }

            // Thông báo thành công
            include 'View/user/datlichthanhcong.php';
            //Gửi email
            $mail=new Mailer();
            $tieude='Cảm ơn quý khách đã đặt lịch hẹn tại IRONCAP ';
            $noidung="Mã cuộc hẹn của quý khách là: $mach";
            $mail->datlich($tieude,$noidung,$emailkh);
            exit;
        }
    }
    public static function huydatlich() {
        $errors = []; // Mảng chứa lỗi
        $email = trim($_POST['email'] ?? '');
        $appointmentCode = trim($_POST['mach'] ?? '');
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Kiểm tra số điện thoại
            if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
                $errors['email'] = "Email không hợp lệ. Vui lòng nhập đúng định dạng.";
            }    
            // Kiểm tra mã cuộc hẹn
            if (!preg_match('/^\d+$/', $appointmentCode)) {
                $errors['mach'] = "Mã cuộc hẹn không hợp lệ";
            }
    
            // Nếu không có lỗi, thực hiện hủy cuộc hẹn
            if (empty($errors)) {
                $result = Cuochen::huyCuocHen($email, $appointmentCode);
                if ($result) {
                    echo "<h1 class='text-success text-center'>Hủy thành công</h1>";
                } else {
                    $errors['general'] = "Email và Mã cuộc hẹn không trùng khớp";
                }
            }
        }
        include 'View/user/formhuydatlich.php';
    }
}
?>
