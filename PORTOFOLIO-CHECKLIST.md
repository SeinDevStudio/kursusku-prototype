# Checklist Kelengkapan Portofolio Praktikum Pemrograman Web

Dokumen ini memuat daftar periksa pemenuhan capaian praktikum mandiri dan fitur proyek KursusKu dari Pertemuan 1 hingga Pertemuan 6 berdasarkan berkas nyata yang tersedia di dalam repositori proyek.

---

## Tabel Ringkasan Pemenuhan Capaian Pertemuan 1–6

| Pertemuan | Topik Utama | Berkas Implementasi | Status |
| :--- | :--- | :--- | :---: |
| **Pertemuan 1** | Konfigurasi Web Server Laragon & Dokumen HTML Dasar | `hello.html` | Lengkap |
| **Pertemuan 2** | Antarmuka Responsif, Media Query, & Tata Letak CSS | `index.php`, `assets/css/style.css`, `assets/css/polish.css` | Lengkap |
| **Pertemuan 3** | Operator Aritmatika, Logika, Bitwise & Rumus Biaya | `fee-calculator.php`, `operator-test.php`, `bitwise-test.php`, `logic-test.php` | Lengkap |
| **Pertemuan 4** | Modularisasi Helper, Data Katalog, & Uji Fungsi | `helpers.php`, `course-data.php`, `test-functions.php`, `find-course-test.php` | Lengkap |
| **Pertemuan 5** | Form GET & POST, Sanitasi XSS, Penanganan Parameter | `registration.php`, `process-registration.php`, `get-demo.php` | Lengkap |
| **Pertemuan 6** | Validasi Server HTTP 422, Diskon Kategori, Loop & Riwayat | `data.php`, `register.php`, `process.php`, `history.php`, `fee-tests.php` | Lengkap |

---

## Rincian Checklist Kelengkapan Tiap Pertemuan

### 1. Pertemuan 1 - Lingkungan Kerja & Dasar Web
- [x] Instalasi dan konfigurasi Laragon Web Server (Apache + PHP).
- [x] Struktur folder web root terorganisasi dengan baik di `D:\laragon\www\kursusku-prototype`.
- [x] Berkas HTML semantik awal (`hello.html`) dapat dirender pada browser lokal.
- [x] Dokumentasi bukti instalasi tersimpan pada folder `evidance/week-01/`.

### 2. Pertemuan 2 - Layout Responsif & Desain Visual
- [x] Halaman utama dinamis PHP (`index.php`) dengan layout terstruktur (Header, Navigasi, Hero, Keunggulan, Katalog, Alur, Kontak, Footer).
- [x] Desain responsif untuk tampilan layar komputer (desktop) maupun perangkat seluler (mobile).
- [x] Penataan lembar gaya CSS modular (`assets/css/style.css` dan `assets/css/polish.css`).
- [x] Dokumentasi bukti tangkapan layar antarmuka tersimpan pada folder `evidance/week-02/`.

### 3. Pertemuan 3 - Perhitungan Biaya & Logika Operator
- [x] Perhitungan estimasi biaya kursus (`fee-calculator.php`):
  - Subtotal = biaya satuan x jumlah peserta
  - Diskon = subtotal x persentase / 100
  - Total = subtotal - diskon + biaya administrasi
- [x] Lembar gaya khusus untuk kartu kalkulator (`assets/css/fee-calculator.css`).
- [x] Pengujian operator aritmatika dan penugasan (`operator-test.php`).
- [x] Pengujian operasi bitwise permission flag (`bitwise-test.php`).
- [x] Pengujian ekspresi logika kondisional (`logic-test.php`).
- [x] Dokumentasi pembuktian perhitungan tersimpan pada folder `evidance/week-03/`.

### 4. Pertemuan 4 - Fungsi Modular & Pengelolaan Array
- [x] Pembuatan fungsi bantuan terpusat pada `helpers.php`:
  - `rupiah()`: format mata uang Indonesia.
  - `statusKursus()`: penentuan ketersediaan kuota.
  - `sisaKursi()`: kalkulasi sisa kapasitas kelas.
  - `formatTanggal()`: konversi penanggalan.
- [x] Penyimpanan data katalog kursus terpisah dalam array PHP (`course-data.php`).
- [x] Pengujian mandiri fungsi bantuan helper (`test-functions.php`).
- [x] Pengujian pencarian data kursus spesifik (`find-course-test.php`).
- [x] Dokumentasi bukti fungsi helper tersimpan pada folder `evidance/week-04/`.

### 5. Pertemuan 5 - Pengelolaan Formulir Web (GET & POST)
- [x] Formulir pendaftaran kursus interaktif (`registration.php`) dengan validasi input client-side (`required`, `minlength`, `type`).
- [x] Pemrosesan data menggunakan metode POST (`process-registration.php`).
- [x] Demonstrasi formulir pencarian dan pembacaan parameter query string melalui metode GET (`get-demo.php`).
- [x] Penerapan sanitasi data keluaran `htmlspecialchars(..., ENT_QUOTES, 'UTF-8')` pada seluruh data input.
- [x] Tampilan kartu ringkasan transaksi pendaftaran (`assets/css/summary.css`).
- [x] Dokumentasi bukti tangkapan layar form dan respons GET/POST pada folder `evidance/week-05/`.

### 6. Pertemuan 6 - Validasi Lanjutan, Diskon, Perulangan & Simulasi Data
- [x] Data master terstruktur dalam array PHP terpisah (`data.php`) memuat program kursus, tingkat diskon, opsi minat, metode belajar, dan fasilitas.
- [x] Formulir pendaftaran tingkat lanjut (`register.php`) merender seluruh elemen pilihan dinamis menggunakan perulangan (`foreach`).
- [x] Pemrosesan server-side tangguh (`process.php`) dengan:
  - Validasi panjang teks, format email, pola nomor telepon, dan rentang paket materi.
  - Pengembalian kode status `HTTP 422 Unprocessable Entity` jika data tidak lolos validasi.
  - Kalkulasi diskon bertingkat berdasarkan kategori peserta (Pelajar 25%, Pendidik 20%, Alumni 15%, Umum 5%).
  - Tampilan ringkasan registrasi terperinci dengan kode registrasi unik.
- [x] Simulasi halaman riwayat pendaftaran tanpa ketergantungan database (`history.php`) disertai pemberitahuan status data dummy in-memory.
- [x] Unit testing kalkulator pembiayaan (`fee-tests.php`) mencakup lebih dari lima skenario uji dengan perbandingan hasil Actual vs Expected dan indikator PASS/FAIL.
- [x] Eksplorasi perulangan struktur data majemuk (`loop-lab.php`).
- [x] Matriks pengujian menyeluruh skenario bisnis (`test-matrix.php`).
- [x] Pengujian validasi server (`validation-test.php`).
- [x] Dokumentasi bukti praktikum lengkap tersimpan pada folder `evidance/week-06/`.

---

## Modul Laboratorium Pengujian PHP Bawaan

| Berkas Pengujian | Materi yang Diuji | Status Eksekusi |
| :--- | :--- | :---: |
| `type-data-test.php` | Pengujian tipe data primitif string, integer, boolean, dan array | Berhasil |
| `string-test.php` | Pengujian fungsi string: `trim()`, `strtoupper()`, `strtolower()`, `strlen()`, `substr()` | Berhasil |
| `date-test.php` | Pengujian fungsi penanggalan dan manipulasi waktu zona `Asia/Jakarta` | Berhasil |
| `procedure-test.php` | Pengujian fungsi bertipe `void` untuk mencetak notifikasi dan status | Berhasil |
| `server-time.php` | Pengujian pembacaan waktu server sederhana | Berhasil |

---

## Kesimpulan Kelayakan

Seluruh berkas yang disyaratkan untuk melengkapi kurikulum praktikum Pertemuan 1 hingga Pertemuan 6 telah tersedia lengkap, tersusun rapi, dan dapat diakses dengan lancar melalui lingkungan server lokal Laragon tanpa galat.
