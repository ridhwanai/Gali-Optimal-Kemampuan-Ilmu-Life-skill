<?php
// gokill/config.php
$servername = "localhost";
$username = "root"; // Ganti jika berbeda
$password = "";     // Ganti jika berbeda
$dbname = "gokill_db";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

// Mulai session jika belum ada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>