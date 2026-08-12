<div align="center">

# 📦 Laravel Inventory Management System

Aplikasi web berbasis Laravel untuk membantu pengelolaan inventaris barang secara digital.

Sistem memiliki dua jenis pengguna, yaitu **Admin** dan **Staf**, dengan hak akses yang berbeda sesuai dengan perannya.

Aplikasi digunakan untuk mengelola data barang, kategori, stok, transaksi barang masuk dan keluar, riwayat transaksi, serta memantau kondisi inventaris melalui dashboard.

Dibangun menggunakan **Laravel 13**, **PHP 8.3**, **Blade**, **Tailwind CSS**, **Vite**, dan **MySQL/MariaDB**.

[![Laravel](https://img.shields.io/badge/Laravel-13-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3-38BDF8?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-7-646CFF?style=for-the-badge&logo=vite&logoColor=white)](https://vite.dev)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com)

</div>

---

# 📖 Tentang Project

**Laravel Inventory Management System** adalah aplikasi berbasis web yang digunakan untuk membantu proses pengelolaan dan pemantauan inventaris barang.

Aplikasi dirancang untuk mengelola inventaris secara terstruktur, mulai dari pencatatan data barang, pengelompokan kategori, pemantauan stok, hingga pencatatan transaksi barang masuk dan barang keluar.

Sistem memiliki dua role pengguna:

- **Admin**
- **Staf**

Masing-masing role memiliki hak akses yang berbeda.

**Admin** memiliki akses penuh terhadap fitur administrasi dan pengelolaan data inventaris, sedangkan **Staf** memiliki akses terhadap fitur operasional seperti melihat data barang, melakukan transaksi stok, dan melihat riwayat transaksi.

---

# 🎯 Tujuan Aplikasi

Aplikasi ini dibuat untuk membantu proses pengelolaan inventaris agar:

- Data barang tersimpan secara terstruktur.
- Stok barang dapat dipantau dengan mudah.
- Barang dengan stok rendah dapat diketahui dengan cepat.
- Barang yang sudah habis dapat diketahui dengan mudah.
- Stok tidak dapat dikurangi melebihi jumlah yang tersedia.
- Setiap perubahan stok dapat dicatat melalui transaksi.
- Riwayat transaksi dapat ditelusuri kembali.
- Data barang dapat dikelompokkan berdasarkan kategori.
- Admin dapat mengelola pengguna sistem.
- Admin dapat mengelola kategori barang.
- Informasi inventaris dapat ditampilkan melalui dashboard.

---

# 👥 Role dan Hak Akses

Sistem memiliki dua role utama:

- 👑 **Admin**
- 👤 **Staf**

---

## 👑 Admin

Admin memiliki akses terhadap fitur administrasi dan operasional sistem.

Admin dapat:

- Melihat Dashboard.
- Melihat Data Barang.
- Menambah barang.
- Mengubah data barang.
- Melihat detail barang.
- Menghapus barang.
- Mencari barang.
- Memfilter barang berdasarkan kategori.
- Menggunakan pagination.
- Melakukan transaksi barang masuk.
- Melakukan transaksi barang keluar.
- Melihat riwayat transaksi.
- Mengelola kategori barang.
- Menambah kategori.
- Mengubah kategori.
- Menghapus kategori yang tidak sedang digunakan.
- Mengelola akun pengguna.
- Menambahkan pengguna.
- Mengubah role pengguna.
- Menghapus pengguna.
- Mengelola profile sendiri.
- Mengubah password sendiri.

---

## 👤 Staf

Staf memiliki akses terhadap fitur operasional inventaris.

Staf dapat:

- Melihat Dashboard.
- Melihat Data Barang.
- Mencari barang.
- Memfilter barang berdasarkan kategori.
- Menggunakan pagination.
- Melihat detail barang.
- Melakukan transaksi barang masuk.
- Melakukan transaksi barang keluar.
- Melihat riwayat transaksi.
- Mengelola profile sendiri.
- Mengubah password sendiri.

Staf **tidak dapat**:

- Menambah barang.
- Mengubah data barang.
- Menghapus barang.
- Mengakses halaman Kategori Barang.
- Menambah kategori.
- Mengubah kategori.
- Menghapus kategori.
- Mengakses halaman Kelola Karyawan.
- Menambah pengguna.
- Mengubah role pengguna.
- Menghapus pengguna.

Jika Staf mencoba mengakses halaman yang hanya diperuntukkan bagi Admin secara langsung melalui URL, sistem akan menolak akses dengan response **403 Forbidden**.

---

# 🔐 Matriks Hak Akses

| Fitur | Admin | Staf |
|---|:---:|:---:|
| Dashboard | ✅ | ✅ |
| Melihat Data Barang | ✅ | ✅ |
| Tambah Barang | ✅ | ❌ |
| Edit Barang | ✅ | ❌ |
| Hapus Barang | ✅ | ❌ |
| Detail Barang | ✅ | ✅ |
| Pencarian Barang | ✅ | ✅ |
| Filter Kategori | ✅ | ✅ |
| Pagination | ✅ | ✅ |
| Transaksi Barang Masuk | ✅ | ✅ |
| Transaksi Barang Keluar | ✅ | ✅ |
| Riwayat Transaksi | ✅ | ✅ |
| Kategori Barang | ✅ | ❌ |
| Tambah Kategori | ✅ | ❌ |
| Edit Kategori | ✅ | ❌ |
| Hapus Kategori | ✅ | ❌ |
| Kelola Karyawan | ✅ | ❌ |
| Tambah Pengguna | ✅ | ❌ |
| Ubah Role | ✅ | ❌ |
| Hapus Pengguna | ✅ | ❌ |
| Profile Sendiri | ✅ | ✅ |
| Update Password | ✅ | ✅ |

---

# ✨ Fitur Aplikasi

## 📊 1. Dashboard

Dashboard merupakan halaman utama setelah pengguna berhasil login.

Dashboard menampilkan ringkasan kondisi inventaris.

Informasi yang tersedia antara lain:

- **Total Barang**
- **Total Stok**
- **Total Aset**
- **5 Barang dengan Stok Terendah**
- **Sebaran Barang Berdasarkan Kategori**

### Total Barang

Menampilkan jumlah jenis barang yang tersimpan di dalam sistem.

### Total Stok

Menampilkan jumlah keseluruhan unit barang yang tersedia.

### Total Aset

Menampilkan estimasi nilai aset berdasarkan harga dan jumlah stok.

Rumus:

```text
Total Aset = Harga Barang × Jumlah Stok
```

### Stok Terendah

Dashboard menampilkan beberapa barang dengan jumlah stok paling rendah.

Informasi ini membantu pengguna mengetahui barang yang membutuhkan perhatian.

### Sebaran Kategori

Dashboard menampilkan jumlah barang berdasarkan kategori dalam bentuk grafik.

---

# 📦 2. Data Barang

Halaman **Data Barang** digunakan untuk melihat seluruh barang yang tersimpan di dalam sistem.

Data barang menampilkan informasi seperti:

- Gambar barang
- Nama barang
- Kategori
- Harga
- Stok
- Status stok
- Aksi

### Fitur Admin

Admin dapat:

- Menambah barang.
- Mengubah data barang.
- Melihat detail barang.
- Menghapus barang.

### Fitur Staf

Staf hanya dapat:

- Melihat data barang.
- Melihat detail barang.
- Mencari barang.
- Memfilter barang.
- Menggunakan pagination.

Staf tidak memiliki akses untuk menambah, mengubah, atau menghapus data barang.

---

# 🔎 3. Pencarian Barang

Sistem menyediakan fitur pencarian untuk membantu pengguna menemukan barang tertentu.

Pencarian dilakukan berdasarkan nama barang.

Contoh:

```text
Kabel
```

Sistem akan menampilkan barang yang sesuai dengan kata pencarian.

Fitur pencarian dapat digunakan oleh Admin maupun Staf.

---

# 🗂️ 4. Filter Barang

Data barang dapat difilter berdasarkan kategori.

Fitur ini membantu pengguna menemukan kelompok barang tertentu dengan lebih cepat.

Contoh kategori:

```text
ATK & Kertas
Elektronik
Perkakas & Alat Kerja
Perlengkapan Umum
```

Filter kategori dapat digunakan oleh Admin maupun Staf.

---

# 📄 5. Pagination

Data ditampilkan menggunakan pagination untuk membatasi jumlah data yang ditampilkan pada satu halaman.

Pagination digunakan agar tampilan tetap rapi ketika jumlah barang semakin banyak.

Pagination tersedia pada halaman yang menggunakan daftar data.

---

# 🔍 6. Detail Barang

Setiap barang memiliki halaman detail.

Halaman detail menampilkan informasi seperti:

- Gambar barang.
- Nama barang.
- Kategori.
- Harga.
- Stok.
- Deskripsi barang.
- Riwayat transaksi.

Halaman detail juga menjadi tempat untuk melakukan transaksi stok.

Baik Admin maupun Staf dapat mengakses halaman detail barang.

---

# 📦 7. Manajemen Stok

Sistem menyediakan pengelolaan stok melalui transaksi barang masuk dan barang keluar.

Setiap perubahan stok dilakukan melalui transaksi.

Stok barang tidak dapat dikurangi hingga menjadi nilai negatif.

---

## Barang Masuk

Barang masuk akan menambah jumlah stok.

Contoh:

```text
Stok awal     : 10
Barang masuk  : +5
Stok akhir    : 15
```

---

## Barang Keluar

Barang keluar akan mengurangi jumlah stok.

Contoh:

```text
Stok awal      : 10
Barang keluar  : -3
Stok akhir     : 7
```

---

# ⚠️ 8. Validasi Stok Barang Keluar

Sistem memiliki validasi untuk mencegah stok menjadi negatif.

Jika pengguna mencoba mengeluarkan barang dengan jumlah yang lebih besar dari stok yang tersedia, transaksi akan ditolak.

Contoh:

```text
Stok tersedia : 3
Barang keluar : 5
```

Sistem akan menolak transaksi karena jumlah barang yang dikeluarkan melebihi stok tersedia.

Pesan yang ditampilkan:

```text
Gagal! Stok barang tidak mencukupi untuk dikeluarkan.
```

Validasi ini berlaku untuk Admin maupun Staf.

---

# 🚨 9. Indikator Status Stok

Sistem memberikan indikator kondisi stok berdasarkan jumlah barang yang tersedia.

Ketentuan status stok:

| Jumlah Stok | Status |
|---:|---|
| 0 | 🔴 Habis |
| 1 - 5 | 🟠 Kritis |
| > 5 | 🟢 Aman |

Contoh:

```text
Mouse
Stok   : 2
Status : KRITIS
```

Jika stok mencapai `0`, barang akan memiliki status **HABIS**.

---

# 🔄 10. Transaksi Barang

Transaksi digunakan untuk mencatat perubahan stok barang.

Jenis transaksi yang tersedia:

- **Barang Masuk**
- **Barang Keluar**

Transaksi dilakukan melalui halaman **Detail Barang**.

Ketika transaksi berhasil disimpan, sistem akan menyesuaikan stok barang secara otomatis.

Contoh transaksi:

```text
Tanggal       : 09 Aug 2026
Karyawan      : Staf
Aktivitas     : MASUK
Jumlah        : +5
Keterangan    : Pengadaan barang
```

Transaksi dapat dilakukan oleh Admin maupun Staf.

---

# 📋 11. Riwayat Transaksi

Setiap transaksi yang dilakukan akan dicatat sebagai riwayat transaksi.

Riwayat transaksi dapat digunakan untuk mengetahui perubahan stok barang dari waktu ke waktu.

Informasi transaksi meliputi:

- Tanggal transaksi.
- Pengguna/karyawan.
- Jenis transaksi.
- Jumlah barang.
- Keterangan.
- Perubahan stok.

Contoh:

```text
Tanggal        : 09 Aug 2026, 16:59
Karyawan       : Staf
Aktivitas      : MASUK
Jumlah         : +1
Keterangan     : -
```

---

# 🗂️ 12. Kategori Barang

Kategori digunakan untuk mengelompokkan barang berdasarkan jenisnya.

Contoh kategori:

```text
ATK & Kertas
Elektronik
Perkakas & Alat Kerja
Perlengkapan Umum
```

Fitur pengelolaan kategori **hanya dapat diakses oleh Admin**.

Admin dapat:

- Melihat daftar kategori.
- Menambah kategori.
- Mengubah kategori.
- Menghapus kategori.

Sistem juga menampilkan jumlah produk yang menggunakan setiap kategori.

Kategori yang masih digunakan oleh barang tidak dapat dihapus.

---

# 👥 13. Kelola Karyawan

Admin memiliki halaman khusus untuk mengelola pengguna sistem.

Fitur yang tersedia:

- Melihat daftar pengguna.
- Menambahkan pengguna.
- Mengubah role pengguna.
- Menghapus pengguna.

Role yang tersedia:

```text
Admin
Staf
```

Halaman Kelola Karyawan hanya dapat diakses oleh Admin.

Staf yang mencoba mengakses halaman tersebut akan mendapatkan response:

```text
403 Forbidden
```

---

# 👤 14. Profile

Setiap pengguna memiliki halaman Profile.

Profile dapat digunakan untuk mengelola informasi akun sendiri.

Informasi yang dapat diperbarui:

### Profile Information

- Nama
- Email

### Update Password

Pengguna dapat mengganti password dengan memasukkan:

- Password saat ini.
- Password baru.
- Konfirmasi password.

Fitur profile tersedia untuk Admin maupun Staf.

---

# 🔐 15. Authentication & Authorization

Aplikasi menggunakan sistem authentication Laravel untuk mengamankan akses pengguna.

Fitur authentication meliputi:

- Login.
- Logout.
- Proteksi halaman.
- Profile pengguna.
- Update password.

Selain authentication, aplikasi menggunakan **role-based authorization**.

Role yang digunakan:

```text
admin
staf
```

Pembatasan halaman Admin diterapkan menggunakan middleware:

```text
admin
```

Contoh pembagian akses:

```text
ADMIN
├── Dashboard
├── Data Barang
│   ├── Tambah
│   ├── Edit
│   ├── Detail
│   └── Hapus
├── Transaksi
├── Riwayat Transaksi
├── Kategori Barang
├── Kelola Karyawan
└── Profile

STAF
├── Dashboard
├── Data Barang
│   ├── Pencarian
│   ├── Filter
│   ├── Pagination
│   └── Detail
├── Transaksi
├── Riwayat Transaksi
└── Profile
```

Pengguna dengan role `staf` tidak dapat mengakses halaman administrasi secara langsung melalui URL.

---

# 🚫 16. Pembatasan Akses

Sistem menerapkan pembatasan akses pada halaman khusus Admin.

Halaman yang dilindungi:

```text
/categories
/users
```

Jika pengguna dengan role `staf` mencoba membuka halaman tersebut, sistem akan memberikan response:

```text
403 Forbidden
```

Pembatasan dilakukan melalui middleware `admin`.

---

# 🌙 17. Dark Mode

Aplikasi menyediakan mode tampilan:

- ☀️ Light Mode
- 🌙 Dark Mode

Dark Mode digunakan untuk memberikan pengalaman penggunaan yang lebih nyaman pada kondisi pencahayaan rendah.

---

# 📱 18. Responsive Interface

Antarmuka aplikasi dirancang agar dapat menyesuaikan ukuran layar.

Aplikasi dapat digunakan melalui:

- Desktop
- Laptop
- Tablet
- Smartphone

---

# 🛠️ Teknologi yang Digunakan

| Teknologi | Versi | Fungsi |
|---|---:|---|
| PHP | ^8.3 | Bahasa pemrograman |
| Laravel | ^13.0 | Backend framework |
| Blade | Laravel | Template frontend |
| Tailwind CSS | ^3.1 | Styling dan UI |
| Vite | ^7.0.7 | Frontend build tool |
| Alpine.js | ^3.4.2 | Interaksi frontend |
| MySQL / MariaDB | - | Database |
| Composer | - | Package manager PHP |
| NPM | - | Package manager JavaScript |
| Laragon | - | Local development environment |

---

# 💻 Persyaratan Sistem

Sebelum menjalankan project, pastikan komputer telah memiliki:

- PHP 8.3+
- Composer
- Node.js
- NPM
- Git
- MySQL/MariaDB
- Laragon

Cek PHP:

```bash
php -v
```

Cek Composer:

```bash
composer -V
```

Cek Node.js:

```bash
node -v
```

Cek NPM:

```bash
npm -v
```

Cek Git:

```bash
git --version
```

---

# 🚀 Instalasi

## 1. Clone Repository

Masuk ke folder Laragon:

```bash
cd C:\laragon\www
```

Clone repository:

```bash
git clone https://github.com/HmmDzky/laravel-inventory-app.git
```

Masuk ke folder project:

```bash
cd laravel-inventory-app
```

---

## 2. Install Dependency Laravel

Jalankan:

```bash
composer install
```

---

## 3. Install Dependency Frontend

Jalankan:

```bash
npm install
```

---

## 4. Konfigurasi Environment

Buat file `.env` dari `.env.example`.

### Windows

```bash
copy .env.example .env
```

### Linux / macOS / Git Bash

```bash
cp .env.example .env
```

---

# 🗄️ Konfigurasi Database

Buat database baru menggunakan MySQL/MariaDB.

Contoh nama database:

```text
laravel_inventory
```

Kemudian buka file:

```text
.env
```

Sesuaikan konfigurasi database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_inventory
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan username dan password database dengan konfigurasi komputer masing-masing.

---

# 🔑 Generate Application Key

Jalankan:

```bash
php artisan key:generate
```

---

# 🗃️ Migration

Setelah database dan `.env` dikonfigurasi, jalankan:

```bash
php artisan migrate
```

Jika project menggunakan seeder:

```bash
php artisan db:seed
```

atau:

```bash
php artisan migrate --seed
```

---

# 🔗 Storage Link

Jika aplikasi menggunakan Laravel Storage untuk file publik, jalankan:

```bash
php artisan storage:link
```

---

# ▶️ Menjalankan Aplikasi

Untuk menjalankan environment development:

```bash
composer run dev
```

Kemudian buka:

```text
http://127.0.0.1:8000
```

Terminal harus tetap berjalan selama aplikasi digunakan.

---

# 🖥️ Menjalankan Secara Manual

Jika ingin menjalankan Laravel dan Vite secara terpisah, gunakan dua terminal.

### Terminal 1 — Laravel

```bash
php artisan serve
```

### Terminal 2 — Vite

```bash
npm run dev
```

Kemudian buka:

```text
http://127.0.0.1:8000
```

---

# 🌐 Menjalankan dengan Laragon

Jika project berada di:

```text
C:\laragon\www\laravel-inventory-app
```

Laragon dapat menyediakan local domain:

```text
http://laravel-inventory-app.test
```

Jika menggunakan Laravel development server:

```text
http://127.0.0.1:8000
```

---

# 🧭 Alur Penggunaan Aplikasi

Alur umum aplikasi:

```text
                              LOGIN
                                │
                                ▼
                           DASHBOARD
                                │
                ┌───────────────┴───────────────┐
                │                               │
                ▼                               ▼
           DATA BARANG                       PROFILE
                │                               │
       ┌────────┼────────┐                      ├── Update Profile
       │        │        │                      └── Update Password
       ▼        ▼        ▼
     Cari     Filter   Pagination
       │        │        │
       └────────┴────────┘
                │
                ▼
             DETAIL
                │
        ┌───────┴────────┐
        │                │
        ▼                ▼
 RIWAYAT TRANSAKSI   CATAT TRANSAKSI
                         │
                    ┌────┴────┐
                    ▼         ▼
                  MASUK     KELUAR
                    │         │
                    └────┬────┘
                         ▼
                    UPDATE STOK


                         ADMIN ONLY
                              │
             ┌────────────────┴────────────────┐
             │                                 │
             ▼                                 ▼
      DATA BARANG CRUD                  KATEGORI BARANG
             │                                 │
       ┌─────┼─────┐                     ┌─────┼─────┐
       ▼     ▼     ▼                     ▼     ▼     ▼
     Tambah Edit  Hapus                Tambah Edit  Hapus
                                                            
                              │
                              ▼
                       KELOLA KARYAWAN
                              │
                       ┌──────┼──────┐
                       ▼      ▼      ▼
                     Lihat  Tambah  Ubah Role
                                      │
                                      ▼
                                    Hapus
```

---

# 🗂️ Struktur Project

```text
laravel-inventory-app/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Models/
│   └── ...
│
├── bootstrap/
│
├── config/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
│
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   ├── console.php
│   ├── web.php
│   └── auth.php
│
├── storage/
│
├── tests/
│
├── .env.example
├── artisan
├── composer.json
├── package.json
├── vite.config.js
└── README.md
```

---

# 🧩 Halaman Utama Aplikasi

## Dashboard

URL:

```text
/dashboard
```

Digunakan untuk menampilkan ringkasan kondisi inventaris.

Informasi:

- Total barang.
- Total stok.
- Total aset.
- Barang dengan stok paling rendah.
- Distribusi kategori.

---

## Data Barang

URL:

```text
/products
```

Digunakan untuk melihat seluruh data barang.

### Admin

Admin memiliki akses:

- Melihat barang.
- Tambah barang.
- Edit barang.
- Hapus barang.
- Detail barang.
- Pencarian.
- Filter kategori.
- Pagination.

### Staf

Staf memiliki akses:

- Melihat barang.
- Detail barang.
- Pencarian.
- Filter kategori.
- Pagination.

---

## Detail Barang

Contoh URL:

```text
/products/{id}
```

Halaman ini menampilkan:

- Gambar barang.
- Nama barang.
- Kategori.
- Harga.
- Stok.
- Deskripsi.
- Riwayat transaksi.
- Form transaksi baru.

---

## Kategori Barang

URL:

```text
/categories
```

**Khusus Admin.**

Fitur:

- Daftar kategori.
- Tambah kategori.
- Edit kategori.
- Hapus kategori.

---

## Kelola Karyawan

URL:

```text
/users
```

**Khusus Admin.**

Fitur:

- Daftar pengguna.
- Tambah pengguna.
- Mengubah role.
- Menghapus pengguna.

---

## Profile

URL:

```text
/profile
```

Digunakan untuk mengelola informasi akun pengguna.

Fitur:

- Update nama.
- Update email.
- Update password.

---

# 📊 Konsep Data Inventaris

Setiap barang memiliki informasi dasar:

```text
Nama Barang
Kategori
Harga
Stok
Deskripsi
Gambar
```

Nilai aset dihitung berdasarkan:

```text
Total Aset = Harga Barang × Jumlah Stok
```

Contoh:

```text
Harga : Rp100.000
Stok  : 10

Nilai aset = Rp100.000 × 10
           = Rp1.000.000
```

---

# 🔄 Konsep Transaksi

## Barang Masuk

```text
Stok Baru = Stok Lama + Jumlah Masuk
```

## Barang Keluar

```text
Stok Baru = Stok Lama - Jumlah Keluar
```

Barang keluar tidak dapat dilakukan jika jumlah yang dikeluarkan lebih besar dari stok tersedia.

---

# ⚠️ Konsep Status Stok

Sistem menggunakan indikator kondisi stok:

```text
0       → HABIS
1 - 5   → KRITIS
> 5     → AMAN
```

Contoh:

```text
Mouse
Stok   : 2
Status : KRITIS
```

Jika stok mencapai `0`, barang memiliki status **HABIS**.

---

# 🧪 Testing

Project menggunakan **Pest** sebagai framework testing.

Menjalankan testing:

```bash
composer test
```

atau:

```bash
php artisan test
```

---

# 🏗️ Build Frontend

Untuk membuat asset frontend versi production:

```bash
npm run build
```

---

# 🔄 Mendapatkan Update Terbaru

Jika project sudah pernah di-install:

```bash
git pull
```

Jika terdapat perubahan dependency PHP:

```bash
composer install
```

Jika terdapat perubahan dependency JavaScript:

```bash
npm install
```

Jika terdapat perubahan database:

```bash
php artisan migrate
```

Kemudian jalankan kembali:

```bash
composer run dev
```

---

# 🧹 Troubleshooting

## 1. Error `Your requirements could not be resolved`

Periksa versi PHP:

```bash
php -v
```

Pastikan menggunakan PHP 8.3 atau versi yang sesuai dengan requirement project.

Kemudian:

```bash
composer install
```

---

## 2. Error `vendor/autoload.php not found`

Jalankan:

```bash
composer install
```

---

## 3. Error `node_modules` tidak ditemukan

Jalankan:

```bash
npm install
```

Kemudian:

```bash
npm run dev
```

---

## 4. Error `No application encryption key has been specified`

Jalankan:

```bash
php artisan key:generate
```

---

## 5. Error koneksi database

Periksa konfigurasi:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_inventory
DB_USERNAME=root
DB_PASSWORD=
```

Pastikan:

- MySQL/MariaDB sedang berjalan.
- Database sudah dibuat.
- Nama database benar.
- Username database benar.
- Password database benar.

Setelah mengubah `.env`:

```bash
php artisan config:clear
```

---

## 6. CSS atau JavaScript tidak muncul

Jalankan:

```bash
npm install
npm run dev
```

atau:

```bash
composer run dev
```

---

## 7. Port 8000 sudah digunakan

Gunakan port lain:

```bash
php artisan serve --port=8001
```

Kemudian buka:

```text
http://127.0.0.1:8001
```

---

## 8. Perubahan `.env` tidak terbaca

Jalankan:

```bash
php artisan config:clear
```

Jika diperlukan:

```bash
php artisan cache:clear
```

---

# 🔐 Keamanan

Jangan meng-upload file `.env` ke repository.

File `.env` dapat berisi informasi sensitif seperti:

- Password database.
- API key.
- Secret key.
- Credential layanan eksternal.

Gunakan:

```text
.env.example
```

sebagai template konfigurasi.

Pastikan `.env` tercantum dalam `.gitignore`.

Aplikasi juga menerapkan pembatasan akses berdasarkan role.

Role yang tersedia:

```text
admin
staf
```

Halaman administrasi dilindungi menggunakan middleware `admin`.

Halaman khusus Admin:

```text
/categories
/users
```

Pengguna dengan role `staf` tidak dapat mengakses halaman tersebut secara langsung.

---

# 📌 File Konfigurasi Penting

| File | Fungsi |
|---|---|
| `composer.json` | Dependency dan script Laravel |
| `package.json` | Dependency frontend |
| `.env` | Konfigurasi environment |
| `.env.example` | Template environment |
| `vite.config.js` | Konfigurasi Vite |
| `routes/web.php` | Route aplikasi |
| `routes/auth.php` | Route authentication |
| `database/migrations/` | Struktur database |
| `database/seeders/` | Data awal database |
| `resources/views/` | Tampilan Blade |
| `resources/css/` | File CSS |
| `resources/js/` | JavaScript |
| `app/Models/` | Model database |
| `app/Http/Controllers/` | Logic aplikasi |
| `app/Http/Middleware/` | Middleware dan pembatasan akses |

---

# 👨‍💻 Perintah Laravel yang Sering Digunakan

### Menjalankan server

```bash
php artisan serve
```

### Menjalankan development environment

```bash
composer run dev
```

### Membuat migration

```bash
php artisan make:migration nama_migration
```

### Membuat model

```bash
php artisan make:model NamaModel
```

### Membuat controller

```bash
php artisan make:controller NamaController
```

### Melihat daftar route

```bash
php artisan route:list
```

### Membersihkan konfigurasi

```bash
php artisan config:clear
```

### Membersihkan cache

```bash
php artisan cache:clear
```

### Membuat storage link

```bash
php artisan storage:link
```

### Menjalankan migration

```bash
php artisan migrate
```

### Menjalankan seeder

```bash
php artisan db:seed
```

### Menjalankan testing

```bash
php artisan test
```

---

# 📋 Instalasi Singkat

Jika seluruh software sudah tersedia:

```bash
# 1. Masuk ke folder Laragon
cd C:\laragon\www

# 2. Clone repository
git clone https://github.com/HmmDzky/laravel-inventory-app.git

# 3. Masuk ke project
cd laravel-inventory-app

# 4. Install dependency PHP
composer install

# 5. Install dependency JavaScript
npm install

# 6. Buat file .env
copy .env.example .env

# 7. Generate application key
php artisan key:generate

# 8. Buat database
# Nama database:
# laravel_inventory

# 9. Jalankan migration
php artisan migrate

# 10. Buat storage link
php artisan storage:link

# 11. Jalankan aplikasi
composer run dev
```

Kemudian buka:

```text
http://127.0.0.1:8000
```

---

# 🤝 Kontribusi

Jika ingin berkontribusi pada project:

1. Fork repository.
2. Buat branch baru.
3. Lakukan perubahan.
4. Commit perubahan.
5. Push branch ke GitHub.
6. Buat Pull Request.

Contoh:

```bash
git checkout -b fitur-baru

git add .

git commit -m "Menambahkan fitur baru"

git push origin fitur-baru
```

---

# 📄 License

Project ini menggunakan lisensi **MIT**.

---

<div align="center">

### 📦 Laravel Inventory Management System

Inventory Management System berbasis Laravel 13

**Admin & Staf**

Built with ❤️ using Laravel 13

</div>
