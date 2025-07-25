-- Database untuk Admin Panel Website Company
CREATE DATABASE IF NOT EXISTS `website_company` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `website_company`;

-- Tabel admin untuk login
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert default admin user (username: admin, password: admin123)
INSERT INTO `admin` (`username`, `password`, `email`, `nama_lengkap`) VALUES
('admin', '$2y$10$J7qGSKbPRQ5Gv.Qo5Rj5JuQwYkpBr5Jx.9wK7dR6m8vF3cE2hT1wO', 'admin@company.com', 'Administrator');

-- Tabel berita
CREATE TABLE `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample berita
INSERT INTO `berita` (`judul`, `isi`, `gambar`, `tanggal`) VALUES
('Proyek Tambang Terbaru Selesai', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'news1.jpg', '2024-01-15'),
('Ekspansi Layanan Revegetasi', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'news2.jpg', '2024-01-10'),
('Partnership Baru dengan Perusahaan Multinasional', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.', 'news3.jpg', '2024-01-05');

-- Tabel portofolio
CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `kategori` enum('penyiraman_tambang','revegetasi_tambang','supporting_tambang') NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample portofolio
INSERT INTO `portofolio` (`judul`, `deskripsi`, `gambar`, `kategori`, `tanggal`) VALUES
('Proyek Penyiraman Tambang Batubara', 'Sistem penyiraman modern untuk area tambang batubara dengan teknologi terdepan', 'project1.jpg', 'penyiraman_tambang', '2024-01-20'),
('Revegetasi Lahan Bekas Tambang', 'Program revegetasi komprehensif untuk pemulihan ekosistem lahan bekas tambang', 'project2.jpg', 'revegetasi_tambang', '2024-01-18'),
('Supporting Equipment Installation', 'Instalasi peralatan pendukung operasional tambang', 'project3.jpg', 'supporting_tambang', '2024-01-15'),
('Penyiraman Area Stockpile', 'Sistem penyiraman otomatis untuk area stockpile material tambang', 'project4.jpg', 'penyiraman_tambang', '2024-01-12'),
('Revegetasi dengan Tanaman Lokal', 'Program revegetasi menggunakan tanaman lokal untuk sustainability', 'project5.jpg', 'revegetasi_tambang', '2024-01-08'),
('Maintenance Support System', 'Sistem maintenance dan support untuk operasional tambang', 'project6.jpg', 'supporting_tambang', '2024-01-03');
