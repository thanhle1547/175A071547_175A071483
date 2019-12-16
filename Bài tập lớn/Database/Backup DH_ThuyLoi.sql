-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 16, 2019 lúc 02:19 PM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `DH_ThuyLoi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_gv`
--

CREATE TABLE `account_gv` (
  `MaGV` tinyint(3) UNSIGNED NOT NULL,
  `Username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Password` char(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account_nv`
--

CREATE TABLE `account_nv` (
  `MaNV` tinyint(3) UNSIGNED NOT NULL,
  `Username` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` char(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuctt`
--

CREATE TABLE `danhmuctt` (
  `MaDM` tinyint(3) UNSIGNED NOT NULL,
  `TenDM` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diadiem`
--

CREATE TABLE `diadiem` (
  `MaDD` tinyint(3) UNSIGNED NOT NULL,
  `TenDD` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giangvien`
--

CREATE TABLE `giangvien` (
  `MaGV` tinyint(3) UNSIGNED NOT NULL,
  `HoTen` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GioiTinh` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichtrinh`
--

CREATE TABLE `lichtrinh` (
  `MaLT` tinyint(3) UNSIGNED NOT NULL,
  `MaLHP` tinyint(3) UNSIGNED NOT NULL,
  `MaDD` tinyint(3) UNSIGNED NOT NULL,
  `BaiHoc` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Thoigian` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `MaLop` tinyint(3) UNSIGNED NOT NULL,
  `TenLop` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophocphan`
--

CREATE TABLE `lophocphan` (
  `MaLHP` tinyint(3) UNSIGNED NOT NULL,
  `MaMon` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaLop` tinyint(3) UNSIGNED NOT NULL,
  `MaTG` tinyint(3) UNSIGNED NOT NULL,
  `NhomTH` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `MaGV` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `MaMon` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaNganh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenMon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoTinChi` tinyint(3) UNSIGNED DEFAULT NULL,
  `ThucHanh` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nganhhoc`
--

CREATE TABLE `nganhhoc` (
  `MaNganh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenNghanh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ChiTiet` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` tinyint(3) UNSIGNED NOT NULL,
  `HoTen` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GioiTinh` varchar(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ChucVu` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoigian`
--

CREATE TABLE `thoigian` (
  `MaTG` tinyint(3) UNSIGNED NOT NULL,
  `NamHoc` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HocKy` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiaiDoan` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TG_BatDau` date NOT NULL,
  `TG_KetThuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `MaTin` tinyint(3) UNSIGNED NOT NULL,
  `TieuDe` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TomTat` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `HinhAnh` mediumblob NOT NULL,
  `MoTa` mediumtext COLLATE utf8mb4_unicode_ci,
  `MaDM` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account_gv`
--
ALTER TABLE `account_gv`
  ADD PRIMARY KEY (`MaGV`);

--
-- Chỉ mục cho bảng `account_nv`
--
ALTER TABLE `account_nv`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `danhmuctt`
--
ALTER TABLE `danhmuctt`
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
  ADD PRIMARY KEY (`MaGV`);

--
-- Chỉ mục cho bảng `lichtrinh`
--
ALTER TABLE `lichtrinh`
  ADD PRIMARY KEY (`MaLT`),
  ADD KEY `MaLHP` (`MaLHP`),
  ADD KEY `MaDD` (`MaDD`);

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
  ADD KEY `MaLop` (`MaLop`),
  ADD KEY `MaMon` (`MaMon`),
  ADD KEY `MaTG` (`MaTG`),
  ADD KEY `MaGV` (`MaGV`);

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
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`);

--
-- Chỉ mục cho bảng `thoigian`
--
ALTER TABLE `thoigian`
  ADD PRIMARY KEY (`MaTG`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MaTin`),
  ADD KEY `MaDM` (`MaDM`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuctt`
--
ALTER TABLE `danhmuctt`
  MODIFY `MaDM` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `diadiem`
--
ALTER TABLE `diadiem`
  MODIFY `MaDD` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giangvien`
--
ALTER TABLE `giangvien`
  MODIFY `MaGV` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lichtrinh`
--
ALTER TABLE `lichtrinh`
  MODIFY `MaLT` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `MaLop` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `thoigian`
--
ALTER TABLE `thoigian`
  MODIFY `MaTG` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `MaTin` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account_gv`
--
ALTER TABLE `account_gv`
  ADD CONSTRAINT `account_gv_ibfk_1` FOREIGN KEY (`MaGV`) REFERENCES `giangvien` (`MaGV`);

--
-- Các ràng buộc cho bảng `account_nv`
--
ALTER TABLE `account_nv`
  ADD CONSTRAINT `account_nv_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `lichtrinh`
--
ALTER TABLE `lichtrinh`
  ADD CONSTRAINT `lichtrinh_ibfk_1` FOREIGN KEY (`MaLHP`) REFERENCES `lophocphan` (`MaLHP`),
  ADD CONSTRAINT `lichtrinh_ibfk_2` FOREIGN KEY (`MaDD`) REFERENCES `diadiem` (`MaDD`);

--
-- Các ràng buộc cho bảng `lophocphan`
--
ALTER TABLE `lophocphan`
  ADD CONSTRAINT `lophocphan_ibfk_1` FOREIGN KEY (`MaLop`) REFERENCES `lop` (`MaLop`),
  ADD CONSTRAINT `lophocphan_ibfk_2` FOREIGN KEY (`MaMon`) REFERENCES `monhoc` (`MaMon`),
  ADD CONSTRAINT `lophocphan_ibfk_3` FOREIGN KEY (`MaTG`) REFERENCES `thoigian` (`MaTG`),
  ADD CONSTRAINT `lophocphan_ibfk_4` FOREIGN KEY (`MaGV`) REFERENCES `giangvien` (`MaGV`);

--
-- Các ràng buộc cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD CONSTRAINT `monhoc_ibfk_1` FOREIGN KEY (`MaNganh`) REFERENCES `nganhhoc` (`MaNganh`);

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`MaDM`) REFERENCES `danhmuctt` (`MaDM`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
