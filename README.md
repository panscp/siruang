# SIRUANG

**Sistem Informasi Peminjaman Ruang**

SIRUANG adalah aplikasi web untuk membantu proses pengajuan dan pengelolaan peminjaman ruang secara terstruktur. Sistem ini dirancang untuk memudahkan pengguna dalam melihat informasi ruangan, memilih jadwal peminjaman, mengajukan penggunaan ruang, serta memantau status pengajuan.

## Tentang Project

SIRUANG dikembangkan sebagai sistem informasi peminjaman ruang untuk mendukung proses administrasi penggunaan ruangan.

Pada sisi pengguna, sistem menyediakan alur pengajuan yang terdiri dari pemilihan ruangan, pemilihan tanggal dan waktu, pengisian data peminjam dan kegiatan, pemeriksaan ketersediaan, hingga pengiriman pengajuan.

Sistem menggunakan konsep unit ruangan sehingga satu ruangan dapat memiliki beberapa unit yang dapat digunakan secara bergantian berdasarkan ketersediaan.

## Fitur

### Autentikasi
- Login pengguna
- Registrasi pengguna
- Logout
- Pengelolaan profil pengguna

### Informasi Ruangan
- Daftar ruangan
- Detail ruangan
- Informasi kapasitas dan deskripsi ruangan
- Struktur ruangan dan unit

### Pengajuan Peminjaman
- Pemilihan ruangan
- Pemilihan tanggal peminjaman
- Pemilihan waktu mulai dan selesai
- Pemeriksaan ketersediaan ruangan
- Pengisian data peminjam
- Pengisian data kegiatan
- Ringkasan pengajuan sebelum dikirim
- Pembuatan kode pengajuan otomatis
- Pengiriman pengajuan peminjaman

### Riwayat Pengajuan
- Melihat seluruh pengajuan pengguna
- Filter berdasarkan status
- Melihat detail pengajuan
- Membatalkan pengajuan yang masih berstatus menunggu

### Status Pengajuan

Pengajuan memiliki beberapa status:

- `menunggu`
- `disetujui`
- `ditolak`
- `selesai`
- `dibatalkan`

## Teknologi

Project ini dibangun menggunakan:

- Laravel 13
- PHP 8.3
- MySQL
- Blade
- JavaScript
- Vite
- HTML
- CSS

## Struktur Utama

```text
siruang/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
├── storage/
├── tests/
├── artisan
├── composer.json
├── package.json
└── vite.config.js
