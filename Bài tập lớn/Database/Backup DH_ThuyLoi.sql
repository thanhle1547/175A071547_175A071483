-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 08, 2020 lúc 08:02 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dh_thuyloi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `MaBai` tinyint(3) UNSIGNED NOT NULL,
  `TieuDe` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TomTat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HinhAnh` mediumblob DEFAULT NULL,
  `NoiDung` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaDM` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`MaBai`, `TieuDe`, `TomTat`, `HinhAnh`, `NoiDung`, `MaDM`) VALUES
(1, 'Kế hoạch Học tập môn học Giáo dục quốc phòng và an ninh K61 (Khóa III đợt 4) năm học 2019– 2020', NULL, NULL, 'A.Thời gian, địa điểm và hình thức học tập\r\n\r\n- Thời gian: Từ ngày 03/02/2020 đến ngày 15/03/2020.\r\n\r\n- Địa điểm:Trung tâm GDQP&AN (Trường Đại học Thủy Lợi-Cơ sở Phố Hiến), tỉnh Hưng Yên.\r\n\r\n- Hình thức học tập: Tổ chức đào tạo theo lớp, quản lý theo đại đội sinh viên. Sinh viên ăn ở, sinh hoạt tập trung 24/24 giờ trong thời gian học tập môn học tại Trung tâm.\r\n\r\nB. Thành phần sinh viên tham gia học tập\r\n\r\n- Sinh viên K61 hệ đại học chính quy: Khoa Công nghệ thông tin.\r\n\r\n- Sinh viên K60 trở về trước chưa được cấp Chứng chỉ GDQP&AN (nếu có nguyện vọng học).', 2),
(2, 'Hội thảo chương trình Meister School đào tạo kỹ sư làm việc tại Nhật Bản', NULL, NULL, 'Theo thỏa thuận giữa Trường Đại học Thủy lợi và Công ty Minami Fuji, Nhật Bản, Chương trình Meister School bắt đầu triển khai tại Đại học Thủy lợi từ tháng 10/2017. Với mục tiêu đào tạo nhân lực trẻ Việt Nam để làm việc lâu dài tại Nhật Bản, Chương trình Meister School tuyển chọn những sinh viên đại học năm cuối hoặc mới tốt nghiệp có tiềm năng đáp ứng những yêu cầu làm việc trình độ cao tại các công ty Nhật Bản và sẽ được nhận các đãi ngộ như một người Nhật. Công ty sẽ đào tạo miễn phí 100% Tiếng Nhật và các kỹ năng nghề nghiệp cần thiết để các em có thể làm việc tại Nhật Bản.\r\n\r\n', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietlhp`
--

CREATE TABLE `chitietlhp` (
  `MaLHP` tinyint(100) UNSIGNED NOT NULL,
  `Thu` tinyint(1) UNSIGNED NOT NULL,
  `MaDD` tinyint(3) UNSIGNED NOT NULL,
  `Tiet` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietlhp`
--

INSERT INTO `chitietlhp` (`MaLHP`, `Thu`, `MaDD`, `Tiet`) VALUES
(1, 5, 1, '1,2'),
(2, 3, 2, '3,4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_kh`
--

CREATE TABLE `chitiet_kh` (
  `MaKH` tinyint(100) UNSIGNED NOT NULL,
  `Tuan` tinyint(2) UNSIGNED NOT NULL,
  `Ngay` date NOT NULL,
  `NoiDung` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SoTiet` tinyint(1) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaCV` tinyint(10) UNSIGNED NOT NULL,
  `ChucVu` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MaCV`, `ChucVu`) VALUES
(1, 'admin'),
(2, 'quản lý'),
(3, 'giảng viên');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `ct_kehoach`
-- (See below for the actual view)
--
CREATE TABLE `ct_kehoach` (
`MaKH` tinyint(100) unsigned
,`Tuan` tinyint(2) unsigned
,`Ngay` date
,`NoiDung` varchar(500)
,`SoTiet` tinyint(1) unsigned
,`MaLHP` tinyint(3) unsigned
,`SoTuan` tinyint(2) unsigned
,`TongSoTiet` tinyint(2) unsigned
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `ct_lichtrinh`
-- (See below for the actual view)
--
CREATE TABLE `ct_lichtrinh` (
`MaKH` tinyint(100) unsigned
,`MaDD` tinyint(3) unsigned
,`TenDD` varchar(20)
,`Tiet` varchar(2)
,`NoiDung` varchar(500)
,`TinhHinhLop` varchar(500)
,`TrangThai` enum('nghỉ','học bù')
,`MaGV` tinyint(10) unsigned
,`SoTuan` tinyint(2) unsigned
,`TongSoTiet` tinyint(2) unsigned
,`MaNganh` varchar(10)
,`Tuan` tinyint(3) unsigned
,`Ngay` date
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `ct_lophocphan`
-- (See below for the actual view)
--
CREATE TABLE `ct_lophocphan` (
`MaLHP` tinyint(100) unsigned
,`MaGV_MH` tinyint(3) unsigned
,`MaLop` tinyint(3) unsigned
,`MaTG` tinyint(10) unsigned
,`SoTinChi` tinyint(1) unsigned
,`LoaiLop` enum('lý thuyết','thảo luận','thực hành')
,`Nhom` tinyint(1) unsigned
,`TenLop` varchar(30)
,`MaGV` tinyint(3) unsigned
,`MaMon` varchar(10)
,`ThoiGian` varchar(13)
,`TG_BatDau` date
,`TG_KetThuc` date
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `ct_monnganh`
-- (See below for the actual view)
--
CREATE TABLE `ct_monnganh` (
`MaMon` varchar(10)
,`TenMon` varchar(30)
,`MaNganh` varchar(10)
,`TenNghanh` varchar(50)
,`ChiTiet` varchar(1000)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucbv`
--

CREATE TABLE `danhmucbv` (
  `MaDM` tinyint(3) UNSIGNED NOT NULL,
  `TenDM` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucbv`
--

INSERT INTO `danhmucbv` (`MaDM`, `TenDM`) VALUES
(1, 'Đào Tạo'),
(2, 'Công Tác Sinh Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diadiem`
--

CREATE TABLE `diadiem` (
  `MaDD` tinyint(3) UNSIGNED NOT NULL,
  `TenDD` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diadiem`
--

INSERT INTO `diadiem` (`MaDD`, `TenDD`) VALUES
(1, '312-B5'),
(2, '345-A3');

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `dl_giangvien`
-- (See below for the actual view)
--
CREATE TABLE `dl_giangvien` (
`MaGV` tinyint(10) unsigned
,`HoTen` varchar(50)
,`GioiTinh` varchar(3)
,`SDT` varchar(10)
,`TenMon` varchar(30)
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `dl_nhanvien`
-- (See below for the actual view)
--
CREATE TABLE `dl_nhanvien` (
`MaND` tinyint(20) unsigned
,`HoTen` varchar(50)
,`GioiTinh` varchar(3)
,`SDT` varchar(10)
,`Username` varchar(20)
,`Password` varchar(64)
,`Salt` varchar(100)
,`ValidationCode` varchar(100)
,`Active` tinyint(1)
,`MaCV` tinyint(10) unsigned
,`ChucVu` varchar(10)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `MaGV` tinyint(10) UNSIGNED NOT NULL,
  `MaNganh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giangvien`
--

INSERT INTO `giangvien` (`MaGV`, `MaNganh`) VALUES
(8, 'TLA106');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gv_monhoc`
--

CREATE TABLE `gv_monhoc` (
  `MaGV_MH` tinyint(3) UNSIGNED NOT NULL,
  `MaGV` tinyint(3) UNSIGNED NOT NULL,
  `MaMon` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gv_monhoc`
--

INSERT INTO `gv_monhoc` (`MaGV_MH`, `MaGV`, `MaMon`) VALUES
(1, 8, 'CSE482'),
(2, 8, '	CSE484');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kehoach`
--

CREATE TABLE `kehoach` (
  `MaKH` tinyint(100) UNSIGNED NOT NULL,
  `MaLHP` tinyint(3) UNSIGNED NOT NULL,
  `SoTuan` tinyint(2) UNSIGNED NOT NULL,
  `TongSoTiet` tinyint(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kehoach`
--

INSERT INTO `kehoach` (`MaKH`, `MaLHP`, `SoTuan`, `TongSoTiet`) VALUES
(1, 1, 12, 30),
(2, 2, 10, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichtrinh`
--

CREATE TABLE `lichtrinh` (
  `MaKH` tinyint(100) UNSIGNED NOT NULL,
  `Tuan` tinyint(2) UNSIGNED DEFAULT NULL,
  `Ngay` date DEFAULT NULL,
  `MaDD` tinyint(3) UNSIGNED DEFAULT NULL,
  `Tiet` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NoiDung` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TinhHinhLop` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TrangThai` enum('nghỉ','học bù') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MaGV` tinyint(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichtrinh`
--

INSERT INTO `lichtrinh` (`MaKH`, `Tuan`, `Ngay`, `MaDD`, `Tiet`, `NoiDung`, `TinhHinhLop`, `TrangThai`, `MaGV`) VALUES
(1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MaLop` tinyint(3) UNSIGNED NOT NULL,
  `TenLop` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`MaLop`, `TenLop`) VALUES
(1, '59th2'),
(2, '59th3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophocphan`
--

CREATE TABLE `lophocphan` (
  `MaLHP` tinyint(100) UNSIGNED NOT NULL,
  `MaGV_MH` tinyint(3) UNSIGNED NOT NULL,
  `MaLop` tinyint(3) UNSIGNED NOT NULL,
  `MaTG` tinyint(10) UNSIGNED NOT NULL,
  `TG_BatDau` date DEFAULT NULL,
  `TG_KetThuc` date DEFAULT NULL,
  `SoTinChi` tinyint(1) UNSIGNED DEFAULT NULL,
  `LoaiLop` enum('lý thuyết','thảo luận','thực hành') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nhom` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lophocphan`
--

INSERT INTO `lophocphan` (`MaLHP`, `MaGV_MH`, `MaLop`, `MaTG`, `TG_BatDau`, `TG_KetThuc`, `SoTinChi`, `LoaiLop`, `Nhom`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, 'lý thuyết', 0),
(2, 1, 2, 2, NULL, NULL, NULL, 'thực hành', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMon` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaNganh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenMon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`MaMon`, `MaNganh`, `TenMon`) VALUES
('	CSE484', 'TLA106', 'Cơ sở dữ liệu	'),
('CSE482', 'TLA106', 'Hệ điều hành	');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganhhoc`
--

CREATE TABLE `nganhhoc` (
  `MaNganh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenNghanh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChiTiet` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nganhhoc`
--

INSERT INTO `nganhhoc` (`MaNganh`, `TenNghanh`, `ChiTiet`) VALUES
('TLA105', '	 Kỹ thuật cơ khí', '- Kỹ thuật cơ khí;\r\n- Kỹ thuật cơ khí định hướng việc làm tại - Hàn Quốc.'),
('TLA106', 'Công nghệ thông tin', 'Gồm các ngành:\r\n+ Công nghệ thông tin\r\n- Công nghệ thông tin;\r\n- Công nghệ thông tin Việt-Nhật.\r\n+ Hệ thống thông tin;\r\n+ Kỹ thuật phần mềm.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `MaND` tinyint(20) UNSIGNED NOT NULL,
  `HoTen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GioiTinh` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `SDT` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Salt` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ValidationCode` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Active` tinyint(1) DEFAULT 0,
  `MaCV` tinyint(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`MaND`, `HoTen`, `GioiTinh`, `SDT`, `Username`, `Password`, `Salt`, `ValidationCode`, `Active`, `MaCV`) VALUES
(5, 'Lê Minh Thành', NULL, NULL, 'thanh', '123', '123', '789', 1, 1),
(6, 'Nguyễn Văn Nam', NULL, NULL, 'nam', '4566', '789', '654', 2, 2),
(7, 'admin', NULL, NULL, 'admin', 'admin4783', '1', 'c', 1, 1),
(8, 'Kiều Tuấn Dũng', NULL, NULL, 'ktz', 'ktz59', '2', 'd', 2, 3),
(9, 'ql001', NULL, NULL, 'ql001', 'ql175', '2', 'e', 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoigian`
--

CREATE TABLE `thoigian` (
  `MaTG` tinyint(10) UNSIGNED NOT NULL,
  `NamHoc` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HocKy` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiaiDoan` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TG_BatDau` date NOT NULL,
  `TG_KetThuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thoigian`
--

INSERT INTO `thoigian` (`MaTG`, `NamHoc`, `HocKy`, `GiaiDoan`, `TG_BatDau`, `TG_KetThuc`) VALUES
(1, '2019-2020', '1', '1', '0000-00-00', '0000-00-00'),
(2, '2019-2020', '2', '1', '0000-00-00', '0000-00-00'),
(3, '2019-2020', '2', '1', '2020-02-03', '2020-03-29'),
(4, '2019-2020', '2', '1', '2020-02-17', '2020-03-29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiet`
--

CREATE TABLE `tiet` (
  `MaTiet` tinyint(2) UNSIGNED NOT NULL,
  `TG_BatDau` time NOT NULL,
  `TG_KetThuc` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tiet`
--

INSERT INTO `tiet` (`MaTiet`, `TG_BatDau`, `TG_KetThuc`) VALUES
(1, '07:00:00', '07:50:00'),
(2, '07:55:00', '08:45:00'),
(3, '08:50:00', '09:40:00'),
(4, '09:45:00', '10:35:00');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `ct_kehoach`
--
DROP TABLE IF EXISTS `ct_kehoach`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ct_kehoach`  AS  select `ctkh`.`MaKH` AS `MaKH`,`ctkh`.`Tuan` AS `Tuan`,`ctkh`.`Ngay` AS `Ngay`,`ctkh`.`NoiDung` AS `NoiDung`,`ctkh`.`SoTiet` AS `SoTiet`,`k`.`MaLHP` AS `MaLHP`,`k`.`SoTuan` AS `SoTuan`,`k`.`TongSoTiet` AS `TongSoTiet` from (`chitiet_kh` `ctkh` join `kehoach` `k`) where `ctkh`.`MaKH` = `k`.`MaKH` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `ct_lichtrinh`
--
DROP TABLE IF EXISTS `ct_lichtrinh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ct_lichtrinh`  AS  select `l`.`MaKH` AS `MaKH`,`l`.`MaDD` AS `MaDD`,`dd`.`TenDD` AS `TenDD`,`l`.`Tiet` AS `Tiet`,`l`.`NoiDung` AS `NoiDung`,`l`.`TinhHinhLop` AS `TinhHinhLop`,`l`.`TrangThai` AS `TrangThai`,`l`.`MaGV` AS `MaGV`,`c`.`SoTuan` AS `SoTuan`,`c`.`TongSoTiet` AS `TongSoTiet`,`gv`.`MaNganh` AS `MaNganh`,coalesce(`l`.`Tuan`,`c`.`Tuan`) AS `Tuan`,coalesce(`l`.`Ngay`,`c`.`Ngay`) AS `Ngay` from (((`lichtrinh` `l` join `giangvien` `gv`) join `diadiem` `dd`) join `ct_kehoach` `c`) where `l`.`MaKH` = `c`.`MaKH` and `l`.`MaDD` = `dd`.`MaDD` and `gv`.`MaGV` = `l`.`MaGV` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `ct_lophocphan`
--
DROP TABLE IF EXISTS `ct_lophocphan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ct_lophocphan`  AS  select `lhp`.`MaLHP` AS `MaLHP`,`lhp`.`MaGV_MH` AS `MaGV_MH`,`lhp`.`MaLop` AS `MaLop`,`lhp`.`MaTG` AS `MaTG`,`lhp`.`SoTinChi` AS `SoTinChi`,`lhp`.`LoaiLop` AS `LoaiLop`,`lhp`.`Nhom` AS `Nhom`,`l`.`TenLop` AS `TenLop`,`gvmh`.`MaGV` AS `MaGV`,`gvmh`.`MaMon` AS `MaMon`,concat(`tm`.`NamHoc`,'_',`tm`.`HocKy`,'_',`tm`.`GiaiDoan`) AS `ThoiGian`,coalesce(`lhp`.`TG_BatDau`,`tm`.`TG_BatDau`) AS `TG_BatDau`,coalesce(`lhp`.`TG_KetThuc`,`tm`.`TG_KetThuc`) AS `TG_KetThuc` from (((`lophocphan` `lhp` join `gv_monhoc` `gvmh`) join `lop` `l`) join `thoigian` `tm`) where `lhp`.`MaGV_MH` = `gvmh`.`MaGV_MH` and `lhp`.`MaLop` = `l`.`MaLop` and `tm`.`MaTG` = `lhp`.`MaTG` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `ct_monnganh`
--
DROP TABLE IF EXISTS `ct_monnganh`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ct_monnganh`  AS  select `m`.`MaMon` AS `MaMon`,`m`.`TenMon` AS `TenMon`,`nh`.`MaNganh` AS `MaNganh`,`nh`.`TenNghanh` AS `TenNghanh`,`nh`.`ChiTiet` AS `ChiTiet` from (`monhoc` `m` join `nganhhoc` `nh`) where `m`.`MaNganh` = `nh`.`MaNganh` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `dl_giangvien`
--
DROP TABLE IF EXISTS `dl_giangvien`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dl_giangvien`  AS  select `g`.`MaGV` AS `MaGV`,`n`.`HoTen` AS `HoTen`,`n`.`GioiTinh` AS `GioiTinh`,`n`.`SDT` AS `SDT`,`m`.`TenMon` AS `TenMon` from (((`nguoidung` `n` join `giangvien` `g`) join `gv_monhoc` `gm`) join `monhoc` `m`) where `g`.`MaGV` = `gm`.`MaGV` and `gm`.`MaMon` = `m`.`MaMon` and `g`.`MaGV` = `n`.`MaND` ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `dl_nhanvien`
--
DROP TABLE IF EXISTS `dl_nhanvien`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dl_nhanvien`  AS  select `n`.`MaND` AS `MaND`,`n`.`HoTen` AS `HoTen`,`n`.`GioiTinh` AS `GioiTinh`,`n`.`SDT` AS `SDT`,`n`.`Username` AS `Username`,`n`.`Password` AS `Password`,`n`.`Salt` AS `Salt`,`n`.`ValidationCode` AS `ValidationCode`,`n`.`Active` AS `Active`,`n`.`MaCV` AS `MaCV`,`c`.`ChucVu` AS `ChucVu` from (`nguoidung` `n` join `chucvu` `c`) where `n`.`MaCV` < 3 and `n`.`MaCV` = `c`.`MaCV` ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`MaBai`),
  ADD KEY `MaDM` (`MaDM`);

--
-- Chỉ mục cho bảng `chitietlhp`
--
ALTER TABLE `chitietlhp`
  ADD PRIMARY KEY (`MaLHP`),
  ADD KEY `MaDD` (`MaDD`);

--
-- Chỉ mục cho bảng `chitiet_kh`
--
ALTER TABLE `chitiet_kh`
  ADD PRIMARY KEY (`MaKH`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaCV`);

--
-- Chỉ mục cho bảng `danhmucbv`
--
ALTER TABLE `danhmucbv`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  ADD PRIMARY KEY (`MaDD`);

--
-- Chỉ mục cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD PRIMARY KEY (`MaGV`),
  ADD KEY `MaNganh` (`MaNganh`);

--
-- Chỉ mục cho bảng `gv_monhoc`
--
ALTER TABLE `gv_monhoc`
  ADD PRIMARY KEY (`MaGV_MH`),
  ADD KEY `MaGV` (`MaGV`),
  ADD KEY `MaMon` (`MaMon`);

--
-- Chỉ mục cho bảng `kehoach`
--
ALTER TABLE `kehoach`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `MaLHP` (`MaLHP`);

--
-- Chỉ mục cho bảng `lichtrinh`
--
ALTER TABLE `lichtrinh`
  ADD PRIMARY KEY (`MaKH`),
  ADD KEY `MaDD` (`MaDD`),
  ADD KEY `MaGV` (`MaGV`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`MaLop`);

--
-- Chỉ mục cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD PRIMARY KEY (`MaLHP`),
  ADD KEY `MaGV_MH` (`MaGV_MH`),
  ADD KEY `MaLop` (`MaLop`),
  ADD KEY `MaTG` (`MaTG`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`MaMon`),
  ADD KEY `MaNganh` (`MaNganh`);

--
-- Chỉ mục cho bảng `nganhhoc`
--
ALTER TABLE `nganhhoc`
  ADD PRIMARY KEY (`MaNganh`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`MaND`),
  ADD KEY `MaCV` (`MaCV`);

--
-- Chỉ mục cho bảng `thoigian`
--
ALTER TABLE `thoigian`
  ADD PRIMARY KEY (`MaTG`);

--
-- Chỉ mục cho bảng `tiet`
--
ALTER TABLE `tiet`
  ADD PRIMARY KEY (`MaTiet`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `MaBai` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhmucbv`
--
ALTER TABLE `danhmucbv`
  MODIFY `MaDM` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  MODIFY `MaDD` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `gv_monhoc`
--
ALTER TABLE `gv_monhoc`
  MODIFY `MaGV_MH` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `kehoach`
--
ALTER TABLE `kehoach`
  MODIFY `MaKH` tinyint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `MaLop` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `MaND` tinyint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `thoigian`
--
ALTER TABLE `thoigian`
  MODIFY `MaTG` tinyint(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD CONSTRAINT `baiviet_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `danhmucbv` (`MaDM`);

--
-- Các ràng buộc cho bảng `chitietlhp`
--
ALTER TABLE `chitietlhp`
  ADD CONSTRAINT `chitietlhp_ibfk_1` FOREIGN KEY (`MaLHP`) REFERENCES `lophocphan` (`MaLHP`),
  ADD CONSTRAINT `chitietlhp_ibfk_2` FOREIGN KEY (`MaDD`) REFERENCES `diadiem` (`MaDD`);

--
-- Các ràng buộc cho bảng `chitiet_kh`
--
ALTER TABLE `chitiet_kh`
  ADD CONSTRAINT `chitiet_kh_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `kehoach` (`MaKH`);

--
-- Các ràng buộc cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  ADD CONSTRAINT `giangvien_ibfk_1` FOREIGN KEY (`MaGV`) REFERENCES `nguoidung` (`MaND`),
  ADD CONSTRAINT `giangvien_ibfk_2` FOREIGN KEY (`MaNganh`) REFERENCES `nganhhoc` (`MaNganh`);

--
-- Các ràng buộc cho bảng `gv_monhoc`
--
ALTER TABLE `gv_monhoc`
  ADD CONSTRAINT `gv_monhoc_ibfk_1` FOREIGN KEY (`MaGV`) REFERENCES `giangvien` (`MaGV`),
  ADD CONSTRAINT `gv_monhoc_ibfk_2` FOREIGN KEY (`MaMon`) REFERENCES `monhoc` (`MaMon`);

--
-- Các ràng buộc cho bảng `kehoach`
--
ALTER TABLE `kehoach`
  ADD CONSTRAINT `kehoach_ibfk_1` FOREIGN KEY (`MaLHP`) REFERENCES `lophocphan` (`MaLHP`);

--
-- Các ràng buộc cho bảng `lichtrinh`
--
ALTER TABLE `lichtrinh`
  ADD CONSTRAINT `lichtrinh_ibfk_1` FOREIGN KEY (`MaKH`) REFERENCES `kehoach` (`MaKH`),
  ADD CONSTRAINT `lichtrinh_ibfk_2` FOREIGN KEY (`MaDD`) REFERENCES `diadiem` (`MaDD`),
  ADD CONSTRAINT `lichtrinh_ibfk_3` FOREIGN KEY (`MaGV`) REFERENCES `giangvien` (`MaGV`);

--
-- Các ràng buộc cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD CONSTRAINT `lophocphan_ibfk_1` FOREIGN KEY (`MaGV_MH`) REFERENCES `gv_monhoc` (`MaGV_MH`),
  ADD CONSTRAINT `lophocphan_ibfk_2` FOREIGN KEY (`MaLop`) REFERENCES `lop` (`MaLop`),
  ADD CONSTRAINT `lophocphan_ibfk_3` FOREIGN KEY (`MaTG`) REFERENCES `thoigian` (`MaTG`);

--
-- Các ràng buộc cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`MaNganh`) REFERENCES `nganhhoc` (`MaNganh`);

--
-- Các ràng buộc cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD CONSTRAINT `nguoidung_ibfk_1` FOREIGN KEY (`MaCV`) REFERENCES `chucvu` (`MaCV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
