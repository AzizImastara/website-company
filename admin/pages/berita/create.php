<?php
require_once '../../config/database.php';
checkLogin();

$page_title = 'Tambah Berita';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = trim($_POST['judul']);
    $isi = trim($_POST['isi']);
    $tanggal = $_POST['tanggal'];
    
    $errors = [];
    
    // Validasi
    if (empty($judul)) {
        $errors[] = 'Judul berita harus diisi.';
    }
    if (empty($isi)) {
        $errors[] = 'Isi berita harus diisi.';
    }
    if (empty($tanggal)) {
        $errors[] = 'Tanggal berita harus diisi.';
    }
    
    // Upload gambar
    $gambar_filename = '';
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $uploaded_file = uploadFile($_FILES['gambar'], 'berita');
        if ($uploaded_file === false) {
            $errors[] = 'Gagal mengupload gambar. Pastikan file adalah gambar dengan format JPG, JPEG, PNG, atau GIF dan ukuran maksimal 5MB.';
        } else {
            $gambar_filename = $uploaded_file;
        }
    }
    
    // Jika tidak ada error, simpan ke database
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO berita (judul, isi, gambar, tanggal) VALUES (:judul, :isi, :gambar, :tanggal)");
            $stmt->bindParam(':judul', $judul);
            $stmt->bindParam(':isi', $isi);
            $stmt->bindParam(':gambar', $gambar_filename);
            $stmt->bindParam(':tanggal', $tanggal);
            
            if ($stmt->execute()) {
                header('Location: index.php?success=Berita berhasil ditambahkan!');
                exit();
            } else {
                $errors[] = 'Terjadi kesalahan saat menyimpan berita.';
            }
        } catch(PDOException $e) {
            $errors[] = 'Terjadi kesalahan database: ' . $e->getMessage();
        }
    }
}

include '../../includes/header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">
                    <i class="fas fa-plus me-2"></i>Tambah Berita Baru
                </h5>
            </div>
            <div class="card-body">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Error!</strong>
                        <ul class="mb-0 mt-2">
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="judul" class="form-label">
                            <i class="fas fa-heading me-1"></i>Judul Berita <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="judul" name="judul" 
                               value="<?php echo isset($_POST['judul']) ? htmlspecialchars($_POST['judul']) : ''; ?>" 
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">
                            <i class="fas fa-calendar me-1"></i>Tanggal Berita <span class="text-danger">*</span>
                        </label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" 
                               value="<?php echo isset($_POST['tanggal']) ? $_POST['tanggal'] : date('Y-m-d'); ?>" 
                               required>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">
                            <i class="fas fa-image me-1"></i>Gambar Berita
                        </label>
                        <input type="file" class="form-control" id="gambar" name="gambar" 
                               accept="image/*" onchange="previewImage(this, 'imagePreview')">
                        <div class="form-text">Format yang diizinkan: JPG, JPEG, PNG, GIF. Maksimal 5MB.</div>
                        <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail mt-2" 
                             style="display: none; max-width: 300px;">
                    </div>

                    <div class="mb-3">
                        <label for="isi" class="form-label">
                            <i class="fas fa-align-left me-1"></i>Isi Berita <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" id="isi" name="isi" rows="10" 
                                  placeholder="Tulis isi berita di sini..." required><?php echo isset($_POST['isi']) ? htmlspecialchars($_POST['isi']) : ''; ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i>Simpan Berita
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>
