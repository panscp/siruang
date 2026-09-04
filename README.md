# SIRUANG

**Sistem Informasi Peminjaman Ruang**

SIRUANG adalah aplikasi web untuk membantu proses pengajuan dan pengelolaan peminjaman ruang secara terstruktur. Sistem ini dirancang untuk memudahkan pengguna dalam melihat informasi ruangan, memilih jadwal peminjaman, mengajukan penggunaan ruang, serta memantau status pengajuan.

## Tentang Project

SIRUANG dikembangkan sebagai sistem informasi peminjaman ruang untuk mendukung proses administrasi penggunaan ruangan.

Pada sisi pengguna, sistem menyediakan alur pengajuan mulai dari pemilihan ruangan, pemilihan tanggal dan waktu, pengisian data peminjam dan kegiatan, pemeriksaan ketersediaan, hingga pengiriman pengajuan.

Sistem menggunakan konsep **unit ruangan**, sehingga satu ruangan dapat memiliki beberapa unit yang dapat digunakan berdasarkan ketersediaan.

## Fitur

### Autentikasi
- Registrasi pengguna
- Login pengguna
- Logout
- Pengelolaan profil pengguna

### Informasi Ruangan
- Daftar ruangan
- Detail ruangan
- Informasi kapasitas ruangan
- Deskripsi ruangan
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

- **Laravel 13**
- **PHP 8.3**
- **MySQL**
- **Blade**
- **JavaScript**
- **Vite**
- **HTML**
- **CSS**

## Struktur Project

```text
siruang/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   ├── Models/
│   └── Providers/
├── bootstrap/
├── config/
├── database/
│   ├── factories/
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
├── composer.lock
├── package.json
└── vite.config.js
```

## Arsitektur Data

SIRUANG menggunakan beberapa tabel utama:

- `users`
- `user_profiles`
- `rooms`
- `units`
- `bookings`

Relasi utama:

```text
User
 ├── User Profile
 │
 └── Bookings
       │
       └── Unit
             │
             └── Room
```

Satu `Room` dapat memiliki beberapa `Unit`.

Ketika pengguna mengajukan peminjaman, sistem akan memilih unit aktif yang tersedia berdasarkan tanggal dan waktu yang dipilih.

## Persyaratan

Sebelum menjalankan project, pastikan perangkat sudah memiliki:

- PHP >= 8.3
- Composer
- Node.js
- npm
- MySQL
- Git

## Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/panscp/siruang.git
```

Masuk ke folder project:

```bash
cd siruang
```

### 2. Install Dependency Laravel

```bash
composer install
```

### 3. Install Dependency Frontend

```bash
npm install
```

### 4. Membuat File Environment

Salin file `.env.example` menjadi `.env`.

#### Windows

```bash
copy .env.example .env
```

#### Linux / macOS

```bash
cp .env.example .env
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

### 6. Konfigurasi Database

Buka file:

```text
.env
```

Kemudian sesuaikan konfigurasi database dengan MySQL yang digunakan.

Contoh:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=siruang
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan nilai tersebut dengan konfigurasi database pada komputer masing-masing.

> Jangan memasukkan file `.env` ke repository karena file tersebut dapat berisi informasi rahasia dan konfigurasi lokal.

### 7. Membuat Database

Buat database MySQL dengan nama:

```text
siruang
```

Setelah database dibuat, jalankan migration:

```bash
php artisan migrate
```

### 8. Mengisi Data Awal

Jalankan seeder:

```bash
php artisan db:seed
```

Seeder akan membuat data awal ruangan dan unit yang digunakan oleh sistem.

## Menjalankan Project

Untuk menjalankan project dalam mode development, gunakan **dua terminal**.

### Terminal 1 — Laravel Server

Pastikan berada di folder project:

```text
C:\laragon\www\siruang
```

Kemudian jalankan:

```bash
php artisan serve
```

Jika berhasil, aplikasi dapat diakses melalui:

```text
http://127.0.0.1:8000
```

### Terminal 2 — Vite

Buka terminal baru pada folder project yang sama:

```bash
npm run dev
```

Vite digunakan untuk menjalankan proses development asset frontend.

Biarkan kedua terminal tetap berjalan selama proses pengembangan.

## Akses Halaman

Setelah server Laravel berjalan, beberapa halaman utama dapat diakses melalui:

### Halaman Utama

```text
http://127.0.0.1:8000/
```

### Login

```text
http://127.0.0.1:8000/login
```

### Registrasi

```text
http://127.0.0.1:8000/register
```

### Daftar Ruangan

```text
http://127.0.0.1:8000/rooms
```

### Kalender

```text
http://127.0.0.1:8000/calendar
```

### Dashboard Customer

```text
http://127.0.0.1:8000/dashboard
```

### Pengajuan Peminjaman

```text
http://127.0.0.1:8000/booking
```

### Riwayat Pengajuan

```text
http://127.0.0.1:8000/riwayat
```

### Profil

```text
http://127.0.0.1:8000/profil
```

Halaman yang membutuhkan autentikasi hanya dapat diakses setelah pengguna melakukan login.

## Perintah Laravel yang Sering Digunakan

Membersihkan cache:

```bash
php artisan optimize:clear
```

Melihat daftar route:

```bash
php artisan route:list
```

Menjalankan migration:

```bash
php artisan migrate
```

Menjalankan seeder:

```bash
php artisan db:seed
```

Menjalankan test:

```bash
php artisan test
```

Menjalankan server Laravel:

```bash
php artisan serve
```

## Git Workflow

Setelah melakukan perubahan pada project, perubahan dapat disimpan ke repository dengan:

```bash
git status
git add .
git commit -m "Deskripsi perubahan"
git push
```

Contoh:

```bash
git add .
git commit -m "Update booking interface"
git push
```

## File yang Tidak Disimpan di Repository

Beberapa file dan folder sengaja tidak dimasukkan ke repository, seperti:

```text
.env
/vendor
/node_modules
/public/build
```

Dependency dapat dipasang kembali dengan:

```bash
composer install
npm install
```

## Repository

GitHub:

https://github.com/panscp/siruang

## Status Project

SIRUANG saat ini masih dalam tahap pengembangan.

Fitur sisi pengguna/customer yang telah dikembangkan meliputi:

- autentikasi
- dashboard customer
- informasi ruangan
- pemilihan jadwal
- pemeriksaan ketersediaan
- pengajuan peminjaman
- ringkasan pengajuan
- riwayat pengajuan
- detail pengajuan
- pembatalan pengajuan
- pengelolaan profil

Pengembangan sisi administrator akan dilanjutkan pada tahap berikutnya.
