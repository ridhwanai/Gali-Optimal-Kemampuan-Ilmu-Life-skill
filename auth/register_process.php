<?php
// gokill/auth/register_process.php

// PERBAIKAN UTAMA: Menggunakan path yang benar dan andal untuk memuat file config
require_once __DIR__ . '/../config.php';

// Pastikan skrip hanya berjalan jika ada data yang dikirim melalui POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil data dari form
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validasi sederhana: pastikan tidak ada data yang kosong
    if (empty($name) || empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Semua kolom wajib diisi.";
        header("Location: ../register.php");
        exit();
    }

    // Hash password untuk keamanan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Siapkan query SQL untuk memasukkan data
    $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    
    // Bind parameter ke query
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    // Eksekusi query dan cek hasilnya
    if ($stmt->execute()) {
        // Jika berhasil, kirim pesan sukses dan arahkan ke halaman login
        $_SESSION['success_message'] = "Registrasi berhasil! Silakan masuk.";
        header("Location: ../login.php");
        exit();
    } else {
        // Jika gagal (misalnya email sudah terdaftar), kirim pesan error
        $_SESSION['error_message'] = "Registrasi gagal. Email mungkin sudah terdaftar.";
        header("Location: ../register.php");
        exit();
    }

    // Tutup statement
    $stmt->close();
    // Tutup koneksi
    $conn->close();
}
?>