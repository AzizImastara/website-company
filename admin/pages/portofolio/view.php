<?php
require_once '../../config/database.php';
checkLogin();

// Kategori options
$kategori_options = [
    'penyiraman_tambang' => 'Penyiraman Tambang',
    'revegetasi_tambang' => 'Revegetasi Tambang',
    'supporting_tambang' => 'Supporting Tambang'
];

// Ambil ID dari URL
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];

// Ambil data portofolio
try {
    $stmt = $pdo->prepare("SELECT * FROM portofolio WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $portofolio = $stmt->fetch();
    
    if (!$portofolio) {
        header('Location: index.php?error=Portofolio tidak ditemukan!');
        exit();
    }
} catch(PDOException $e) {
    header('Location: index.php?error=Terjadi kesalahan!');
    exit();
}

$page_title = 'Detail Portofolio: ' . $portofolio['judul'];

include '../../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">
                    <i class="fas fa-eye me-2"></i>Detail Portofolio
                </h5>
                <div>
                    <a href="edit.php?id=<?php echo $portofolio['id']; ?>" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit me-1"></i>Edit
                    </a>
                    <a href="index.php?delete=<?php echo $portofolio['id']; ?>" 
                       class="btn btn-danger btn-sm"
                       onclick="return confirmDelete('Apakah Anda yakin ingin menghapus portofolio ini?')">
                        <i class="fas fa-trash me-1"></i>Hapus
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center mb-3">
                            <h2 class="me-3"><?php echo htmlspecialchars($portofolio['judul']); ?></h2>
                            <span class="badge bg-primary fs-6">
                                <?php echo $kategori_options[$portofolio['kategori']]; ?>
                            </span>
                        </div>
                        
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>
                                <strong>Tanggal Portofolio:</strong> <?php echo formatTanggalIndonesia($portofolio['tanggal']); ?>
                            </small>
                            <br>
                            <small class="text-muted">
                                <i class="fas fa-clock me-1"></i>
                                <strong>Dibuat:</strong> <?php echo date('d/m/Y H:i:s', strtotime($portofolio['created_at'])); ?>
                            </small>
                            <?php if ($portofolio['updated_at'] != $portofolio['created_at']): ?>
                                <br>
                                <small class="text-muted">
                                    <i class="fas fa-edit me-1"></i>
                                    <strong>Terakhir diperbarui:</strong> <?php echo date('d/m/Y H:i:s', strtotime($portofolio['updated_at'])); ?>
                                </small>
                            <?php endif; ?>
                        </div>

                        <div class="content">
                            <h5 class="mb-3">Deskripsi</h5>
                            <?php echo nl2br(htmlspecialchars($portofolio['deskripsi'])); ?>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <?php if ($portofolio['gambar']): ?>
                            <div class="mb-3">
                                <img src="../../assets/uploads/portofolio/<?php echo $portofolio['gambar']; ?>" 
                                     class="img-fluid rounded" alt="<?php echo htmlspecialchars($portofolio['judul']); ?>">
                            </div>
                        <?php else: ?>
                            <div class="mb-3">
                                <div class="bg-light rounded d-flex align-items-center justify-content-center"
                                     style="height: 300px;">
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
                                    <i class="fas fa-info-circle me-1"></i>Informasi Portofolio
                                </h6>
                                <ul class="list-unstyled mb-0">
                                    <li><strong>ID:</strong> <?php echo $portofolio['id']; ?></li>
                                    <li><strong>Judul:</strong> <?php echo htmlspecialchars($portofolio['judul']); ?></li>
                                    <li><strong>Kategori:</strong> <?php echo $kategori_options[$portofolio['kategori']]; ?></li>
                                    <li><strong>Tanggal:</strong> <?php echo formatTanggalIndonesia($portofolio['tanggal']); ?></li>
                                    <li><strong>Gambar:</strong> <?php echo $portofolio['gambar'] ? 'Ada' : 'Tidak ada'; ?></li>
                                    <li><strong>Panjang deskripsi:</strong> <?php echo strlen($portofolio['deskripsi']); ?> karakter</li>
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
                        <a href="edit.php?id=<?php echo $portofolio['id']; ?>" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i>Edit Portofolio
                        </a>
                        <a href="create.php" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i>Tambah Portofolio Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>
