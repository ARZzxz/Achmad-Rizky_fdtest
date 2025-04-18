
---

```md
# Aplikasi Manajemen Buku - Laravel

Aplikasi ini merupakan aplikasi manajemen buku dengan fitur autentikasi pengguna, CRUD buku, dashboard, dan halaman landing publik dengan filter dan pagination. Dibangun menggunakan Laravel dan PostgreSQL.

## Fitur Utama

- Registrasi dan Login pengguna
- Verifikasi email
- Reset password
- Dashboard pengguna
- Manajemen Buku (Tambah, Edit, Hapus)
- Halaman landing publik (daftar buku dengan filter dan pagination)
- Unit Test & Integration Test

---

## 🛠 Instalasi

Ikuti langkah-langkah berikut untuk menjalankan project ini di lingkungan lokal Anda:

### 1. Clone Repository

```bash
git clone https://github.com/ARZzxz/Achmad-Rizky_fdtest.git
cd nama-repo
```

### 2. Install Dependensi

```bash
composer install
npm install
```

### 3. Copy File `.env`

```bash
cp .env.example .env
```

### 4. Atur Konfigurasi Environment

Edit file `.env` sesuai kebutuhan, khususnya bagian berikut:

```env
APP_NAME="Aplikasi Buku"
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=AchmadRizky_fdtest
DB_USERNAME=postgres
DB_PASSWORD=devani0612
```

### 5. Generate Key Aplikasi

```bash
php artisan key:generate
```

### 6. Migrasi dan Seeder Database

```bash
php artisan migrate --seed
```

> *Opsional: Untuk membuat data dummy buku, pastikan ada factory dan seeder-nya.*

### 7. Jalankan Server Lokal

```bash
php artisan serve
```

### 8. Jalankan Vite (untuk frontend)

```bash
npm run dev
```

---

## 🧪 Menjalankan Test

Untuk menjalankan unit test dan integration test:

```bash
php artisan test
```

---

## 📂 Penyimpanan Gambar

Gambar (thumbnail) buku disimpan di dalam folder `storage/app/public/thumbnails`. Untuk dapat diakses publik:

```bash
php artisan storage:link
```

---
