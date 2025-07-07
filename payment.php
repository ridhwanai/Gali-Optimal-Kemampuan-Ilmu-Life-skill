<?php
require_once __DIR__ . '/config.php';
// Halaman ini memerlukan login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Ambil detail paket dari URL
$plan = $_GET['plan'] ?? 'Tidak Diketahui';
$price = $_GET['price'] ?? 0;

if ($plan !== 'pro' || $price <= 0) {
    // Redirect jika paket tidak valid
    header("Location: subscribe.php");
    exit();
}

require_once __DIR__ . '/includes/header.php';
?>

<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Konfirmasi Pembayaran</h4>
                </div>
                <div class="card-body p-4">
                    <p class="text-muted">Anda akan berlangganan paket:</p>
                    <h3 class="mb-3">Langganan GoKill Pro - 1 Bulan</h3>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Total Tagihan:</h5>
                        <h4 class="mb-0 fw-bold text-primary">Rp <?= number_format($price, 0, ',', '.'); ?></h4>
                    </div>

                    <div class="alert alert-info mt-4">
                        <h6 class="alert-heading">Instruksi Pembayaran</h6>
                        <p>Silakan lakukan transfer ke nomor Virtual Account di bawah ini:</p>
                        <div class="text-center bg-light p-3 rounded">
                            <p class="mb-0 small">BCA Virtual Account</p>
                            <h5 class="fw-bold mb-0">1234 555 08986575588</h5>
                            <p class="mb-0 small mt-1">a.n. PT GoKill Indonesia</p>
                        </div>
                    </div>
                    
                    <form action="api/process_payment.php" method="POST">
                        <input type="hidden" name="plan" value="<?= htmlspecialchars($plan); ?>">
                        <input type="hidden" name="price" value="<?= htmlspecialchars($price); ?>">
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-success btn-lg">Saya Sudah Bayar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>