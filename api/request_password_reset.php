<?php
require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $token = bin2hex(random_bytes(32));
        $expires = date("Y-m-d H:i:s", time() + 3600); // Token berlaku 1 jam

        $update_stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_token_expires_at = ? WHERE id = ?");
        $update_stmt->bind_param("ssi", $token, $expires, $user['id']);
        $update_stmt->execute();
        
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https" : "http";
        $host = $_SERVER['HTTP_HOST'];
        $script_path = dirname($_SERVER['PHP_SELF']);
        // Menghapus '/api' dari path
        $base_path = preg_replace('/\\/api$/', '', $script_path); 
        $reset_link = "{$protocol}://{$host}{$base_path}/reset_password.php?token={$token}";

        // Simpan pesan sukses untuk ditampilkan di halaman login
        $_SESSION['success_message'] = "Link reset password telah dibuat (Simulasi Email). Buka link ini di tab baru: <br><a href='{$reset_link}' target='_blank'>{$reset_link}</a>";
    } else {
        $_SESSION['error_message'] = "Email tidak ditemukan di sistem kami.";
    }
    header("Location: ../forgot_password.php");
    exit();
}