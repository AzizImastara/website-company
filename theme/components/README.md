# Component System - Constra Template

Folder ini berisi komponen-komponen yang dapat digunakan kembali untuk template Constra.

## Struktur Folder

```
components/
├── navbar.html           # Komponen navbar dan header
├── footer.html           # Komponen footer
├── component-loader.js   # JavaScript untuk memuat komponen
├── template-example.html # Contoh penggunaan komponen
└── README.md            # Dokumentasi ini
```

## Komponen yang Tersedia

### 1. Navbar (navbar.html)

Berisi:

- Top bar dengan informasi kontak dan social media
- Header dengan logo dan informasi perusahaan
- Navigation menu dengan dropdown
- Search functionality

### 2. Footer (footer.html)

Berisi:

- Informasi about us
- Working hours
- Services links
- Copyright dan footer menu
- Back to top button

## Cara Penggunaan

### Metode 1: Menggunakan JavaScript Component Loader

1. **Include JavaScript file** di halaman HTML Anda:

```html
<script src="components/component-loader.js"></script>
```

2. **Buat container** untuk komponen di HTML:

```html
<!-- Untuk Navbar -->
<div id="navbar-container"></div>

<!-- Untuk Footer -->
<div id="footer-container"></div>
```

3. **Komponen akan dimuat otomatis** saat halaman selesai loading.

### Metode 2: Server-Side Include (PHP)

Jika menggunakan PHP, Anda bisa include komponen langsung:

```php
<?php include 'components/navbar.html'; ?>

<!-- Konten halaman Anda -->

<?php include 'components/footer.html'; ?>
```

### Metode 3: Manual Copy-Paste

Anda juga bisa menyalin kode HTML dari file komponen dan menempelkannya langsung ke halaman Anda.

## Contoh Implementasi

Lihat file `template-example.html` untuk contoh lengkap cara menggunakan komponen.

## Keuntungan Menggunakan Sistem Komponen

1. **Konsistensi**: Navbar dan footer yang sama di seluruh website
2. **Maintainability**: Update sekali, berlaku di semua halaman
3. **Reusability**: Komponen dapat digunakan di halaman manapun
4. **Modular**: Mudah untuk menambah atau menghapus komponen
5. **Clean Code**: HTML yang lebih bersih dan terorganisir

## Customization

### Mengubah Navbar

Edit file `components/navbar.html` dan perubahan akan berlaku di seluruh website.

### Mengubah Footer

Edit file `components/footer.html` dan perubahan akan berlaku di seluruh website.

### Menambah Komponen Baru

1. Buat file HTML baru di folder `components/`
2. Tambahkan fungsi loading di `component-loader.js`
3. Buat container di halaman HTML yang membutuhkan komponen tersebut

## Troubleshooting

### Komponen tidak muncul

- Pastikan path ke file komponen benar
- Cek console browser untuk error JavaScript
- Pastikan server mendukung AJAX requests (mungkin perlu local server)

### Styling tidak sesuai

- Pastikan CSS utama sudah di-load sebelum komponen
- Cek apakah ada konflik CSS

## Browser Compatibility

Component loader menggunakan:

- `fetch()` API (modern browsers)
- `DOMContentLoaded` event

Untuk browser lama, mungkin perlu polyfill untuk `fetch()`.

## Tips Penggunaan

1. **Development**: Gunakan local server (seperti XAMPP, WAMP, atau Live Server) untuk testing
2. **Production**: Pastikan path komponen sesuai dengan struktur server
3. **Performance**: Untuk website yang kompleks, pertimbangkan untuk menggunakan build tools seperti webpack atau gulp
4. **SEO**: Untuk SEO yang optimal, pertimbangkan server-side rendering

## Next Steps

Anda bisa mengembangkan sistem ini lebih lanjut dengan:

- Menambah komponen lain (sidebar, hero section, etc.)
- Menggunakan template engine seperti Handlebars atau Mustache
- Implementasi dengan framework JavaScript modern (React, Vue, Angular)
- Menggunakan build tools untuk optimasi
