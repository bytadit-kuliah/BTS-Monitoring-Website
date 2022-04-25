CREATE DATABASE BTS;

USE BTS;

CREATE TABLE USER(
	Id_User INT PRIMARY KEY auto_increment NOT NULL,
    Username VARCHAR(50) NOT NULL,
    Email VARCHAR(255),
    Password VARCHAR(255),
    Role_User VARCHAR(255) NOT NULL,
    CONSTRAINT uname_unique UNIQUE(Username),
    CONSTRAINT email_unique UNIQUE(Email)
);

CREATE TABLE KONFIGURASI(
	Id_Konfigurasi INT PRIMARY KEY auto_increment NOT NULL,
    Nama_Konfigurasi VARCHAR(255),
    Value VARCHAR(255),
    Waktu_Buat_Config DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    Waktu_Edit_Config TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE ADMIN(
	Id_User INT NOT NULL,
    Username VARCHAR(50) NOT NULL,
	Id_Admin INT auto_increment PRIMARY KEY NOT NULL,
    Foto_Admin VARCHAR(255),
    Nama_Depan VARCHAR(255),
    Nama_Belakang VARCHAR(255),
    Email_Admin VARCHAR(255),
    Alamat TEXT,
    FOREIGN KEY(Id_User) REFERENCES USER(Id_User),
    FOREIGN KEY(Username) REFERENCES USER(Username),
    FOREIGN KEY(Email_Admin) REFERENCES USER(Email)
);

CREATE TABLE SURVEYOR(
	Id_User INT NOT NULL,
    Username VARCHAR(50) NOT NULL,
	Id_Surveyor INT auto_increment PRIMARY KEY NOT NULL,
    Foto_Surveyor VARCHAR(255),
    Nama_Depan VARCHAR(255),
    Nama_Belakang VARCHAR(255),
    Email_Surveyor VARCHAR(255),
    Alamat TEXT,
    Jumlah_Survey INT,
    -- Riwayat_Survey INT, Dibuat button sj, pakai method GET, dgn key Id_Surveyor
    Id_Pembuat_Data INT NOT NULL,
    FOREIGN KEY(Id_User) REFERENCES USER(Id_User),
	FOREIGN KEY(Username) REFERENCES USER(Username),
    FOREIGN KEY(Email_Surveyor) REFERENCES USER(Email),
    FOREIGN KEY(Id_Pembuat_Data) REFERENCES ADMIN(Id_Admin)
);

CREATE TABLE USER_LOG(
	Id_Log INT PRIMARY KEY auto_increment NOT NULL,
    Id_User INT NOT NULL,
    Username VARCHAR(50) NOT NULL,
    Waktu_Login TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY(Id_User) REFERENCES USER(Id_User),
    FOREIGN KEY(Username) REFERENCES USER(Username)
);

-- Satu Survey punya bbrp pertanyaan, satu pertanyaan punya bbbrp pil.jawaban

CREATE TABLE SURVEY(
	Id_Survey INT PRIMARY KEY auto_increment NOT NULL,
    Topik_Survey VARCHAR(255),
    Deskripsi_Survey TEXT,
    Waktu_Dibuat TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Id_Pembuat INT NOT NULL,
    FOREIGN KEY(Id_Pembuat) REFERENCES ADMIN(Id_Admin)
);

CREATE TABLE PERTANYAAN(
	Id_Pertanyaan INT PRIMARY KEY auto_increment NOT NULL,
    Isi_Pertanyaan TEXT,
    Id_Survey INT NOT NULL,
    FOREIGN KEY(Id_Survey) REFERENCES SURVEY(Id_Survey)
);

CREATE TABLE PILIHAN_JAWABAN(
	Id_Pil_Jwb INT PRIMARY KEY auto_increment NOT NULL,
    Pilihan_Jawaban TEXT,
    Id_Pertanyaan INT NOT NULL,
    FOREIGN KEY(Id_Pertanyaan) REFERENCES PERTANYAAN(Id_Pertanyaan)
);

CREATE TABLE JENIS_BTS(
	Id_Jenis_BTS CHAR(10) PRIMARY KEY NOT NULL,
    Jenis_BTS VARCHAR(50)
);

CREATE TABLE PEMILIK(
	Id_Pemilik INT PRIMARY KEY auto_increment NOT NULL,
    Foto_Pemilik VARCHAR(255),
    Nama_Pemilik VARCHAR(255),
    Alamat_Pemilik TEXT,
    NoTelp_Pemilik VARCHAR(100)
);

CREATE TABLE KECAMATAN(
	Id_Kecamatan INT PRIMARY KEY auto_increment NOT NULL,
    Nama_Kecamatan VARCHAR(255)
);

CREATE TABLE DESA(
	Id_Desa INT PRIMARY KEY auto_increment NOT NULL,
    Nama_Desa VARCHAR(255),
    Id_Kecamatan INT NOT NULL,
    FOREIGN KEY(Id_Kecamatan) REFERENCES KECAMATAN(Id_Kecamatan)
);

CREATE TABLE BTS(
	Id_BTS INT PRIMARY KEY auto_increment NOT NULL,
    Id_Jenis_BTS CHAR(10) NOT NULL,
    Nama_BTS VARCHAR(255),
    Id_Desa INT NOT NULL,
    Lokasi_BTS TEXT,
    Id_Pemilik_BTS INT NOT NULL,
    Panjang_Tanah FLOAT(6,2),
    Lebar_Tanah FLOAT(6,2),
    Latitude FLOAT(10,6),
    Longitude FLOAT(11,6),
    Tinggi_Tower FLOAT(6,2),
    Ada_Genset BOOL,
    Ada_Tembok_Batas BOOL,
    Waktu_Info_Dibuat TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Id_Pembuat_Info INT NOT NULL,
    FOREIGN KEY(Id_Pemilik_BTS) REFERENCES PEMILIK(Id_Pemilik),
    FOREIGN KEY(Id_Pembuat_Info) REFERENCES ADMIN(Id_Admin),
    FOREIGN KEY(Id_Desa) REFERENCES DESA(Id_Desa),
    FOREIGN KEY(Id_Jenis_BTS) REFERENCES JENIS_BTS(Id_Jenis_BTS)
);

CREATE TABLE BTS_FOTO(
	Id_Foto_BTS INT PRIMARY KEY auto_increment NOT NULL,
    Path_Foto VARCHAR(255),
    Id_BTS INT NOT NULL,
    FOREIGN KEY(Id_BTS) REFERENCES BTS(Id_BTS)
);

CREATE TABLE MONITORING(
	Id_Monitoring INT PRIMARY KEY auto_increment NOT NULL,
    Tahun_Monitoring YEAR,
    -- Waktu_Generate DATETIME,
    Waktu_Kunjungan DATETIME NOT NULL,
    Id_BTS INT NOT NULL,
    Id_Surveyor INT NOT NULL,
    FOREIGN KEY(Id_BTS) REFERENCES BTS(Id_BTS),
    FOREIGN KEY(Id_Surveyor) REFERENCES SURVEYOR(Id_Surveyor)
);

CREATE TABLE JAWABAN_SURVEY(
    Id_Jawaban INT PRIMARY KEY auto_increment NOT NULL,
    Id_Surveyor INT NOT NULL,
    Id_Survey INT NOT NULL,
    Id_Monitoring INT NOT NULL,
    Jawaban_Survey INT,
    Waktu_Buat TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(Id_Survey) REFERENCES SURVEY(Id_Survey),
    FOREIGN KEY(Id_Surveyor) REFERENCES SURVEYOR(Id_Surveyor),
    FOREIGN KEY(Id_Monitoring) REFERENCES MONITORING(Id_Monitoring),
    FOREIGN KEY(Jawaban_Survey) REFERENCES PILIHAN_JAWABAN(Id_Pil_Jwb)
);

CREATE TABLE RIWAYAT_SURVEY(
	Id_Riwayat_Survey INT PRIMARY KEY auto_increment NOT NULL,
    Id_Surveyor INT NOT NULL,
    Id_Survey INT NOT NULL,
    Status VARCHAR(50), -- selesai atau belum, selesai msih bisa diedit
    Waktu_Diedit TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, -- kapan terakhir kali diedit
    FOREIGN KEY(Id_Surveyor) REFERENCES SURVEYOR(Id_Surveyor),
    FOREIGN KEY(Id_Survey) REFERENCES SURVEY(Id_Survey)
);

CREATE TABLE EDIT_SURVEY(
    Waktu_Diedit TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Id_Editor INT NOT NULL,
    Id_Survey INT NOT NULL,
    FOREIGN KEY(Id_Editor) REFERENCES ADMIN(Id_Admin),
    FOREIGN KEY(Id_Survey) REFERENCES SURVEY(Id_Survey)
);

CREATE TABLE EDIT_JAWABAN(
	Waktu_Diedit TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Id_Editor INT NOT NULL,
    Id_Jawaban_Diedit INT NOT NULL,
    FOREIGN KEY(Id_Editor) REFERENCES SURVEYOR(Id_Surveyor),
    FOREIGN KEY(Id_Jawaban_Diedit) REFERENCES JAWABAN_SURVEY(Id_Jawaban)
);

CREATE TABLE EDIT_BTS(
	Waktu_Diedit TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Id_Editor INT NOT NULL,
    Id_BTS_edit INT NOT NULL,
    FOREIGN KEY(Id_Editor) REFERENCES ADMIN(Id_Admin),
    FOREIGN KEY(Id_BTS_edit) REFERENCES BTS(Id_BTS)
);
