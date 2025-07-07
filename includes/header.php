<?php
// gokill/includes/header.php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GoKill - Gali Optimal Kemampuan & Ilmu Life-skill</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 navbar-glass">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php" style="font-size: 1.5rem;">
        &lt;> GoKill
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="index.php">Beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="courses.php">Kursus</a></li>
          <li class="nav-item"><a class="nav-link" href="projects.php">Proyek</a></li>
          <li class="nav-item"><a class="nav-link" href="community.php">Komunitas</a></li>
          <li class="nav-item"><a class="nav-link" href="subscribe.php">Harga</a></li>
        </ul>
        <ul class="navbar-nav align-items-center">
          <?php if (isset($_SESSION['user_id'])): ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Hi, <?= htmlspecialchars($_SESSION['user_name']) ?>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="index.php">Dasbor</a></li>
                <li><a class="dropdown-item" href="ai_assistant.php">Asisten AI</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li><a class="dropdown-item" href="auth/logout.php">Keluar</a></li>
              </ul>
            </li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="login.php">Masuk</a></li>
            <li class="nav-item"><a class="btn btn-primary ms-2" href="register.php">Mulai Belajar</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>