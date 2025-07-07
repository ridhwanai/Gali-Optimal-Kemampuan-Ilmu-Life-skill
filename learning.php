<?php
// gokill/learning.php
require_once __DIR__ . '/config.php';

// Halaman ini memerlukan login, jika belum, arahkan ke halaman login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once __DIR__ . '/includes/header.php';
?>

<main class="container py-5">
    <div class="row g-5">

        <div class="col-lg-8">
            <div class="learning-video-container mb-4">
                <iframe src="https://www.youtube.com/embed/NBZ9Ro6UKV8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
            
            <h2 class="fw-bold">1. Pengenalan HTML</h2>
            <p class="text-muted">Selamat datang di kursus HTML Mastery! Di video ini, kita akan membahas apa itu HTML, sejarahnya, dan mengapa HTML menjadi fondasi dari setiap halaman web yang Anda lihat di internet.</p>
            <hr class="my-4">
            <div>
                <h5>Deskripsi Video</h5>
                <p>HTML (HyperText Markup Language) adalah bahasa markup standar yang digunakan untuk membuat dan menyusun halaman web dan aplikasi web. Setiap halaman web yang Anda kunjungi dibuat menggunakan beberapa variasi markup HTML. Ini menyediakan struktur dasar dari sebuah situs, yang kemudian ditingkatkan dengan CSS dan JavaScript.</p>
                <ul>
                    <li>Memahami peran HTML dalam pengembangan web.</li>
                    <li>Mengenal tool yang dibutuhkan untuk mulai ngoding HTML.</li>
                    <li>Struktur dasar dari sebuah file HTML.</li>
                </ul>
            </div>
             <div class="d-flex justify-content-between mt-4">
                <button class="btn btn-outline-secondary" disabled><i class="fas fa-arrow-left"></i> Sebelumnya</button>
                <button class="btn btn-primary">Berikutnya <i class="fas fa-arrow-right"></i></button>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="roadmap-card">
                <h5 class="fw-bold">Roadmap: HTML Mastery</h5>
                <p class="text-muted small">1/10 Selesai</p>
                <div class="progress mb-4" style="height: 8px;">
                    <div class="progress-bar" role="progressbar" style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                <div class="list-group roadmap-list list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        <i class="far fa-play-circle me-2"></i> 1. Pengenalan HTML
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="far fa-circle me-2"></i> 2. Struktur Dasar Dokumen
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="far fa-circle me-2"></i> 3. Elemen & Tag
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">
                        <i class="far fa-circle me-2"></i> 4. Atribut pada Tag
                    </a>
                     <a href="#" class="list-group-item list-group-item-action">
                        <i class="far fa-circle me-2"></i> 5. Heading & Paragraf
                    </a>
                     <a href="#" class="list-group-item list-group-item-action disabled">
                        <i class="fas fa-lock me-2"></i> 6. Bekerja dengan Link
                    </a>
                     <a href="#" class="list-group-item list-group-item-action disabled">
                        <i class="fas fa-lock me-2"></i> 7. Menambahkan Gambar
                    </a>
                </div>
            </div>
        </div>

    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>