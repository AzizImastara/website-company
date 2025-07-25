<?php
require_once 'config/database.php';
checkLogin();

$page_title = 'Dashboard';

// Ambil statistik
try {
    $stmt_berita = $pdo->query("SELECT COUNT(*) as total FROM berita");
    $total_berita = $stmt_berita->fetch()['total'];
    
    $stmt_portofolio = $pdo->query("SELECT COUNT(*) as total FROM portofolio");
    $total_portofolio = $stmt_portofolio->fetch()['total'];
    
    // Berita terbaru
    $stmt_berita_terbaru = $pdo->query("SELECT * FROM berita ORDER BY created_at DESC LIMIT 5");
    $berita_terbaru = $stmt_berita_terbaru->fetchAll();
    
    // Portofolio terbaru
    $stmt_portofolio_terbaru = $pdo->query("SELECT * FROM portofolio ORDER BY created_at DESC LIMIT 5");
    $portofolio_terbaru = $stmt_portofolio_terbaru->fetchAll();
    
} catch(PDOException $e) {
    $error_message = 'Terjadi kesalahan saat mengambil data.';
}

include 'includes/header.php';
?>

<div class="row">
    <!-- Statistics Cards -->
    <div class="col-md-6 mb-4">
        <div class="card text-white bg-primary">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Total Berita</h5>
                        <h2 class="mb-0"><?php echo $total_berita; ?></h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-newspaper fa-3x opacity-50"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="pages/berita/index.php" class="text-white text-decoration-none">
                        <small>Kelola Berita <i class="fas fa-arrow-right"></i></small>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 mb-4">
        <div class="card text-white bg-success">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <div>
                        <h5 class="card-title">Total Portofolio</h5>
                        <h2 class="mb-0"><?php echo $total_portofolio; ?></h2>
                    </div>
                    <div class="align-self-center">
                        <i class="fas fa-briefcase fa-3x opacity-50"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="pages/portofolio/index.php" class="text-white text-decoration-none">
                        <small>Kelola Portofolio <i class="fas fa-arrow-right"></i></small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Berita Terbaru -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-newspaper me-2"></i>Berita Terbaru
                </h5>
                <a href="pages/berita/index.php" class="btn btn-sm btn-outline-primary">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                <?php if (empty($berita_terbaru)): ?>
                    <p class="text-muted text-center">Belum ada berita</p>
                <?php else: ?>
                    <div class="list-group list-group-flush">
                        <?php foreach ($berita_terbaru as $berita): ?>
                            <div class="list-group-item px-0">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1"><?php echo htmlspecialchars($berita['judul']); ?></h6>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            <?php echo formatTanggalIndonesia($berita['tanggal']); ?>
                                        </small>
                                    </div>
                                    <?php if ($berita['gambar']): ?>
                                        <img src="assets/uploads/berita/<?php echo $berita['gambar']; ?>" 
                                             class="img-thumbnail" alt="Berita" style="width: 60px; height: 40px; object-fit: cover;">
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    
    <!-- Portofolio Terbaru -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-briefcase me-2"></i>Portofolio Terbaru
                </h5>
                <a href="pages/portofolio/index.php" class="btn btn-sm btn-outline-success">
                    Lihat Semua
                </a>
            </div>
            <div class="card-body">
                <?php if (empty($portofolio_terbaru)): ?>
                    <p class="text-muted text-center">Belum ada portofolio</p>
                <?php else: ?>
                    <div class="list-group list-group-flush">
                        <?php foreach ($portofolio_terbaru as $portofolio): ?>
                            <div class="list-group-item px-0">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h6 class="mb-1"><?php echo htmlspecialchars($portofolio['judul']); ?></h6>
                                        <small class="text-muted">
                                            <span class="badge bg-secondary me-2">
                                                <?php 
                                                $kategori_label = [
                                                    'penyiraman_tambang' => 'Penyiraman Tambang',
                                                    'revegetasi_tambang' => 'Revegetasi Tambang', 
                                                    'supporting_tambang' => 'Supporting Tambang'
                                                ];
                                                echo $kategori_label[$portofolio['kategori']];
                                                ?>
                                            </span>
                                            <i class="fas fa-calendar me-1"></i>
                                            <?php echo formatTanggalIndonesia($portofolio['tanggal']); ?>
                                        </small>
                                    </div>
                                    <?php if ($portofolio['gambar']): ?>
                                        <img src="assets/uploads/portofolio/<?php echo $portofolio['gambar']; ?>" 
                                             class="img-thumbnail" alt="Portofolio" style="width: 60px; height: 40px; object-fit: cover;">
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row mt-4">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-info-circle me-2"></i>Informasi Sistem
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6>Informasi Server</h6>
                        <ul class="list-unstyled">
                            <li><strong>PHP Version:</strong> <?php echo PHP_VERSION; ?></li>
                            <li><strong>Server Software:</strong> <?php echo $_SERVER['SERVER_SOFTWARE']; ?></li>
                            <li><strong>Database:</strong> MySQL</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <h6>Informasi Login</h6>
                        <ul class="list-unstyled">
                            <li><strong>Username:</strong> <?php echo $_SESSION['admin_username']; ?></li>
                            <li><strong>Nama:</strong> <?php echo $_SESSION['admin_nama']; ?></li>
                            <li><strong>Login Terakhir:</strong> <?php echo date('d/m/Y H:i:s'); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->

<?php include 'includes/footer.php'; ?>
