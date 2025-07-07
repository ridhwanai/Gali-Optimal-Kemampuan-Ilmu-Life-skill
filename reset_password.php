<?php
require_once __DIR__ . '/config.php';
$token = isset($_GET['token']) ? $_GET['token'] : '';
$is_token_valid = false;
if (!empty($token)) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_token_expires_at > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $is_token_valid = true;
    }
}
require_once __DIR__ . '/includes/auth_header.php';
?>
<div class="auth-wrapper">
    <div class="text-center mb-4"><a class="auth-brand" href="index.php">&lt;> GoKill</a></div>
    <div class="auth-card">
        <h4 class="text-center mb-4">Buat Password Baru</h4>
        <?php if ($is_token_valid): ?>
            <form action="api/update_password.php" method="POST">
                <input type="hidden" name="token" value="<?= htmlspecialchars($token); ?>">
                <div class="mb-3"><label class="form-label fw-bold">Password Baru</label><div class="input-group"><input type="password" name="password" id="password" class="form-control" required><button class="btn btn-outline-secondary" type="button" id="togglePassword"><i class="fas fa-eye"></i></button></div></div>
                <div class="mb-3"><label class="form-label fw-bold">Konfirmasi Password</label><div class="input-group"><input type="password" name="password_confirm" id="password_confirm" class="form-control" required><button class="btn btn-outline-secondary" type="button" id="togglePasswordConfirm"><i class="fas fa-eye"></i></button></div></div>
                <div class="d-grid mt-4"><button type="submit" class="btn btn-primary">Simpan Password Baru</button></div>
            </form>
        <?php else: ?>
            <div class="alert alert-danger text-center">Token tidak valid atau sudah kedaluwarsa.</div>
            <div class="d-grid"><a href="forgot_password.php" class="btn btn-secondary">Minta Link Baru</a></div>
        <?php endif; ?>
    </div>
</div>
<?php require_once __DIR__ . '/includes/auth_footer.php'; ?>