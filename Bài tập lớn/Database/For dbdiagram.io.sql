/*
Create Database DH_ThuyLoi
*/
Create Table NganhHoc (
	MaNganh varchar(10) Not null Primary key,
	TenNghanh varchar(50)Not null, -- utf8 -> utf8mb4
	ChiTiet varchar(1000)
);
Create Table MonHoc (
	MaMon varchar(10) Not null Primary key,
	MaNganh varchar(10) Not null,
	TenMon varchar(30)Not null,
	Foreign Key (MaNganh) References NganhHoc(MaNganh)
);

Create Table ChucVu (
    MaCV tinyint(10) UNSIGNED Not null,
    ChucVu varchar(10)Not null
);
Create Table NguoiDung (
	MaND tinyint(20) UNSIGNED Not null Primary key AUTO_INCREMENT,
	HoTen varchar(50)Not null,
	GioiTinh varchar(3) ,
	SDT varchar(10),
    Username varchar(20) Not null,
	Password varchar(64) Not null, -- using SHA-256
	Salt varchar(100) Not null,
	ValidationCode varchar(100) Not null,
	Active boolean DEFAULT 0,
    MaCV tinyint(10) UNSIGNED Not null,
	Foreign Key (MaCV) References ChucVu(MaCV)
);
Create Table GiangVien (
	MaGV tinyint(10) UNSIGNED Not null Primary key,
	MaNganh varchar(10) Not null,
	Foreign Key (MaGV) References NguoiDung(MaND),
	Foreign Key (MaNganh) References NganhHoc(MaNganh)
);

Create Table GV_MonHoc (
	MaGV_MH tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	MaGV tinyint UNSIGNED Not null,
	MaMon varchar(10) Not null,
	Foreign key (MaGV) References GiangVien(MaGV),
	Foreign key (MaMon) References MonHoc(MaMon)
);
Create Table Lop (
	MaLop tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	TenLop varchar(30)Not null
);

Create Table ThoiGian (
	MaTG tinyint(10) UNSIGNED Not null Primary key AUTO_INCREMENT,
	NamHoc varchar(9) Not null,
	HocKy char(1) Not null,
	GiaiDoan char(1) Not null,
	TG_BatDau date Not null,
	TG_KetThuc date Not null
);
Create Table Tiet (
	MaTiet tinyint(2) UNSIGNED Not null Primary key,
	ThoiGian time Not null,
);
Create Table DiaDiem
(
	MaDD tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	TenDD varchar(20) Not null
);

Create Table LopHocPhan (
	MaLHP tinyint(100) UNSIGNED Not null Primary key,
	MaGV_MH tinyint UNSIGNED Not null,
	MaLop tinyint UNSIGNED Not null,
	MaTG tinyint(10) UNSIGNED Not null,
-- vì lớp thực hành có thời gian lệch với lớp lý thuyết nhưng vẫn phải nằm trong thời gian được định trong bảng ThoiGian
	TG_BatDau date DEFAULT null,
	TG_KetThuc date DEFAULT null,
-- lớp thực hành ko cần phải điền số tín chỉ
    SoTinChi tinyint(1) UNSIGNED null,
	LoaiLop Not null ,
	Nhom tinyint(1) UNSIGNED Not null, -- 0 là lớp lý thuyết, lớp thực hành bắt đầu từ 1
	Foreign Key (MaGV_MH) References GV_MonHoc(MaGV_MH),
	Foreign Key (MaLop) References Lop(MaLop),
	Foreign Key (MaTG) References ThoiGian(MaTG)
);
Create Table ChiTietLHP (
	MaLHP tinyint(100) UNSIGNED Not null Primary key,
	Thu tinyint(1) UNSIGNED Not null,
-- so với các bản ghi khác có bị trùng địa điểm/tiết ko  ->> trigger insert, update
	MaDD tinyint UNSIGNED Not null, 
	MaTiet varchar(10) Not null, -- là 1 chuỗi vd: '7,8,9', cắt ra để kiểm tra
	Foreign key (MaDD) References DiaDiem(MaDD),
	Foreign key (MaTiet) References Tiet(MaTiet)
);

Create Table KeHoach (
	MaKH tinyint(100) UNSIGNED Not null Primary key AUTO_INCREMENT,
	MaLHP tinyint UNSIGNED Not null,
-- lớp có thời gian học kéo dài trong cả 2 giai đoạn
    SoTuan tinyint(2) UNSIGNED Not null,
	SoTiet tinyint(2) UNSIGNED Not null,
	Foreign Key (MaLHP) References LopHocPhan(MaLHP),
);
Create Table ChiTiet_KH (
	MaKH tinyint(100) UNSIGNED Not null Primary key,
-- so với tổng số tuần	->> trigger insert, update
	Tuan tinyint(2) UNSIGNED Not null,
-- kiểm tra ngày có đúng vào thứ như ChiTietLHP
	Ngay date Not null,
	NoiDung varchar(500) , -- nd theo kế hoạch
-- so với tổng số tiết	->> trigger insert, update
	SoTiet tinyint(1) UNSIGNED,
	Foreign key (MaKH) References KeHoach(MaKH)
);
Create Table LichTrinh (
	MaKH tinyint(100) UNSIGNED Not null Primary key,
	Tuan tinyint(2) UNSIGNED DEFAULT null,
	Ngay date DEFAULT null,
	MaDD tinyint UNSIGNED DEFAULT null,
	MaTiet varchar(10) DEFAULT null,
	NoiDung varchar(500), -- nd theo thực tế
	TinhHinhLop varchar(500),
	TrangThai DEFAULT null ,
	MaGV tinyint(10) DEFAULT null, -- cho lóp học bù
	Foreign Key (MaKH) References KeHoach(MaKH),
	Foreign key (MaDD) References DiaDiem(MaDD),
	Foreign key (MaTiet) References Tiet(MaTiet),
	Foreign key (MaGV) References GiangVien(MaGV),
);



Create Table DanhMucBV (
	MaDM tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	TenDM varchar(120)Not null
);
Create Table BaiViet (
	MaBai tinyint UNSIGNED Not null Primary key AUTO_INCREMENT,
	TieuDe varchar(120)Not null,
	TomTat varchar(500) ,
	HinhAnh mediumblob, --  ~ 16 megabytes
	NoiDung varchar(21844)Not null,
	MaDM tinyint UNSIGNED Not null,
	Foreign Key (MaDM) References DanhMucBV(MaDM)
);