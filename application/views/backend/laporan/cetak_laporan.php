<?php
// ============================
// KONFIGURASI DATABASE
// ============================
$host = "localhost";
$user = "root";
$pass = "";
$db   = "laundry";

// ============================
// KONEKSI MYSQL
// ============================
$conn = new mysqli($host, $user, $pass);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// ============================
// BUAT DATABASE
// ============================
$sql_db = "CREATE DATABASE IF NOT EXISTS laundry";
if ($conn->query($sql_db) === TRUE) {
    echo "Database berhasil dibuat<br>";
} else {
    die("Gagal buat database: " . $conn->error);
}

// pilih database
$conn->select_db($db);

// ============================
// BUAT TABEL KONSUMEN
// ============================
$sql_konsumen = "
CREATE TABLE IF NOT EXISTS konsumen (
    kode_konsumen VARCHAR(10) NOT NULL,
    nama_konsumen VARCHAR(100) NOT NULL,
    alamat_konsumen TEXT NOT NULL,
    no_telp VARCHAR(20) NOT NULL,
    PRIMARY KEY (kode_konsumen)
) ENGINE=InnoDB;
";

$conn->query($sql_konsumen);

// ============================
// ISI DATA KONSUMEN
// ============================
$conn->query("
INSERT IGNORE INTO konsumen VALUES
('K001','alfian','bantul','0827681'),
('K003','safa','bantul','289487624'),
('K004','wahyu','sleman','28794363928'),
('K005','dika','pwj','39825785')
");

// ============================
// BUAT TABEL USERS
// ============================
$sql_users = "
CREATE TABLE IF NOT EXISTS users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;
";

$conn->query($sql_users);

// ============================
// ISI DATA USERS
// ============================
$conn->query("
INSERT IGNORE INTO users (id_user, username, password)
VALUES (1, 'admin', MD5('1234'))
");

// ============================
// SELESAI
// ============================
echo "<br>Install database laundry BERHASIL ✅";

$conn->close();
