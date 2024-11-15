# Dokumen Persyaratan Bisnis (BRD)

## Proyek: Aplikasi Manajemen Menu Restoran/Cafe  
**Versi**: 1.0  
**Tanggal**: 15 November 2024  

---

## 1. Tujuan Proyek

### Objektif:
Aplikasi ini bertujuan untuk:
- Mempermudah pelanggan dalam melihat menu yang tersedia.
- Membantu admin restoran/cafe mengelola menu, termasuk pembaruan harga dan ketersediaan secara efisien.

---

## 2. Fitur Utama

### **Untuk Pelanggan**
- **Melihat Menu**: Akses daftar menu yang tersedia dengan informasi rinci, termasuk:
  - Nama makanan/minuman.
  - Deskripsi.
  - Harga.
  - Kategori (contoh: makanan, minuman, hidangan penutup).
  - Ketersediaan (tersedia/habis).

### **Untuk Admin**
- **Pengelolaan Menu**: Menambah, mengubah, dan menghapus item menu dengan informasi lengkap.
- **Kategori dan Pengaturan Harga**: Mengelompokkan menu ke dalam kategori yang berbeda dan mengelola harga.

---

## 3. Persyaratan Fungsional

### **Sistem Login**
- **Akses Berdasarkan Peran**: Pelanggan dan admin dapat login dengan hak akses berbeda.

### **Pengaturan & Tampilan Menu**
- **Admin**: Mengelola menu (input, update, delete).
- **Pelanggan**: Hanya dapat melihat menu yang tersedia.

---

## 4. Persyaratan Non-Fungsional
- **Kegunaan**: Antarmuka aplikasi mudah digunakan oleh pelanggan dan admin.
- **Keamanan**: 
  - Hanya admin yang memiliki hak untuk mengelola data menu.
  - Pelanggan hanya bisa mengakses informasi tanpa mengedit.

---

## 5. Model, Migrasi, Seeder, dan Resource

### **Models dan Tabel**

#### **1. Menu**
- **Model**: Menyimpan informasi tentang setiap item menu:
  - Nama makanan/minuman.
  - Deskripsi.
  - Harga.
  - Kategori (contoh: makanan utama, minuman).
  - Ketersediaan (tersedia/habis).

- **Migration**: Struktur tabel:
  - `id`: `bigint UNSIGNED` (Primary Key).
  - `name`: `varchar(255)` - Nama makanan atau minuman.
  - `description`: `text` - Deskripsi singkat.
  - `price`: `decimal(10,2)` - Harga menu.
  - `category`: `varchar(255)` - Kategori makanan atau minuman.
  - `availability`: `boolean` - Status ketersediaan (1 = tersedia, 0 = habis).
  - `image_url`: `varchar(255)` - URL gambar menu.
  - `created_at`: `timestamp` - Waktu data dibuat.
  - `updated_at`: `timestamp` - Waktu data diubah.

- **Seeder**: Data menu awal untuk pengujian aplikasi.
- **Resource**: Endpoint API untuk mengakses data menu, dapat diakses oleh pelanggan dan admin.

---

#### **2. Categories**
- **Model**: Menyimpan informasi tentang kategori menu (contoh: makanan utama, minuman, hidangan penutup).
- **Migration**: Struktur tabel:
  - `id`: `bigint UNSIGNED` (Primary Key).
  - `name`: `varchar(255)` - Nama kategori.
  - `description`: `text` - Deskripsi kategori.
  - `created_at`: `timestamp` - Waktu data dibuat.
  - `updated_at`: `timestamp` - Waktu data diubah.

- **Seeder**: Data kategori awal untuk memudahkan pengelompokan menu.
- **Resource**: Endpoint API untuk mengakses data kategori, dapat diakses oleh admin.

---

## 6. Analisis Permissions untuk Pelanggan dan Admin

### **Permissions yang Diperlukan**
- **Pelanggan**: Hanya membutuhkan akses untuk melihat daftar menu yang tersedia tanpa hak mengubah data menu.
- **Admin**: Memiliki hak akses penuh, termasuk menambah, mengubah, dan menghapus data menu serta mengelola kategori.

### **Implementasi Model dan Seeder untuk Permissions**
- **Model**: Permission (disediakan oleh paket Spatie Laravel Permission):
  - `id`: Primary key dari permission.
  - `name`: Nama dari permission (contoh: `view_menu`).
  - `guard_name`: Guard untuk permission (default: `web`).

- **Seeder: PermissionsSeeder**:
  - **Permissions untuk Pelanggan**:
    - `view_menu`: Mengizinkan pelanggan melihat daftar menu yang tersedia.
  - **Permissions untuk Admin**:
    - `manage_menu`: Mengizinkan admin mengelola daftar menu (tambah, ubah, hapus).
    - `manage_categories`: Mengizinkan admin mengelola kategori menu.

### **Mengapa Migration Permissions Tidak Dibuat?**
Paket Spatie Laravel Permission menyediakan migrasi untuk tabel permissions secara otomatis. Saat menggunakan perintah:

```bash
composer create-project --prefer-dist raugadh/fila-starter
