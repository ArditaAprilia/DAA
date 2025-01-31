# FitLife - Aplikasi Pemantauan Kesehatan Berbasis Web

## 1. Pendahuluan
FitLife adalah aplikasi berbasis web yang dirancang untuk membantu pengguna dalam memantau dan mengelola kesehatan mereka. Aplikasi ini memberikan fitur-fitur seperti pencatatan aktivitas fisik, pengaturan pola makan, dan pemantauan data kesehatan pengguna.

## 2. Analisis SWOT
**Strengths (Kekuatan):**
- Aplikasi berbasis web yang mudah diakses.
- Menyediakan fitur pemantauan kesehatan yang komprehensif.
- Antarmuka yang user-friendly.

**Weaknesses (Kelemahan):**
- Membutuhkan koneksi internet untuk mengakses.
- Bergantung pada input data manual dari pengguna.

**Opportunities (Peluang):**
- Potensi kerja sama dengan layanan kesehatan dan pusat kebugaran.
- Dapat dikembangkan menjadi aplikasi mobile.

**Threats (Ancaman):**
- Persaingan dengan aplikasi kesehatan lainnya.
- Keamanan data pengguna harus dijamin.

## 3. Metode Penelitian
- Studi literatur terkait aplikasi pemantauan kesehatan.
- Analisis kebutuhan pengguna melalui survei dan wawancara.
- Pengembangan model database dan sistem berbasis kebutuhan yang telah diidentifikasi.

## 4. Tujuan
- Membantu pengguna dalam mengelola kesehatan secara mandiri.
- Menyediakan platform yang mudah digunakan untuk mencatat aktivitas kesehatan.
- Menganalisis data kesehatan pengguna guna memberikan rekomendasi yang lebih baik.

## 5. Persyaratan Bisnis
### 5.1 Persyaratan Fungsional
- Pengguna dapat membuat akun dan masuk ke dalam sistem.
- Pengguna dapat mencatat aktivitas fisik dan pola makan.
- Sistem dapat memberikan rekomendasi berdasarkan data pengguna.
- Admin dapat mengelola data pengguna dan sistem.

### 5.2 Persyaratan Non-Fungsional
- Keamanan data pengguna terjamin.
- Aplikasi dapat diakses melalui berbagai perangkat.
- Performa aplikasi harus responsif dan cepat.

## 6. Perancangan Model Database
### 6.1 Tabel `users`
| Kolom      | Tipe Data | Deskripsi          |
|------------|----------|--------------------|
| id         | INT      | Primary Key        |
| username   | VARCHAR  | Nama pengguna      |
| email      | VARCHAR  | Email pengguna     |
| password   | VARCHAR  | Kata sandi         |
| created_at | TIMESTAMP | Waktu pendaftaran |

### 6.2 Tabel `activities`
| Kolom      | Tipe Data | Deskripsi               |
|------------|----------|-------------------------|
| id         | INT      | Primary Key             |
| user_id    | INT      | Foreign Key dari users  |
| activity   | VARCHAR  | Jenis aktivitas         |
| duration   | INT      | Durasi dalam menit      |
| calories   | INT      | Kalori yang terbakar    |
| date       | DATE     | Tanggal aktivitas       |

### 6.3 Tabel `nutrition`
| Kolom      | Tipe Data | Deskripsi               |
|------------|----------|-------------------------|
| id         | INT      | Primary Key             |
| user_id    | INT      | Foreign Key dari users  |
| food       | VARCHAR  | Nama makanan            |
| calories   | INT      | Kalori dari makanan     |
| date       | DATE     | Tanggal konsumsi        |

## 7. Kesimpulan
Aplikasi FitLife dirancang untuk membantu pengguna dalam mengelola kesehatan mereka dengan lebih baik. Dengan fitur pencatatan aktivitas fisik dan pola makan, pengguna dapat memperoleh wawasan tentang kesehatan mereka dan membuat keputusan yang lebih baik untuk gaya hidup sehat.

---

_Developed by Team FitLife_
