<?php
require_once __DIR__ . '/../config.php';

// Pastikan hanya user yang login yang bisa akses
if (!isset($_SESSION['user_id'])) {
    die("Akses ditolak.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['plan'])) {
    $user_id = $_SESSION['user_id'];
    $plan_name = $_POST['plan'];

    // Hanya proses jika plannya 'pro'
    if ($plan_name === 'pro') {
        $new_status = 'Premium';
        // Set tanggal kedaluwarsa 30 hari dari sekarang
        $expiry_date = date('Y-m-d H:i:s', strtotime('+30 days'));

        // Update data di tabel users
        $stmt = $conn->prepare("UPDATE users SET subscription_status = ?, subscription_expires_at = ? WHERE id = ?");
        $stmt->bind_param("ssi", $new_status, $expiry_date, $user_id);
        
        if ($stmt->execute()) {
            // Jika berhasil, buat pesan sukses dan arahkan ke halaman utama
            $_SESSION['payment_success'] = "Pembayaran berhasil! Anda sekarang adalah pengguna Pro.";
            header("Location: ../index.php");
            exit();
        } else {
            die("Gagal memperbarui status langganan.");
        }
    }
}

// Jika ada yang salah, kembalikan ke halaman harga
header("Location: ../subscribe.php");
exit();
?>