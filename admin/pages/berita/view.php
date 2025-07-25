<?php
require_once '../../config/database.php';
checkLogin();

// Ambil ID dari URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

// Ambil data berita
try {
    $stmt = $pdo->prepare("SELECT * FROM berita WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $berita = $stmt->fetch();
    
    if (!$berita) {
        header('Location: index.php?error=Berita tidak ditemukan!');
        exit();
    }
} catch(PDOException $e) {
    header('Location: index.php?error=Terjadi kesalahan!');
    exit();
}

$page_title = 'Detail Berita: ' . $berita['judul'];

include '../../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-eye me-2"></i>Detail Berita
                </h5>
                <div>
                    <a href="edit.php?id=<?php echo $berita['id']; ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit me-1"></i>Edit
                    </a>
                    <a href="index.php?delete=<?php echo $berita['id']; ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirmDelete('Apakah Anda yakin ingin menghapus berita ini?')">
                        <i class="fas fa-trash me-1"></i>Hapus
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <h2 class="mb-3"><?php echo htmlspecialchars($berita['judul']); ?></h2>
                        
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                <strong>Tanggal Berita:</strong> <?php echo formatTanggalIndonesia($berita['tanggal']); ?>
                            </small>
                            <br>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                <strong>Dibuat:</strong> <?php echo date('d/m/Y H:i:s', strtotime($berita['created_at'])); ?>
                            </small>
                            <?php if ($berita['updated_at'] != $berita['created_at']): ?>
                                <br>
                                <small class="text-muted">
                                    <i class="fas fa-edit me-1"></i>
                                    <strong>Terakhir diperbarui:</strong> <?php echo date('d/m/Y H:i:s', strtotime($berita['updated_at'])); ?>
                                </small>
                            <?php endif; ?>
                        </div>

                        <div class="content">
                            <?php echo nl2br(htmlspecialchars($berita['isi'])); ?>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <?php if ($berita['gambar']): ?>
                            <div class="mb-3">
                                <img src="../../assets/uploads/berita/<?php echo $berita['gambar']; ?>" 
                                     class="img-fluid rounded" alt="<?php echo htmlspecialchars($berita['judul']); ?>">
                            </div>
                        <?php else: ?>
                            <div class="mb-3">
                                <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                     style="height: 200px;">
                                    <div class="text-center text-muted">
                                        <i class="fas fa-image fa-3x mb-2"></i>
                                        <p>Tidak ada gambar</p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card bg-light">
                            <div class="card-body">
                                <h6 class="card-title">
                                    <i class="fas fa-info-circle me-1"></i>Informasi Berita
                                </h6>
                                <ul class="list-unstyled mb-0">
                                    <li><strong>ID:</strong> <?php echo $berita['id']; ?></li>
                                    <li><strong>Judul:</strong> <?php echo htmlspecialchars($berita['judul']); ?></li>
                                    <li><strong>Tanggal:</strong> <?php echo formatTanggalIndonesia($berita['tanggal']); ?></li>
                                    <li><strong>Gambar:</strong> <?php echo $berita['gambar'] ? 'Ada' : 'Tidak ada'; ?></li>
                                    <li><strong>Panjang isi:</strong> <?php echo strlen($berita['isi']); ?> karakter</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <hr class="my-4">
                
                <div class="d-flex justify-content-between align-items-center">
                    <a href="index.php" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Kembali ke Daftar
                    </a>
                    <div>
                        <a href="edit.php?id=<?php echo $berita['id']; ?>" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit Berita
                        </a>
                        <a href="create.php" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Tambah Berita Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>
