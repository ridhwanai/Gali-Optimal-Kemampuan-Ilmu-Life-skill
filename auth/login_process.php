<?php
// Ganti path include yang salah
require_once __DIR__ . '/../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Cek koneksi sebelum digunakan
    if ($conn) {
        $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header("Location: ../index.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Email atau password salah.";
                header("Location: ../login.php");
                exit();
            }
        } else {
            $_SESSION['error_message'] = "Email atau password salah.";
            header("Location: ../login.php");
            exit();
        }
        $stmt->close();
        $conn->close();
    } else {
        // Jika koneksi gagal total
        die("Koneksi ke database gagal. Periksa file config.php.");
    }
}
?>