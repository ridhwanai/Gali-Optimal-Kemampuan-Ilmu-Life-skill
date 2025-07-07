<?php
// gokill/index.php

// PERBAIKAN FINAL: Menggunakan require_once untuk file konfigurasi
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/header.php';
if (isset($_SESSION['payment_success'])) {
    echo '<div class="container mt-4"><div class="alert alert-success">' . $_SESSION['payment_success'] . '</div></div>';
    unset($_SESSION['payment_success']);
}
?>

<main>
    <div class="container dashboard-container">
        <div class="row align-items-center" style="min-height: 80vh;">
            <div class="col-lg-7 dashboard-hero">
                <span class="badge text-dark mb-3"><i class="fas fa-star text-warning"></i> Platform #1 untuk Belajar Coding</span>
                <h1>Gali Optimal Kemampuan & Ilmu Life-skill</h1>
                <p class="my-4">Kembangkan keahlian coding yang siap untuk dunia kerja dengan panduan AI personal, kursus interaktif, dan proyek nyata yang akan membangun portfolio Anda.</p>
                <div class="d-flex gap-2 mb-4">
                    <a href="learning.php" class="btn btn-primary px-4 py-2">Mulai Belajar</a>
                </div>
            </div>
            <div class="col-lg-5 ps-lg-5 mt-5 mt-lg-0">
                <div class="widget-card"><div class="d-flex align-items-center"><div class="widget-icon icon-html me-3"><i class="fab fa-html5"></i></div><div><h6>HTML Mastery</h6><small class="text-success fw-bold">Completed</small></div><i class="fas fa-check-circle text-success ms-auto fa-lg"></i></div></div>
                <div class="widget-card"><div class="d-flex align-items-center"><div class="widget-icon icon-ai me-3"><i class="fas fa-robot"></i></div><div><h6>AI Assistant</h6><p>Siap membantu Anda</p></div></div><p class="ai-widget-quote mt-2">Saya akan membantu Anda membuat navbar responsive...</p></div>
                <div class="widget-card"><div class="d-flex align-items-center mb-2"><h6>Progress hari ini</h6><strong class="ms-auto">0%</strong></div><div class="progress"><div class="progress-bar bg-secondary" style="width: 0%"></div></div><div class="d-flex align-items-center mt-3"><div class="widget-icon icon-html me-3"><i class="fab fa-html5"></i></div><div><small class="fw-bold">HTML</small><br><small>In Progress</small></div></div></div>
            </div>
        </div>
    </div>

    <section class="py-5 bg-white">
        <div class="container text-center">
            <h2 class="fw-bold">Fitur Unggulan</h2>
            <p class="lead text-muted mb-5">Platform pembelajaran coding terlengkap dengan teknologi AI terdepan.</p>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4"><div class="feature-card"><div class="feature-icon icon-blue"><i class="fas fa-robot"></i></div><h5>AI Assistant</h5><p>Dapatkan bantuan coding 24/7 dari AI yang memahami konteks...</p><a href="#">Pelajari Lebih Lanjut ></a></div></div>
                <div class="col-md-6 col-lg-4"><div class="feature-card"><div class="feature-icon icon-green"><i class="fas fa-code"></i></div><h5>Interactive Courses</h5><p>Belajar dengan kursus interaktif yang dilengkapi code editor...</p><a href="#">Pelajari Lebih Lanjut ></a></div></div>
                <div class="col-md-6 col-lg-4"><div class="feature-card"><div class="feature-icon icon-purple"><i class="fas fa-tasks"></i></div><h5>Real Projects</h5><p>Bangun portfolio dengan mengerjakan proyek nyata...</p><a href="#">Pelajari Lebih Lanjut ></a></div></div>
                <div class="col-md-6 col-lg-4"><div class="feature-card"><div class="feature-icon icon-orange"><i class="fas fa-users"></i></div><h5>Community</h5><p>Bergabung dengan komunitas developer aktif. Diskusi, code review...</p><a href="#">Pelajari Lebih Lanjut ></a></div></div>
                <div class="col-md-6 col-lg-4"><div class="feature-card"><div class="feature-icon icon-red"><i class="fas fa-trophy"></i></div><h5>Certification</h5><p>Dapatkan sertifikat yang diakui industri setelah menyelesaikan...</p><a href="#">Pelajari Lebih Lanjut ></a></div></div>
                <div class="col-md-6 col-lg-4"><div class="feature-card"><div class="feature-icon icon-yellow"><i class="fas fa-bolt"></i></div><h5>Fast Learning</h5><p>Metode pembelajaran yang efisien dengan adaptive learning...</p><a href="#">Pelajari Lebih Lanjut ></a></div></div>
            </div>
        </div>
    </section>

    <section class="py-5 pricing-section">
        <div class="container text-center">
             <h2 class="fw-bold">Pilih Paket Anda</h2>
            <p class="lead text-muted mb-5">Mulai gratis atau upgrade ke Pro untuk akses penuh ke semua fitur premium.</p>
            <div class="row justify-content-center g-4">
                <div class="col-lg-4">
                    <div class="pricing-card">
                        <div class="icon-header"><i class="fas fa-star"></i></div>
                        <h4>Basic</h4>
                        <p>Cocok untuk pemula yang ingin mencoba platform kami</p>
                        <div class="price">Gratis <span class="period">/selamanya</span></div>
                        <a href="register.php" class="btn btn-outline-primary w-100">Mulai Gratis</a>
                        <hr>
                        <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="fas fa-check text-success"></i> Akses 5 kursus gratis</li>
                            <li class="mb-2"><i class="fas fa-check text-success"></i> Materi pembelajaran dasar</li>
                            <li class="mb-2"><i class="fas fa-check text-success"></i> Community forum</li>
                            <li class="mb-2 text-muted"><i class="fas fa-times"></i> Progress tracking sederhana</li>
                            <li class="mb-2 text-muted"><i class="fas fa-times"></i> Sertifikat completion</li>
                            <li class="text-muted"><i class="fas fa-times"></i> Tidak ada AI Assistant</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="pricing-card pro">
                        <div class="popular-badge">Paling Populer</div>
                        <div class="icon-header icon-pro"><i class="fas fa-bolt"></i></div>
                        <h4>Pro</h4>
                        <p>Untuk developer yang serius ingin meningkatkan skill</p>
                        <div class="price">Rp 50.000 <span class="period">/per bulan</span></div>
                        <a href="payment.php?plan=pro&price=50000" class="btn btn-primary w-100">Upgrade ke Pro</a>
                        <hr>
                         <ul class="list-unstyled text-start">
                            <li class="mb-2"><i class="fas fa-check text-success"></i> Akses semua kursus premium</li>
                            <li class="mb-2"><i class="fas fa-check text-success"></i> AI Assistant 24/7</li>
                            <li class="mb-2"><i class="fas fa-check text-success"></i> Live coding sessions</li>
                            <li class="mb-2"><i class="fas fa-check text-success"></i> Project-based learning</li>
                            <li class="mb-2"><i class="fas fa-check text-success"></i> Code review personal</li>
                            <li class="mb-2"><i class="fas fa-check text-success"></i> Sertifikat profesional</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>