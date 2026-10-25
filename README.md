# KursusKu - Prototipe Platform Kursus Daring

KursusKu adalah aplikasi prototipe platform pendaftaran dan pengelolaan kursus daring yang dikembangkan menggunakan PHP native dan CSS modern tanpa ketergantungan framework eksternal. Proyek ini memadukan materi pembelajaran pemrograman web berbasis PHP dari Pertemuan 1 hingga Pertemuan 6.

---

## Panduan Menjalankan Proyek di Laragon

Untuk menjalankan proyek ini di lingkungan lokal menggunakan Laragon, ikuti langkah-langkah berikut:

1. **Pastikan Laragon Terpasang**:
   - Pastikan Laragon telah terpasang di komputer (disarankan menggunakan PHP versi 8.1 ke atas).
2. **Lokasi Proyek**:
   - Letakkan folder proyek pada direktori web root Laragon:
     ```text
     D:\laragon\www\kursusku-prototype
     ```
3. **Menjalankan Web Server**:
   - Buka aplikasi Laragon, lalu klik tombol **Start All** untuk mengaktifkan Apache.
4. **Mengakses Melalui Peramban**:
   - Buka peramban web (browser), lalu akses salah satu alamat berikut:
     - `http://localhost/kursusku-prototype`
     - `http://kursusku-prototype.test` (jika fitur Pretty URLs Laragon aktif)
5. **Navigasi Halaman Utama**:
   - Halaman beranda: `index.php`
   - Formulir pendaftaran: `register.php`
   - Riwayat pendaftaran: `history.php`
   - Demo pencarian GET: `get-demo.php`
   - Pengujian biaya: `fee-tests.php`

---

## Struktur Direktori dan Berkas

```text
kursusku-prototype/
├── assets/
│   ├── css/
│   │   ├── fee-calculator.css   # Gaya tata letak kalkulator biaya
│   │   ├── polish.css           # Gaya penyempurnaan UI dan kartu
│   │   ├── style.css            # Desain sistem dan token warna utama
│   │   └── summary.css          # Gaya tampilan ringkasan transaksi
│   ├── images/                  # Aset gambar visual
│   └── video/                   # Aset media video
├── evidance/                    # Dokumentasi tangkapan layar praktikum
├── course-data.php              # Data katalog kursus awal
├── data.php                     # Konfigurasi data kursus, fasilitas, dan diskon
├── index.php                    # Halaman beranda dan katalog kursus
├── registration.php             # Formulir pendaftaran tahap awal
├── process-registration.php     # Pemrosesan pendaftaran tahap awal
├── register.php                 # Formulir pendaftaran lanjutan dinamis
├── process.php                  # Pemrosesan POST lanjutan dan validasi 422
├── history.php                  # Halaman log riwayat pendaftaran dummy
├── get-demo.php                 # Demonstrasi form GET dan pembacaan parameter URL
├── fee-calculator.php           # Simulasi kalkulator estimasi biaya kursus
├── fee-tests.php                # Unit testing logika rumus biaya (PASS/FAIL)
├── helpers.php                  # Kumpulan fungsi bantuan (rupiah, status, kursi)
├── type-data-test.php           # Pengujian tipe data string, int, bool, array
├── string-test.php              # Pengujian fungsi manipulasi string
├── date-test.php                # Pengujian fungsi tanggal dan zona waktu Asia/Jakarta
├── procedure-test.php           # Demonstrasi prosedur void untuk pencetakan pesan
├── operator-test.php            # Pengujian operator aritmatika dan logika
├── bitwise-test.php             # Pengujian operasi bitwise permission
├── logic-test.php               # Pengujian ekspresi logika kondisional
├── loop-lab.php                 # Laboratorium perulangan katalog dan fasilitas
├── test-matrix.php              # Matriks pengujian perhitungan biaya
├── test-functions.php           # Pengujian fungsi helper
├── validation-test.php          # Pengujian aturan validasi
├── server-time.php              # Demonstrasi waktu server
├── hello.html                   # Halaman statis pengantar HTML
├── PORTOFOLIO-CHECKLIST.md      # Matriks kelengkapan fitur pertemuan 1-6
└── README.md                    # Dokumentasi utama proyek
```

---

## Ringkasan Fitur Pertemuan 1–6

### Pertemuan 1: Pengenalan Lingkungan Kerja & Struktur Dasar
- Konfigurasi server lokal menggunakan Laragon (Apache dan PHP).
- Penataan struktur direktori kerja web root.
- Pembuatan dokumen HTML semantik pertama (`hello.html`).

### Pertemuan 2: Desain Antarmuka & Tata Letak Responsif
- Perancangan landing page responsif pada desktop dan perangkat seluler (`index.php`).
- Penerapan CSS modern dengan flexbox, grid, dan media query (`assets/css/style.css`).
- Penambahan elemen navigasi terpadu, kartu katalog, dan section keunggulan.

### Pertemuan 3: Perhitungan Biaya & Logika Aritmatika
- Perancangan rumus estimasi biaya kursus (`fee-calculator.php`).
- Perhitungan subtotal, persentase diskon, dan biaya administrasi.
- Eksplorasi operator aritmatika, logika, dan bitwise (`operator-test.php`, `bitwise-test.php`).

### Pertemuan 4: Modularisasi Fungsi & Data Terpisah
- Pemisahan kode ke dalam modul helper (`helpers.php`).
- Pengelolaan array katalog kursus pada berkas terpisah (`course-data.php`).
- Validasi fungsi bantuan melalui berkas pengujian (`test-functions.php`, `find-course-test.php`).

### Pertemuan 5: Pengelolaan Formulir Web (GET & POST)
- Pembuatan antarmuka formulir pendaftaran interaktif (`registration.php`).
- Pengiriman data melalui metode POST dan penerimaan pada server (`process-registration.php`).
- Penanganan parameter query string melalui metode GET secara aman (`get-demo.php`).
- Penerapan sanitasi keluaran untuk mencegah celah keamanan XSS.

### Pertemuan 6: Validasi Server-Side, Struktur Majemuk & Simulasi Data
- Formulir pendaftaran lanjutan dengan opsi pilihan yang dirender dinamis dari array (`register.php`, `data.php`).
- Validasi server-side menyeluruh dengan status kode HTTP 422 saat data tidak valid (`process.php`).
- Perhitungan diskon berjenjang berdasarkan kategori peserta (Pelajar, Pendidik, Alumni, Umum).
- Unit testing otomatis logika biaya dengan skenario pengujian berstatus PASS/FAIL (`fee-tests.php`).
- Demonstrasi fungsi bawaan PHP: tipe data, manipulasi string, penanggalan, dan prosedur void (`type-data-test.php`, `string-test.php`, `date-test.php`, `procedure-test.php`).

---

## Catatan Khusus Mengenai Riwayat Pendaftaran (History)

Halaman riwayat pendaftaran (`history.php`) menyajikan **data simulasi dummy** yang dimuat langsung dari struktur array PHP statis di memori. 

Aplikasi prototipe ini sengaja dirancang untuk tahap praktikum dasar tanpa melibatkan koneksi ke database relasional (seperti MySQL, MariaDB, atau PostgreSQL). Oleh karena itu:
- Formulir pendaftaran yang berhasil disubmit pada `process.php` menampilkan ringkasan langsung, namun tidak tersimpan ke database persisten.
- Data pada halaman riwayat tidak berubah secara dinamis karena bersumber dari data awal untuk tujuan demonstrasi antarmuka tabel dan perulangan data.

---

## Keamanan dan Praktik Baik

1. **Sanitasi Data Masukan**: Semua data yang diterima dari pengguna dan dicetak kembali ke antarmuka web diproses menggunakan fungsi `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')`.
2. **Validasi Kuat**: Nilai numerik divalidasi dengan `filter_var()` dan batas rentang kuota serta jumlah paket yang diizinkan.
3. **Penanganan Error Terstruktur**: Kesalahan input pada formulir menghasilkan kode status HTTP 422 Unprocessable Entity dengan daftar rincian pesan kesalahan yang jelas bagi pengguna.
