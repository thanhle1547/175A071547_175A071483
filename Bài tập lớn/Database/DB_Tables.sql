Create Database DH_ThuyLoi
/*
Create Table Khoa (
	Ma int Identity(1, 1),
	TenKhoa nvarchar(30)
)
*/
Create Table NganhHoc (
	MaNganh char(10) Not null Primary key,
	TenNghanh nvarchar(50),
	ChiTiet nvarchar(max)
)
Create Table MonHoc (
	MaMon char(10) Not null Primary key,
	MaNganh char(10),
	TenMon nvarchar(30),
	SoTinChi tinyint,
	ThucHanh bit,
	Foreign Key (MaNganh) References NganhHoc(MaNganh),
)
Create Table GiangVien (
	MaGV int Not null Primary key Identity(1, 1),
	HoTen nvarchar(50) Not null,
	GioiTinh nvarchar(3)
)
Create Table Account_GV (
	MaGV int Not null Primary key,
	Username varchar(20),
	Password varchar(16),
	Foreign Key (MaGV) References GiangVien(MaGV)
)
Create Table Lop (
	MaLop int Not null Primary key Identity(1, 1),
	TenLop nvarchar(30)
)
Create Table ThoiGian (
	MaTG int Not null Primary key Identity(1, 1),
	NamHoc char(10),
	HocKy char(2),
	GiaiDoan char(1),
	TG_BatDau date,
	TG_KetThuc date,
)
Create Table LopHocPhan (
	Ma int Not null Primary key,
	MaMon char(10),
	MaLop int,
	MaTG int,
	NhomTH char(2), -- 0 là lớp lý thuyết, lớp thực hành bắt đầu từ 1
	MaGV int,
	Foreign Key (MaLop) References Lop(MaLop),
	Foreign Key (MaMon) References MonHoc(MaMon),
	Foreign Key (MaTG) References ThoiGian(MaTG),
	Foreign Key (MaGV) References GiangVien(MaGV),
)
Create Table LichTrinh (
	Ma int Not null Primary key Identity(1, 1),
	MaLHP int Not null,
	BaiHoc nvarchar(50),
	DiaDiem varchar(15),
	Thoigian datetime,
	Foreign Key (MaLHP) References LopHocPhan(Ma)
)

Create Table NhanVien (
	MaNV int Not null Primary key Identity(1, 1),
	HoTen nvarchar(50) Not null,
	GioiTinh nvarchar(3),
	ChucVu nvarchar(50)
)
Create Table Account_NV (
	MaNV int Not null Primary key,
	Username varchar(20),
	Password varchar(16),
	Foreign Key (MaNV) References NhanVien(MaNV)
)