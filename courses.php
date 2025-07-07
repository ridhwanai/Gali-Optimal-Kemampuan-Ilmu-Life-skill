<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/includes/header.php';

// Ambil data kursus dari database
$result = $conn->query("SELECT * FROM courses ORDER BY id ASC");
?>

<main class="container py-5" style="margin-top: 56px;">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Jelajahi Semua Kursus</h1>
        <p class="lead text-muted">Temukan jalur belajar yang tepat untuk memulai karir Anda di dunia teknologi.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while($course = $result->fetch_assoc()): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 course-card-modern">
                        <img src="assets/images/<?= htmlspecialchars($course['thumbnail']); ?>" class="card-img-top" alt="<?= htmlspecialchars($course['title']); ?>">
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-primary align-self-start mb-2"><?= htmlspecialchars($course['level']); ?></span>
                            <h5 class="card-title fw-bold"><?= htmlspecialchars($course['title']); ?></h5>
                            <p class="card-text text-muted small flex-grow-1"><?= htmlspecialchars($course['description']); ?></p>
                            <a href="learning.php" class="btn btn-primary mt-3">Mulai Belajar</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="text-center">Belum ada kursus yang tersedia saat ini.</p>
        <?php endif; ?>
    </div>
</main>

<?php require_once __DIR__ . '/includes/footer.php'; ?>