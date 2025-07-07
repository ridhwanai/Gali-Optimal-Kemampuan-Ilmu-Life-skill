<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
?>

<main class="py-5" style="margin-top: 56px;">
    <section class="pricing-section">
        <div class="container text-center">
             <h2 class="fw-bold">Pilih Paket Anda</h2>
            <p class="lead text-muted mb-5">Mulai gratis atau upgrade ke Pro untuk akses penuh ke semua fitur premium.</p>
            <div class="row justify-content-center g-4">
                
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card">
                        <div class="icon-header"><i class="fas fa-star"></i></div>
                        <h4>Basic</h4>
                        <p>Cocok untuk pemula yang ingin mencoba platform kami</p>
                        <div class="price">Gratis <span class="period">/selamanya</span></div>
                        <a href="register.php" class="btn btn-outline-primary w-100">Mulai Gratis</a>
                        <hr>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Akses 5 kursus gratis</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Materi pembelajaran dasar</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Community forum</li>
                            <li class="mb-2 text-muted"><i class="fas fa-times me-2"></i>Progress tracking sederhana</li>
                            <li class="mb-2 text-muted"><i class="fas fa-times me-2"></i>Sertifikat completion</li>
                            <li class="text-muted"><i class="fas fa-times me-2"></i>Tidak ada AI Assistant</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="pricing-card pro">
                        <div class="popular-badge">Paling Populer</div>
                        <div class="icon-header icon-pro"><i class="fas fa-bolt"></i></div>
                        <h4>Pro</h4>
                        <p>Untuk developer yang serius ingin meningkatkan skill</p>
                        <div class="price">Rp 50.000 <span class="period">/per bulan</span></div>
                        
                        <a href="payment.php?plan=pro&price=50000" class="btn btn-primary w-100">Upgrade ke Pro</a>

                        <hr>
                         <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Akses semua kursus premium</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>AI Assistant 24/7</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Live coding sessions</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Project-based learning</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Code review personal</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Sertifikat profesional</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>