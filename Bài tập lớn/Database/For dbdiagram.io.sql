Create Table NganhHoc (
	MaNganh varchar(10) Not null Primary key,
	TenNghanh varchar(50) Not null, -- utf8 -> utf8mb4
	ChiTiet varchar(21844)
);
Create Table MonHoc (
	MaMon varchar(10) Not null Primary key,
	MaNganh varchar(10) Not null,
	TenMon varchar(30) Not null,
	SoTinChi tinyint UNSIGNED,
	ThucHanh boolean,
	Foreign Key (MaNganh) References NganhHoc(MaNganh)
);
Create Table GiangVien (
	MaGV tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	HoTen varchar(50) Not null,
	GioiTinh varchar(3)
);
Create Table Account_GV (
	MaGV tinyint UNSIGNED Not null Primary key,
	Username varchar(20) Not null,
	Password char(64) Not null, -- using SHA-256
	Foreign Key (MaGV) References GiangVien(MaGV)
);
Create Table Lop (
	MaLop tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	TenLop varchar(30) Not null
);
Create Table ThoiGian (
	MaTG tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	NamHoc varchar(9) Not null,
	HocKy varchar(1) Not null,
	GiaiDoan char(1) Not null,
	TG_BatDau date Not null,
	TG_KetThuc date Not null
);
Create Table LopHocPhan (
	MaLHP tinyint UNSIGNED Not null Primary key,
	MaMon varchar(10) Not null,
	MaLop tinyint UNSIGNED Not null,
	MaTG tinyint UNSIGNED Not null,
	NhomTH varchar(2), -- 0 là lớp lý thuyết, lớp thực hành bắt đầu từ 1
	MaGV tinyint UNSIGNED Not null,
	Foreign Key (MaLop) References Lop(MaLop),
	Foreign Key (MaMon) References MonHoc(MaMon),
	Foreign Key (MaTG) References ThoiGian(MaTG),
	Foreign Key (MaGV) References GiangVien(MaGV)
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
	BaiHoc varchar(50) , 
	Thoigian datetime,
	Foreign Key (MaLHP) References LopHocPhan(MaLHP),
	Foreign key (MaDD) References DiaDiem(MaDD)
);


Create Table NhanVien (
	MaNV tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	HoTen varchar(25) Not null,
	GioiTinh varchar(3) ,
	ChucVu varchar(25) 
);
Create Table Account_NV (
	MaNV tinyint UNSIGNED Not null Primary key,
	Username varchar(20),
	Password char(64),
	Foreign Key (MaNV) References NhanVien(MaNV)
);


Create Table DanhMucTT (
	MaDM tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	TenDM varchar(120) Not null
);
Create Table BaiViet (
	MaBai tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	TieuDe varchar(120) Not null,
	TomTat varchar(500) ,
	HinhAnh mediumblob Not null, --  ~ 16 megabytes
	MoTa varchar(21844) ,
	MaDM tinyint UNSIGNED Not null,
	Foreign Key (MaDM) References DanhMucTT(MaDM)
);