CREATE DATABASE MONITOR_BTS;

USE MONITOR_BTS;

CREATE TABLE ADMIN(
	Id_Admin CHAR(5) PRIMARY KEY NOT NULL,
    Nama_Admin VARCHAR(255),
    Email_Admin NVARCHAR(255),
    Foto_Admin VARCHAR(255)
);

CREATE TABLE SURVEYOR(
	Id_Surveyor INT auto_increment PRIMARY KEY NOT NULL,
    Nama_Surveyor VARCHAR(255),
    Email_Surveyor NVARCHAR(255),
    Foto_Surveyor VARCHAR(255),
    -- Riwayat_Survey VARCHAR(255),
    Jumlah_Survey INT,
    Id_Pembuat_Data CHAR(5) NOT NULL,
    FOREIGN KEY(Id_Pembuat_Data) REFERENCES ADMIN(Id_Admin)
);

CREATE TABLE KUESIONER(
	Id_Kuesioner INT PRIMARY KEY auto_increment NOT NULL,
    Topik_Kuesioner VARCHAR(255),
    Deskripsi_Kuesioner TEXT,
    Waktu_Dibuat DATETIME NOT NULL,
    Id_Pembuat CHAR(5) NOT NULL,
    FOREIGN KEY(Id_Pembuat) REFERENCES ADMIN(Id_Admin)
);

CREATE TABLE PERTANYAAN(
	Id_Pertanyaan INT PRIMARY KEY auto_increment NOT NULL,
    Isi_Pertanyaan TEXT,
    Id_Kuesioner INT NOT NULL,
    FOREIGN KEY(Id_Kuesioner) REFERENCES KUESIONER(Id_Kuesioner)
);

CREATE TABLE PILIHAN_JAWABAN(
	Id_Pil_Jwb INT PRIMARY KEY auto_increment NOT NULL,
    Pilihan_Jawaban TEXT,
    Id_Kuesioner INT NOT NULL,
    FOREIGN KEY(Id_Kuesioner) REFERENCES KUESIONER(Id_Kuesioner)
);

CREATE TABLE LOGIN(
	Id_Log INT PRIMARY KEY auto_increment NOT NULL,
    Waktu_Login DATETIME NOT NULL,
    Id_Admin CHAR(5) NULL,
    Id_Surveyor INT NULL,
    FOREIGN KEY(Id_Admin) REFERENCES ADMIN(Id_Admin),
    FOREIGN KEY(Id_Surveyor) REFERENCES SURVEYOR(Id_Surveyor)
);

CREATE TABLE PASSWORD(
	Id_Password INT PRIMARY KEY auto_increment NOT NULL,
    Password NVARCHAR(50) NOT NULL,
    Id_Admin CHAR(5) NULL,
    Id_Surveyor INT NULL,
    FOREIGN KEY(Id_Admin) REFERENCES ADMIN(Id_Admin),
    FOREIGN KEY(Id_Surveyor) REFERENCES SURVEYOR(Id_Surveyor)
);

CREATE TABLE JENIS_BTS(
	Id_Jenis_BTS CHAR(10) PRIMARY KEY NOT NULL,
    Jenis_BTS VARCHAR(50)
);

CREATE TABLE PEMILIK(
	Id_Pemilik INT PRIMARY KEY auto_increment NOT NULL,
    Nama_Pemilik VARCHAR(255),
    Alamat_Pemilik TEXT,
    NoTelp_Pemilik VARCHAR(100),
    Foto_Pemilik VARCHAR(255)
);

CREATE TABLE PARENT_WILAYAH(
	Id_Parent INT PRIMARY KEY auto_increment NOT NULL,
    Nama_Kecamatan VARCHAR(255)
);

CREATE TABLE WILAYAH(
	Id_Wilayah INT PRIMARY KEY auto_increment NOT NULL,
    Nama_Wilayah VARCHAR(255),
    -- Level_Wilayah INT,
    Id_Parent_Wilayah INT NOT NULL,
    FOREIGN KEY(Id_Parent_Wilayah) REFERENCES PARENT_WILAYAH(Id_Parent)
);

CREATE TABLE INFO_BTS(
	Id_BTS INT PRIMARY KEY auto_increment NOT NULL,
    Id_Jenis_BTS CHAR(10) NOT NULL,
    Nama_BTS VARCHAR(255),
    Lokasi_BTS TEXT,
    Panjang_Tanah FLOAT(6,2),
    Lebar_Tanah FLOAT(6,2),
    Latitude FLOAT(10,6),
    Longitude FLOAT(11,6),
    Tinggi_Tower FLOAT(6,2),
    Ada_Genset BOOL,
    Ada_Tembok_Batas BOOL,
    Waktu_Dibuat_Info DATETIME,
    Id_Pemilik_BTS INT NOT NULL,
    Id_Pembuat_Info CHAR(5) NOT NULL,
    Id_Wilayah INT NOT NULL,
    FOREIGN KEY(Id_Pemilik_BTS) REFERENCES PEMILIK(Id_Pemilik),
    FOREIGN KEY(Id_Pembuat_Info) REFERENCES ADMIN(Id_Admin),
    FOREIGN KEY(Id_Wilayah) REFERENCES WILAYAH(Id_Wilayah),
    FOREIGN KEY(Id_Jenis_BTS) REFERENCES JENIS_BTS(Id_Jenis_BTS)
);

CREATE TABLE BTS_FOTO(
	Id_Foto_BTS INT PRIMARY KEY auto_increment NOT NULL,
    Path_Foto VARCHAR(255),
    Id_BTS INT NOT NULL,
    FOREIGN KEY(Id_BTS) REFERENCES INFO_BTS(Id_BTS)
);

CREATE TABLE MONITORING(
	Id_Monitoring INT PRIMARY KEY auto_increment NOT NULL,
    Tahun_Monitoring YEAR,
    -- Waktu_Generate DATETIME,
    Waktu_Kunjungan DATETIME,
    Id_BTS INT NOT NULL,
    Id_Surveyor INT NOT NULL,
    FOREIGN KEY(Id_BTS) REFERENCES INFO_BTS(Id_BTS),
    FOREIGN KEY(Id_Surveyor) REFERENCES SURVEYOR(Id_Surveyor)
);

CREATE TABLE JAWABAN_KUESIONER(
	Id_Jawaban INT PRIMARY KEY auto_increment NOT NULL,
    Jawaban_Kuesioner INT,
    Waktu_Buat DATETIME NOT NULL,
    Id_Kuesioner INT NOT NULL,
    Id_Surveyor INT NOT NULL,
    Id_Monitoring INT NOT NULL,
    FOREIGN KEY(Id_Kuesioner) REFERENCES KUESIONER(Id_Kuesioner),
    FOREIGN KEY(Id_Surveyor) REFERENCES SURVEYOR(Id_Surveyor),
    FOREIGN KEY(Id_Monitoring) REFERENCES MONITORING(Id_Monitoring),
    FOREIGN KEY(Jawaban_Kuesioner) REFERENCES PILIHAN_JAWABAN(Id_Pil_Jwb)
);

CREATE TABLE EDIT_KUESIONER(
    Waktu_Diedit DATETIME PRIMARY KEY NOT NULL,
    Id_Editor CHAR(5) NOT NULL,
    Id_Kuesioner INT NOT NULL,
    FOREIGN KEY(Id_Editor) REFERENCES ADMIN(Id_Admin),
    FOREIGN KEY(Id_Kuesioner) REFERENCES KUESIONER(Id_Kuesioner)
);

CREATE TABLE EDIT_JAWABAN(
	Waktu_Diedit DATETIME PRIMARY KEY NOT NULL,
    Id_Editor INT NOT NULL,
    Id_Jawaban_Diedit INT NOT NULL,
    FOREIGN KEY(Id_Editor) REFERENCES SURVEYOR(Id_Surveyor),
    FOREIGN KEY(Id_Jawaban_Diedit) REFERENCES JAWABAN_KUESIONER(Id_Jawaban)
);

CREATE TABLE EDIT_INFO_BTS(
	Waktu_Diedit DATETIME PRIMARY KEY NOT NULL,
    Id_Editor CHAR(5) NOT NULL,
    Id_BTS_edit INT NOT NULL,
    FOREIGN KEY(Id_Editor) REFERENCES ADMIN(Id_Admin),
    FOREIGN KEY(Id_BTS_edit) REFERENCES INFO_BTS(Id_BTS)
);

CREATE TABLE KONFIGURASI(
	Id_Konfigurasi CHAR(10) PRIMARY KEY NOT NULL,
    Nama_Konfigurasi VARCHAR(255),
    Value_Konfigurasi VARCHAR(255),
    Waktu_Buat_Config DATETIME NOT NULL, 
    Waktu_Edit_Config DATETIME
);
