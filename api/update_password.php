<?php
require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $token = $_POST['token'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    if (empty($password) || $password !== $password_confirm) {
        $_SESSION['error_message'] = 'Password tidak cocok atau kosong. Coba lagi.';
        header("Location: ../reset_password.php?token=$token");
        exit();
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_token_expires_at > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $update_stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_token_expires_at = NULL WHERE id = ?");
        $update_stmt->bind_param("si", $hashed_password, $user['id']);
        $update_stmt->execute();
        
        $_SESSION['success_message'] = "Password Anda telah berhasil diubah. Silakan masuk.";
        header("Location: ../login.php");
        exit();
    } else {
        $_SESSION['error_message'] = 'Token tidak valid atau sudah kedaluwarsa. Silakan minta link baru.';
        header("Location: ../forgot_password.php");
        exit();
    }
}