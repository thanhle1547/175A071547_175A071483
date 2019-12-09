Create Database DH_ThuyLoi
/*
Create Table Khoa (
	Ma int Identity(1, 1),
	TenKhoa varchar(30) CHARSET utf8
)
*/
Create Table NganhHoc (
	MaNganh varchar(10) Not null Primary key,
	TenNghanh varchar(50) CHARSET utf8,
	ChiTiet varchar(21844)
)
Create Table MonHoc (
	MaMon varchar(10) Not null Primary key,
	MaNganh varchar(10),
	TenMon varchar(30) CHARSET utf8,
	SoTinChi tinyint,
	ThucHanh bit,
	Foreign Key (MaNganh) References NganhHoc(MaNganh),
)
Create Table GiangVien (
	MaGV int Not null Primary key Identity(1, 1),
	HoTen varchar(50) Not null CHARSET utf8,
	GioiTinh varchar(3) CHARSET utf8
)
Create Table Account_GV (
	MaGV int Not null Primary key,
	Username varchar(20),
	Password varchar(16),
	Foreign Key (MaGV) References GiangVien(MaGV)
)
Create Table Lop (
	MaLop int Not null Primary key Identity(1, 1),
	TenLop varchar(30) CHARSET utf8
)
Create Table ThoiGian (
	MaTG int Not null Primary key Identity(1, 1),
	NamHoc varchar(10),
	HocKy varchar(2),
	GiaiDoan char(1),
	TG_BatDau date,
	TG_KetThuc date,
)
Create Table LopHocPhan (
	Ma int Not null Primary key,
	MaMon varchar(10),
	MaLop int,
	MaTG int,
	NhomTH varchar(2), -- 0 là lớp lý thuyết, lớp thực hành bắt đầu từ 1
	MaGV int,
	Foreign Key (MaLop) References Lop(MaLop),
	Foreign Key (MaMon) References MonHoc(MaMon),
	Foreign Key (MaTG) References ThoiGian(MaTG),
	Foreign Key (MaGV) References GiangVien(MaGV),
)
create Table DiaDiem
(
MaDD int not null Primary key identity(1,1),
Ten varchar(20)
)
Create Table LichTrinh (
	Ma int Not null Primary key Identity(1, 1),
	MaLHP int Not null,
	MaDD int ,
	BaiHoc varchar(50) CHARSET utf8, 
	Thoigian datetime,
	Foreign Key (MaLHP) References LopHocPhan(Ma),
	foreign key (MaDD) References DiaDiem(MaDD)
)

Create Table NhanVien (
	MaNV int Not null Primary key Identity(1, 1),
	HoTen varchar(50) Not null CHARSET utf8,
	GioiTinh varchar(3) CHARSET utf8,
	ChucVu varchar(50) CHARSET utf8
)
Create Table Account_NV (
	MaNV int Not null Primary key,
	Username varchar(20),
	Password varchar(16),
	Foreign Key (MaNV) References NhanVien(MaNV)
)
