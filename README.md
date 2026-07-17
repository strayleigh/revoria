# Sistem Manajemen Karang Taruna REVORIA

Sistem Manajemen Karang Taruna REVORIA adalah aplikasi berbasis web yang dikembangkan menggunakan **Laravel 13** untuk membantu pengelolaan administrasi dan kegiatan Karang Taruna **REVORIA** secara digital. Sistem ini dirancang untuk mempermudah pengurus dalam mengelola data anggota, kegiatan, kepanitiaan, absensi, dokumen, keuangan, serta penyusunan laporan.

## ✨ Fitur

- Dashboard
- Manajemen Anggota
- Manajemen Kegiatan
- Manajemen Kepanitiaan
- Manajemen Absensi
- Manajemen Dokumen (Google Drive)
- Manajemen Keuangan
- Laporan
- Login & Hak Akses Pengguna

## 🛠️ Teknologi

- Laravel 13
- PHP 8.5+
- MySQL
- Bootstrap 5
- Blade Template Engine
- Composer
- Git & GitHub

## 📂 Struktur Project

```
app/
database/
public/
resources/
routes/
```

## 🚀 Instalasi

Clone repository

```bash
git clone https://github.com/strayleigh/revoria.git
```

Masuk ke folder project

```bash
cd revoria
```

Install dependency

```bash
composer install
```

Salin file environment

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Atur konfigurasi database pada file `.env`.

Jalankan migration

```bash
php artisan migrate
```

Jalankan server

```bash
php artisan serve
```

Buka browser

```
http://127.0.0.1:8000
```

## 🗄️ Modul Sistem

- Dashboard
- Anggota
- Kegiatan
- Kepanitiaan
- Absensi
- Dokumen
- Keuangan
- Laporan
- Profil Pengguna

## 📌 Status

🚧 Project masih dalam tahap pengembangan.

---

**Mata Kuliah:** Rekayasa Perangkat Lunak  
**Framework:** Laravel 13
