<?php
require_once '../../config/database.php';
checkLogin();

$page_title = 'Edit Portofolio';

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul = trim($_POST['judul']);
    $deskripsi = trim($_POST['deskripsi']);
    $kategori = $_POST['kategori'];
    $tanggal = $_POST['tanggal'];
    
    $errors = [];
    
    // Validasi
    if (empty($judul)) {
        $errors[] = 'Judul portofolio harus diisi.';
    }
    if (empty($deskripsi)) {
        $errors[] = 'Deskripsi portofolio harus diisi.';
    }
    if (empty($kategori) || !array_key_exists($kategori, $kategori_options)) {
        $errors[] = 'Kategori portofolio harus dipilih.';
    }
    if (empty($tanggal)) {
        $errors[] = 'Tanggal portofolio harus diisi.';
    }
    
    // Handle upload gambar baru
    $gambar_filename = $portofolio['gambar']; // Keep existing image by default
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] == 0) {
        $uploaded_file = uploadFile($_FILES['gambar'], 'portofolio');
        if ($uploaded_file === false) {
            $errors[] = 'Gagal mengupload gambar. Pastikan file adalah gambar dengan format JPG, JPEG, PNG, atau GIF dan ukuran maksimal 5MB.';
        } else {
            // Hapus gambar lama jika ada
            if ($portofolio['gambar']) {
                deleteFile($portofolio['gambar'], 'portofolio');
            }
            $gambar_filename = $uploaded_file;
        }
    }
    
    // Jika tidak ada error, update database
    if (empty($errors)) {
        try {
            $stmt = $pdo->prepare("UPDATE portofolio SET judul = :judul, deskripsi = :deskripsi, gambar = :gambar, kategori = :kategori, tanggal = :tanggal WHERE id = :id");
            $stmt->bindParam(':judul', $judul);
            $stmt->bindParam(':deskripsi', $deskripsi);
            $stmt->bindParam(':gambar', $gambar_filename);
            $stmt->bindParam(':kategori', $kategori);
            $stmt->bindParam(':tanggal', $tanggal);
            $stmt->bindParam(':id', $id);
            
            if ($stmt->execute()) {
                header('Location: index.php?success=Portofolio berhasil diperbarui!');
                exit();
            } else {
                $errors[] = 'Terjadi kesalahan saat memperbarui portofolio.';
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
                    <i class="fas fa-edit me-2"></i>Edit Portofolio
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
                            <i class="fas fa-heading me-1"></i>Judul Portofolio <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="judul" name="judul" 
                               value="<?php echo isset($_POST['judul']) ? htmlspecialchars($_POST['judul']) : htmlspecialchars($portofolio['judul']); ?>" 
                               required>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kategori" class="form-label">
                                    <i class="fas fa-tag me-1"></i>Kategori <span class="text-danger">*</span>
                                </label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori_options as $value => $label): ?>
                                        <option value="<?php echo $value; ?>" 
                                                <?php 
                                                $selected_kategori = isset($_POST['kategori']) ? $_POST['kategori'] : $portofolio['kategori'];
                                                echo ($selected_kategori == $value) ? 'selected' : ''; 
                                                ?>>
                                            <?php echo $label; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">
                                    <i class="fas fa-calendar me-1"></i>Tanggal Portofolio <span class="text-danger">*</span>
                                </label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" 
                                       value="<?php echo isset($_POST['tanggal']) ? $_POST['tanggal'] : $portofolio['tanggal']; ?>" 
                                       required>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">
                            <i class="fas fa-image me-1"></i>Gambar Portofolio
                        </label>
                        
                        <?php if ($portofolio['gambar']): ?>
                            <div class="mb-2">
                                <img src="../../assets/uploads/portofolio/<?php echo $portofolio['gambar']; ?>" 
                                     class="img-thumbnail" alt="Current Image" style="max-width: 200px;">
                                <div class="form-text">Gambar saat ini. Upload gambar baru untuk mengganti.</div>
                            </div>
                        <?php endif; ?>
                        
                        <input type="file" class="form-control" id="gambar" name="gambar" 
                               accept="image/*" onchange="previewImage(this, 'imagePreview')">
                        <div class="form-text">Format yang diizinkan: JPG, JPEG, PNG, GIF. Maksimal 5MB.</div>
                        <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail mt-2" 
                             style="display: none; max-width: 300px;">
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">
                            <i class="fas fa-align-left me-1"></i>Deskripsi Portofolio <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="8" 
                                  placeholder="Tulis deskripsi portofolio di sini..." required><?php echo isset($_POST['deskripsi']) ? htmlspecialchars($_POST['deskripsi']) : htmlspecialchars($portofolio['deskripsi']); ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-1"></i>Kembali
                        </a>
                        <div>
                            <a href="view.php?id=<?php echo $portofolio['id']; ?>" class="btn btn-info me-2">
                                <i class="fas fa-eye me-1"></i>Lihat
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i>Perbarui Portofolio
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>
