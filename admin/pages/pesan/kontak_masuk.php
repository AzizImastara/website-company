<?php
require_once '../../config/database.php';
include_once '../../includes/header.php';

// Proses hapus pesan
$success = $error = '';
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $id = $_GET['delete'];
    try {
        $stmt = $pdo->prepare('DELETE FROM kontak_masuk WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $success = 'Pesan berhasil dihapus!';
        } else {
            $error = 'Gagal menghapus pesan.';
        }
    } catch (PDOException $e) {
        $error = 'Terjadi kesalahan: ' . $e->getMessage();
    }
}

$sql = "SELECT * FROM kontak_masuk ORDER BY created_at DESC";
$result = $pdo->query($sql);
?>
<div class="container mt-4">
  <h2>Daftar Pesan Kontak Masuk</h2>
  <?php if ($success): ?>
    <div class="alert alert-success"><?php echo $success; ?></div>
  <?php elseif ($error): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
  <?php endif; ?>
  <div class="table-responsive">
    <table class="table table-bordered table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Depan</th>
          <th>Nama Belakang</th>
          <th>Email</th>
          <th>Telepon</th>
          <th>Pesan</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($result && $result->rowCount() > 0): $no = 1; foreach($result as $row): ?>
        <tr>
          <td><?php echo $no++; ?></td>
          <td><?php echo htmlspecialchars($row['nama_depan']); ?></td>
          <td><?php echo htmlspecialchars($row['nama_belakang']); ?></td>
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td><?php echo htmlspecialchars($row['telepon']); ?></td>
          <td><?php echo nl2br(htmlspecialchars($row['pesan'])); ?></td>
          <td><?php echo $row['created_at']; ?></td>
          <td>
            <a href="?delete=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pesan ini?')">
              <i class="fa fa-trash"></i> Hapus
            </a>
          </td>
        </tr>
        <?php endforeach; else: ?>
        <tr><td colspan="8" class="text-center">Belum ada pesan masuk.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
<?php
include_once '../../includes/footer.php';
?> 