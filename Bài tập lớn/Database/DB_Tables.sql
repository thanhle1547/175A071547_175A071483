/*
Create Database DH_ThuyLoi
Create Table Khoa (
	Ma tinyint UNSIGNED UNSIGNED AUTO_INCREMENT,
	TenKhoa varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
)
*/
Create Table NganhHoc (
	MaNganh varchar(10) Not null Primary key,
	TenNghanh varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci Not null, -- utf8 -> utf8mb4
	ChiTiet varchar(1000)
);
Create Table MonHoc (
	MaMon varchar(10) Not null Primary key,
	MaNganh varchar(10) Not null,
	TenMon varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci Not null,
	SoTinChi tinyint(1) UNSIGNED,
	SoTiet tinyint(2) UNSIGNED,
	ThucHanh boolean,
	Foreign Key (MaNganh) References NganhHoc(MaNganh)
);
Create Table GiangVien (
	MaGV tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	HoTen varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci Not null,
	GioiTinh varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
	SDT varchar(10),
	MaNganh varchar(10) Not null,
	Foreign Key (MaNganh) References NganhHoc(MaNganh)
);
Create Table GV_MonHoc (
	MaGV_MH tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	MaGV tinyint UNSIGNED Not null,
	MaMon varchar(10) Not null,
	Foreign key (MaGV) References GiangVien(MaGV),
	Foreign key (MaMon) References MonHoc(MaMon)
);
Create Table Account_GV (
	MaGV tinyint UNSIGNED Not null Primary key,
	Username varchar(20) Not null,
	Password varchar(64) Not null, -- using SHA-256
	Salt varchar(100) Not null,
	ValidationCode varchar(100) Not null,
	Active boolean DEFAULT 0,
	Foreign Key (MaGV) References GiangVien(MaGV)
);
Create Table Lop (
	MaLop tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	TenLop varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci Not null
);
Create Table ThoiGian (
	MaTG tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	NamHoc varchar(9) Not null,
	HocKy char(1) Not null,
	GiaiDoan char(1) Not null,
	TG_BatDau date Not null,
	TG_KetThuc date Not null
);
Create Table LopHocPhan (
	MaLHP tinyint UNSIGNED Not null Primary key,
	MaGV_MH tinyint UNSIGNED Not null,
	MaLop tinyint UNSIGNED Not null,
	MaTG tinyint UNSIGNED Not null,
	NhomTH varchar(2), -- 0 là lớp lý thuyết, lớp thực hành bắt đầu từ 1
	Foreign Key (MaGV_MH) References GV_MonHoc(MaGV_MH),
	Foreign Key (MaLop) References Lop(MaLop),
	Foreign Key (MaTG) References ThoiGian(MaTG)
);
Create Table DiaDiem
(
	MaDD tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	TenDD varchar(20) Not null
);
Create Table LichTrinh (
	MaLT tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	MaLHP tinyint UNSIGNED Not null,
	MaDD tinyint UNSIGNED Not null,
	BaiHoc varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci, 
	Thoigian datetime,
	Foreign Key (MaLHP) References LopHocPhan(MaLHP),
	Foreign key (MaDD) References DiaDiem(MaDD)
);



Create Table NhanVien (
	MaNV tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	HoTen varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci Not null,
	GioiTinh varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
	ChucVu varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci Not null
);
Create Table Account_NV (
	MaNV tinyint UNSIGNED Not null Primary key,
	Username varchar(20) Not null,
	Password varchar(64) Not null,
	Salt varchar(100) Not null,
	ValidationCode varchar(100) Not null,
	Active boolean DEFAULT 0,
	Foreign Key (MaNV) References NhanVien(MaNV)
);


Create Table DanhMucBV (
	MaDM tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	TenDM varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci Not null
);
Create Table BaiViet (
	MaBai tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	TieuDe varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci Not null,
	TomTat varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
	HinhAnh mediumblob, --  ~ 16 megabytes
	NoiDung varchar(21844) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci Not null,
	MaDM tinyint UNSIGNED Not null,
	Foreign Key (MaDM) References DanhMucBV(MaDM)
);