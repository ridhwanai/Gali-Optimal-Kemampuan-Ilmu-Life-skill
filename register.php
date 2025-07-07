<?php
require_once __DIR__ . '/config.php';
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
require_once __DIR__ . '/includes/auth_header.php';
?>
<div class="login-container">
    <div class="login-brand-section">
        <div class="brand-logo">&lt;> GoKill</div>
        <h2>Satu Langkah Lagi Menuju Skill Baru</h2>
        <p>Buat akun gratis Anda dan dapatkan akses ke dunia coding yang tak terbatas.</p>
    </div>

    <div class="login-form-section">
        <h3>Buat Akun Baru</h3>
        <p class="text-muted">Isi data di bawah untuk memulai.</p>
        
        <?php if(isset($_SESSION['error_message'])): ?>
            <div class="alert alert-danger small py-2"><?= $_SESSION['error_message']; unset($_SESSION['error_message']); ?></div>
        <?php endif; ?>

        <form action="auth/register_process.php" method="POST">
            <div class="form-group">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name" required>
            </div>
             <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-login-submit">Daftar Akun</button>
            </div>
        </form>
        <div class="auth-links">
            Sudah punya akun? <a href="login.php">Masuk di Sini</a>
        </div>
    </div>
</div>
<?php require_once __DIR__ . '/includes/auth_footer.php'; ?>