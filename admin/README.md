# Admin Panel Website Company

Admin panel lengkap untuk mengelola konten website company dengan fitur CRUD untuk berita dan portofolio.

## Fitur

- **Login/Logout Admin** dengan session management
- **Dashboard** dengan statistik dan overview
- **Manajemen Berita** (Create, Read, Update, Delete)
- **Manajemen Portofolio** (Create, Read, Update, Delete)
- **Upload gambar** untuk berita dan portofolio
- **Pencarian dan filter** konten
- **Pagination** untuk daftar data
- **Responsive design** dengan Bootstrap 5

## Struktur Folder

```
admin/
├── config/
│   └── database.php          # Konfigurasi database dan fungsi helper
├── includes/
│   ├── header.php            # Header dengan navigation
│   └── footer.php            # Footer dengan JavaScript
├── pages/
│   ├── berita/
│   │   ├── index.php         # Daftar berita
│   │   ├── create.php        # Tambah berita
│   │   ├── edit.php          # Edit berita
│   │   └── view.php          # Detail berita
│   └── portofolio/
│       ├── index.php         # Daftar portofolio
│       ├── create.php        # Tambah portofolio
│       ├── edit.php          # Edit portofolio
│       └── view.php          # Detail portofolio
├── assets/
│   └── uploads/
│       ├── berita/           # Upload gambar berita
│       └── portofolio/       # Upload gambar portofolio
├── database.sql              # File SQL untuk membuat database
├── login.php                 # Halaman login
├── logout.php                # Proses logout
├── dashboard.php             # Dashboard utama
└── index.php                 # Redirect ke login
```

## Instalasi

### 1. Persiapan Database

1. Buka phpMyAdmin atau MySQL client
2. Import file `admin/database.sql` untuk membuat database dan tabel
3. Database `website_company` akan dibuat dengan tabel:
   - `admin` (user admin)
   - `berita` (konten berita)
   - `portofolio` (konten portofolio)

### 2. Konfigurasi Database

Edit file `admin/config/database.php` sesuai dengan konfigurasi MySQL Anda:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');        // Ganti dengan username MySQL Anda
define('DB_PASS', '');            // Ganti dengan password MySQL Anda
define('DB_NAME', 'website_company');
```

### 3. Set Permission Folder Upload

Pastikan folder upload memiliki permission write:

- `admin/assets/uploads/berita/`
- `admin/assets/uploads/portofolio/`

### 4. Akses Admin Panel

1. Buka browser dan akses: `http://localhost/website-company/constra-bootstrap-main/admin/`
2. Login dengan kredensial default:
   - **Username:** `admin`
   - **Password:** `admin123`

## Penggunaan

### Login Admin

- Akses `/admin/login.php`
- Masukkan username dan password
- Sistem akan redirect ke dashboard setelah login berhasil

### Dashboard

- Menampilkan statistik total berita dan portofolio
- Overview berita dan portofolio terbaru
- Informasi sistem dan user yang login

### Manajemen Berita

- **Daftar Berita:** Lihat semua berita dengan pagination dan pencarian
- **Tambah Berita:** Form untuk menambah berita baru dengan upload gambar
- **Edit Berita:** Modify berita yang sudah ada
- **Detail Berita:** Lihat detail lengkap berita
- **Hapus Berita:** Hapus berita beserta gambarnya

### Manajemen Portofolio

- **Daftar Portofolio:** Grid view dengan filter kategori dan pencarian
- **Tambah Portofolio:** Form untuk menambah portofolio dengan kategori
- **Edit Portofolio:** Modify portofolio yang sudah ada
- **Detail Portofolio:** Lihat detail lengkap portofolio
- **Hapus Portofolio:** Hapus portofolio beserta gambarnya

### Kategori Portofolio

- Penyiraman Tambang
- Revegetasi Tambang
- Supporting Tambang

## Keamanan

- **Session Management:** Login menggunakan PHP session
- **Password Hashing:** Password admin di-hash menggunakan `password_hash()`
- **SQL Injection Protection:** Menggunakan prepared statements
- **File Upload Security:** Validasi tipe file dan ukuran
- **XSS Protection:** Input di-escape dengan `htmlspecialchars()`

## Requirements

- PHP 7.4 atau lebih tinggi
- MySQL 5.7 atau lebih tinggi
- Web server (Apache/Nginx)
- Extension PHP: PDO, GD (untuk image handling)

## Troubleshooting

### Database Connection Error

- Pastikan MySQL server berjalan
- Cek konfigurasi di `config/database.php`
- Pastikan database `website_company` sudah dibuat

### Upload Error

- Pastikan folder `assets/uploads/` dan subfolder memiliki permission write
- Cek PHP configuration untuk `upload_max_filesize` dan `post_max_size`

### Login Error

- Pastikan tabel `admin` sudah terisi dengan user default
- Password default: `admin123` (sudah di-hash di database)

## Customization

### Menambah Admin Baru

```sql
INSERT INTO admin (username, password, email, nama_lengkap)
VALUES ('username_baru', '$2y$10$hashedpassword', 'email@domain.com', 'Nama Lengkap');
```

### Mengubah Ukuran Upload

Edit di `config/database.php`:

```php
// Ubah 5MB menjadi ukuran yang diinginkan (dalam bytes)
if ($file['size'] > 5000000) {
```

### Menambah Kategori Portofolio

Edit array `$kategori_options` di file portofolio dan update enum di database.

## Support

Jika mengalami masalah, pastikan:

1. XAMPP/WAMP sudah berjalan
2. Database sudah di-import
3. Konfigurasi database sudah benar
4. Permission folder upload sudah di-set

---

**Dibuat dengan ❤️ untuk Website Company**
