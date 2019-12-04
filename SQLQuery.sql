create database QL
create table khoa
(
Ma int identity(1,1),
TenKhoa nvarchar(30)
);
create table NghanhHoc
(
Ma char(10) not null primary key,
TenNghanh nvarchar(50),
);
create table MonHoc
(
Ma char(10)  not null primary key,
TenMon nvarchar(30),
);
create table GiangVien
(
MaGV int not null primary key identity(1,1),
HoTen nvarchar(50)
);
create table Lop
(
Ma int not null primary key identity(1,1),
TenLop nvarchar(30)
);
create table NH
(
Ma int not null primary key identity(1,1),
NamHoc char(5),
HocKy char(2),
GiaiDoan char(2)
);
create table LopHocPhan
(
Ma int not null primary key,
MaTG int not null,
MaMon char(10),
MaLop int ,
foreign key (MaLop) references Lop(Ma),
foreign key (MaMon) references MonHoc(Ma)
);

create table GiangVien_Lop
(
Ma int not null primary key identity(1,1),
MaGV int not null ,
MaLop int not null,
foreign key (MaGV) references GiangVien(MaGV),
foreign key (MaLop) references LopHocPhan(Ma), 
);
create table LichTrinh
(
Ma int not null primary key identity(1,1),
BaiHoc nvarchar(50),
DiaDiem varchar(15),
Thoigian datetime  ,
MaGVLop int not null ,
foreign key (MaGVLop) references GiangVien_Lop(Ma) 
);

