-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 25, 2025 at 04:55 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlytiemcattoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuochhen`
--

DROP TABLE IF EXISTS `cuochhen`;
CREATE TABLE IF NOT EXISTS `cuochhen` (
  `mach` int NOT NULL AUTO_INCREMENT,
  `ngaytao` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `makh` int DEFAULT NULL,
  `manv` int DEFAULT NULL,
  `giobd` timestamp NULL DEFAULT NULL,
  `giokt` timestamp NULL DEFAULT NULL,
  `huy` tinyint(1) DEFAULT '0',
  `lydo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`mach`),
  KEY `makh` (`makh`),
  KEY `manv` (`manv`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuochhen`
--

INSERT INTO `cuochhen` (`mach`, `ngaytao`, `makh`, `manv`, `giobd`, `giokt`, `huy`, `lydo`) VALUES
(1, '2024-11-18 12:58:31', 1, 1, '2024-11-19 10:00:00', '2024-11-19 11:00:00', 1, NULL),
(4, '2024-11-18 15:47:36', 3, 1, '2024-11-18 18:50:00', '2024-11-18 19:20:00', 1, NULL),
(7, '2024-11-18 16:48:35', 5, 1, '2024-11-19 00:30:00', '2024-11-19 01:00:00', 1, NULL),
(8, '2024-11-18 16:56:36', 6, 1, '2024-11-18 19:56:00', '2024-11-18 20:26:00', 0, NULL),
(9, '2024-11-19 05:40:03', 7, 1, '2024-11-20 00:30:00', '2024-11-20 01:00:00', 0, NULL),
(10, '2024-11-19 11:45:43', 8, 1, '2024-11-20 15:45:00', '2024-11-20 16:15:00', 1, NULL),
(11, '2024-11-19 11:52:09', 9, 1, '2024-11-21 15:56:00', '2024-11-21 16:26:00', 1, NULL),
(12, '2024-11-19 11:56:17', 10, 2, '2024-11-21 15:00:00', '2024-11-21 15:45:00', 1, NULL),
(13, '2024-11-20 12:28:26', 11, 2, '2024-11-20 13:00:00', '2024-11-20 13:45:00', 1, NULL),
(15, '2024-11-20 12:39:38', 13, 2, '2024-11-21 13:00:00', '2024-11-21 13:30:00', 0, NULL),
(16, '2024-11-20 12:40:49', 14, 2, '2024-11-23 00:00:00', '2024-11-23 00:30:00', 1, NULL),
(17, '2024-11-20 12:43:48', 15, 2, '2024-11-21 00:00:00', '2024-11-21 00:30:00', 1, NULL),
(18, '2024-11-20 14:03:57', 16, 2, '2024-11-21 01:00:00', '2024-11-21 01:30:00', 1, NULL),
(19, '2024-11-20 14:09:18', 17, 1, '2024-11-21 09:00:00', '2024-11-21 09:30:00', 0, NULL),
(20, '2024-11-20 14:13:10', 18, 2, '2024-11-21 02:00:00', '2024-11-21 02:30:00', 0, NULL),
(22, '2024-11-22 14:13:13', 20, 3, '2024-11-23 09:00:00', '2024-11-23 09:30:00', 0, NULL),
(24, '2024-11-23 10:43:49', 22, 1, '2024-11-23 11:00:00', '2024-11-23 11:45:00', 0, NULL),
(25, '2024-11-23 10:44:18', 22, 1, '2024-11-23 11:00:00', '2024-11-23 11:45:00', 1, NULL),
(26, '2024-11-23 10:45:18', 23, 1, '2024-11-23 11:00:00', '2024-11-23 13:30:00', 0, NULL),
(27, '2024-11-23 10:54:11', 24, 1, '2024-11-23 14:00:00', '2024-11-23 14:45:00', 1, NULL),
(28, '2024-11-26 14:59:28', 25, 1, '2024-11-27 01:00:00', '2024-11-27 03:45:00', 1, NULL),
(29, '2024-11-28 04:39:00', 26, 1, '2024-11-28 06:00:00', '2024-11-28 06:30:00', 1, NULL),
(30, '2024-11-28 04:40:48', 26, 29, '2024-11-28 07:00:00', '2024-11-28 07:45:00', 1, NULL),
(31, '2024-11-29 15:26:09', 1, 2, '2024-11-30 02:00:00', '2024-11-30 04:30:00', 1, NULL),
(32, '2024-12-13 05:46:49', 25, 2, '2024-12-13 08:00:00', '2024-12-13 10:30:00', 0, NULL),
(33, '2024-12-13 05:49:03', 26, 29, '2024-12-13 13:00:00', '2024-12-13 15:30:00', 1, NULL),
(36, '2024-12-13 06:29:57', NULL, 29, '2024-12-13 12:00:00', '2024-12-13 12:15:00', 0, NULL),
(37, '2024-12-13 06:38:41', NULL, 29, '2024-12-13 07:00:00', '2024-12-13 07:30:00', 0, NULL),
(38, '2024-12-13 06:42:26', NULL, 2, '2024-12-13 07:00:00', '2024-12-13 07:30:00', 0, NULL),
(39, '2024-12-13 06:43:39', NULL, 2, '2024-12-13 09:00:00', '2024-12-13 09:20:00', 0, NULL),
(40, '2024-12-13 06:45:17', NULL, 29, '2024-12-13 14:00:00', '2024-12-13 14:30:00', 0, NULL),
(41, '2024-12-13 06:46:53', 1, 1, '2024-12-13 09:00:00', '2024-12-13 09:30:00', 0, NULL),
(42, '2024-12-13 06:47:55', 1, 2, '2024-12-13 09:00:00', '2024-12-13 09:30:00', 1, NULL),
(43, '2024-12-13 06:52:54', NULL, 29, '2024-12-13 08:00:00', '2024-12-13 08:30:00', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dichvu`
--

DROP TABLE IF EXISTS `dichvu`;
CREATE TABLE IF NOT EXISTS `dichvu` (
  `madv` int NOT NULL AUTO_INCREMENT,
  `tendv` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gia` decimal(15,2) DEFAULT NULL,
  `thoiluong` int DEFAULT NULL,
  `maloai` int DEFAULT NULL,
  `hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`madv`),
  KEY `maloai` (`maloai`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`madv`, `tendv`, `mota`, `gia`, `thoiluong`, `maloai`, `hinh`) VALUES
(1, 'Cắt Tóc', 'Cắt tóc Theo kiểu yêu cầu của khách', 50000.00, 30, 1, '2023_11_9_638351401271116414_1315.png'),
(2, 'Gội Đầu', 'Gội Đầu cho Khách ', 30000.00, 15, 1, 'lovepik-male-customer-washing-hair-picture_501431981.jpg'),
(3, 'Nhuộm Tóc', 'Nhuộm Tóc Theo Màu Sắc Yêu Cầu ', 120000.00, 120, 1, 'Nhuom-toc-tiem-an-nguy-co-tu-nhung-sac-mau-2-min.jpg'),
(14, 'Cạo râu', 'Cạo theo yêu cầu', 20000.00, 20, 2, 'caorau.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dichvudat`
--

DROP TABLE IF EXISTS `dichvudat`;
CREATE TABLE IF NOT EXISTS `dichvudat` (
  `mach` int NOT NULL,
  `madv` int NOT NULL,
  PRIMARY KEY (`mach`,`madv`),
  KEY `madv` (`madv`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dichvudat`
--

INSERT INTO `dichvudat` (`mach`, `madv`) VALUES
(4, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(22, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(37, 1),
(38, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(24, 2),
(25, 2),
(27, 2),
(28, 2),
(30, 2),
(36, 2),
(26, 3),
(28, 3),
(31, 3),
(32, 3),
(33, 3),
(39, 14);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `makh` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sdt` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `emailkh` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`makh`),
  UNIQUE KEY `emailkh` (`emailkh`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`makh`, `ten`, `sdt`, `emailkh`) VALUES
(1, ' Hieu', '0778137249', 'nguyentranphucthinh9150@gmail.com'),
(3, ' Minh Hy', '0778137249', 'Minh@gmail.com'),
(5, 'Vũ Sơn', '0939259150', 'son@gmail.com'),
(6, 'Phuc Thinh', '0335552452', 'thanlua@gmail.com'),
(7, 'Nguyen van sinh', '0939222555', 'sinh@gmail.com'),
(8, 'minh hoan', '0955111222', 'lili@gmail.com'),
(9, ' phuc thinh', '0905015080', 'phucthinh@gmail.com'),
(10, 'văn khang', '090222333', 'khang@gmail.com'),
(11, 'HURRYKNG', '0995646185', 'KhangGN@gmail.com'),
(13, 'Huy Phuc', '01269892464', 'HuyPhuc@gmail.com'),
(14, 'Obito', '090333222', 'obito@gmail.com'),
(15, 'Manbo', '0939661253', 'manboGN@gmail.com'),
(16, 'Phùng Thanh Độ', '0999666555', 'mixigaming@gmail.com'),
(17, 'Lâm Đình Khoa', '096332244', 'rambo@gmail.com'),
(18, 'abc', '03366555444', 'abc@gmail.com'),
(19, 'Huy Tuấn', '0996333222', 'tuan@gmail.com'),
(20, 'Van Xuan', '0123654888', 'Xuan@gmail.com'),
(22, 'Minamino', '0665553231', 'Mi@gmail.com'),
(23, 'Khải', '0905015080', 'Khai@gmail.com'),
(24, 'Tấn Trung', '0333666555', 'trung@gdasdawd.com'),
(25, 'tanphan', '0123951238', 'tanphan@gmail'),
(26, 'testmail', '0129374123', 'dh52111716@student.stu.edu.vn');

-- --------------------------------------------------------

--
-- Table structure for table `loaidichvu`
--

DROP TABLE IF EXISTS `loaidichvu`;
CREATE TABLE IF NOT EXISTS `loaidichvu` (
  `maloai` int NOT NULL AUTO_INCREMENT,
  `tenloai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`maloai`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaidichvu`
--

INSERT INTO `loaidichvu` (`maloai`, `tenloai`) VALUES
(1, 'Bình Thường'),
(2, 'cạo râu'),
(3, 'gội xả');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `manv` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sdt` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`manv`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`manv`, `ten`, `sdt`, `email`, `hinh`) VALUES
(1, 'Long', '0932372312', 'Long@gmail.com', 'long.jfif'),
(2, 'Khoa', '099555666', 'khoa@gmail.com', 'karik.jpg'),
(3, 'Khang', '0389965654', 'khanghr@gmail.com', 'hurry.webp'),
(29, 'Low G', '0778137242', 'LowG@gmail.com', 'lowg.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `quantrivien`
--

DROP TABLE IF EXISTS `quantrivien`;
CREATE TABLE IF NOT EXISTS `quantrivien` (
  `maqt` int NOT NULL AUTO_INCREMENT,
  `tendn` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hoten` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `matkhau` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`maqt`),
  UNIQUE KEY `tendn` (`tendn`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quantrivien`
--

INSERT INTO `quantrivien` (`maqt`, `tendn`, `email`, `hoten`, `matkhau`) VALUES
(3, 'admin', 'admin@admin', 'tan', '202cb962ac59075b964b07152d234b70'),
(4, 'tan', 'tan@gmail.com', 'tanphan', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `tintuckhuyenmai`
--

DROP TABLE IF EXISTS `tintuckhuyenmai`;
CREATE TABLE IF NOT EXISTS `tintuckhuyenmai` (
  `matintuc` int NOT NULL AUTO_INCREMENT,
  `tieude` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `noidung` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `hinhanh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ngaydang` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`matintuc`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tintuckhuyenmai`
--

INSERT INTO `tintuckhuyenmai` (`matintuc`, `tieude`, `noidung`, `hinhanh`, `ngaydang`) VALUES
(1, 'Khuyến mãi cắt tóc tháng 11 và tháng 12', 'Nhân dịp tháng 11, tiệm cắt tóc của chúng tôi ưu đãi giảm giá 20% cho tất cả các dịch vụ cắt tóc. Hãy nhanh tay đặt lịch hẹn ngay hôm nay!', 'km1.jpg', '2024-11-23 13:02:00'),
(2, 'Combo cắt tóc và gội đầu giá sốc', 'Chỉ với 150,000 VND, bạn sẽ được trải nghiệm combo cắt tóc và gội đầu đẳng cấp tại tiệm của chúng tôi. Đừng bỏ lỡ cơ hội làm mới bản thân với mức giá cực kỳ hấp dẫn này.', 'km2.jfif', '2024-11-23 13:02:00'),
(3, 'Dịch vụ uốn tóc giảm giá 30%', 'Ưu đãi đặc biệt dành cho các bạn muốn sở hữu một mái tóc xoăn bồng bềnh quyến rũ. Dịch vụ uốn tóc tại tiệm hiện giảm giá 30% trong tuần này.', 'km3.jfif', '2024-11-23 13:02:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuochhen`
--
ALTER TABLE `cuochhen`
  ADD CONSTRAINT `cuochhen_ibfk_1` FOREIGN KEY (`makh`) REFERENCES `khachhang` (`makh`),
  ADD CONSTRAINT `cuochhen_ibfk_2` FOREIGN KEY (`manv`) REFERENCES `nhanvien` (`manv`);

--
-- Constraints for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD CONSTRAINT `dichvu_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loaidichvu` (`maloai`);

--
-- Constraints for table `dichvudat`
--
ALTER TABLE `dichvudat`
  ADD CONSTRAINT `dichvudat_ibfk_1` FOREIGN KEY (`mach`) REFERENCES `cuochhen` (`mach`),
  ADD CONSTRAINT `dichvudat_ibfk_2` FOREIGN KEY (`madv`) REFERENCES `dichvu` (`madv`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
