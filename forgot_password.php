<?php require_once __DIR__ . '/includes/auth_header.php'; ?>
<div class="auth-wrapper">
    <div class="text-center mb-4"><a class="auth-brand" href="index.php">&lt;> GoKill</a></div>
    <div class="auth-card">
        <h4 class="card-title text-center mb-2">Reset Password</h4>
        <p class="text-center text-muted mb-4">Kami akan mengirimkan link ke email Anda untuk melanjutkan.</p>
        <form action="api/request_password_reset.php" method="POST">
            <div class="mb-3"><label for="email" class="form-label fw-bold">Alamat Email</label><input type="email" class="form-control" name="email" id="email" required></div>
            <div class="d-grid mt-4"><button type="submit" class="btn btn-primary">Kirim Link Reset</button></div>
        </form>
    </div>
    <div class="text-center mt-4"><a href="login.php" class="text-muted fw-bold">Kembali ke Halaman Masuk</a></div>
</div>
<?php require_once __DIR__ . '/includes/auth_footer.php'; ?>