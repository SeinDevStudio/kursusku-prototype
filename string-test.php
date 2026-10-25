<?php

$inputNamaKotor = '   Ahmad Fauzi Rahman   ';
$namaBersih = trim($inputNamaKotor);

$kodeProgram = 'kursus-php-lanjutan-2026';
$kodeKapital = strtoupper($kodeProgram);

$inputEmailCampur = 'FAUZI.RAHMAN@STUDENT.UIN.AC.ID';
$emailKecil = strtolower($inputEmailCampur);

$nomorTelepon = '081234567890';
$panjangTelepon = strlen($nomorTelepon);
$panjangNama = strlen($namaBersih);

$kodeTransaksi = 'INV-20261025-ABCD9988';
$potonganTanggal = substr($kodeTransaksi, 4, 8);
$potonganAcak = substr($kodeTransaksi, -8);

$deskripsiMentah = 'kursus pemrograman web dan backend';
$judulBuku = ucwords($deskripsiMentah);
$kodeTukar = str_replace('-', ' ', $kodeProgram);

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengujian Fungsi String PHP - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="type-data-test.php">Tipe Data</a>
    <a class="is-active" href="string-test.php">Fungsi String</a>
    <a href="date-test.php">Waktu & Tanggal</a>
    <a href="procedure-test.php">Prosedur</a>
    <a href="register.php">Registrasi Baru</a>
  </nav>
</header>

<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Manipulasi Teks</p>
    <h1>Pengujian Fungsi Manipulasi String</h1>
    <p>Demonstrasi fungsi-fungsi bawaan PHP untuk pembersihan data, normalisasi teks, dan ekstraksi substring.</p>
  </section>

  <section class="form-card" style="margin-bottom: 2rem;">
    <h2>Tabel Hasil Uji Fungsi String</h2>
    <div class="table-scroll" style="overflow-x: auto;">
      <table class="data-table" style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr style="border-bottom: 2px solid #e2e8f0; text-align: left;">
            <th style="padding: 10px;">Fungsi</th>
            <th style="padding: 10px;">Nilai Awal (Input)</th>
            <th style="padding: 10px;">Sintaks Pemanggilan</th>
            <th style="padding: 10px;">Hasil (Output)</th>
            <th style="padding: 10px;">Kegunaan Nyata</th>
          </tr>
        </thead>
        <tbody>
          <tr style="border-bottom: 1px solid #f1f5f9;">
            <td style="padding: 12px 10px; font-weight: bold; color: #0284c7;">trim()</td>
            <td style="padding: 12px 10px; font-family: monospace; background: #f8fafc;">"<?= htmlspecialchars($inputNamaKotor, ENT_QUOTES, 'UTF-8') ?>"</td>
            <td style="padding: 12px 10px; font-family: monospace;">trim($inputNamaKotor)</td>
            <td style="padding: 12px 10px; font-family: monospace; font-weight: bold; color: #10b981;">"<?= htmlspecialchars($namaBersih, ENT_QUOTES, 'UTF-8') ?>"</td>
            <td style="padding: 12px 10px; font-size: 0.9rem;">Menghilangkan spasi liar pada awal dan akhir form nama</td>
          </tr>

          <tr style="border-bottom: 1px solid #f1f5f9;">
            <td style="padding: 12px 10px; font-weight: bold; color: #0284c7;">strtoupper()</td>
            <td style="padding: 12px 10px; font-family: monospace; background: #f8fafc;"><?= htmlspecialchars($kodeProgram, ENT_QUOTES, 'UTF-8') ?></td>
            <td style="padding: 12px 10px; font-family: monospace;">strtoupper($kodeProgram)</td>
            <td style="padding: 12px 10px; font-family: monospace; font-weight: bold; color: #10b981;"><?= htmlspecialchars($kodeKapital, ENT_QUOTES, 'UTF-8') ?></td>
            <td style="padding: 12px 10px; font-size: 0.9rem;">Membuat kode tiket kursus menjadi huruf kapital resmi</td>
          </tr>

          <tr style="border-bottom: 1px solid #f1f5f9;">
            <td style="padding: 12px 10px; font-weight: bold; color: #0284c7;">strtolower()</td>
            <td style="padding: 12px 10px; font-family: monospace; background: #f8fafc;"><?= htmlspecialchars($inputEmailCampur, ENT_QUOTES, 'UTF-8') ?></td>
            <td style="padding: 12px 10px; font-family: monospace;">strtolower($inputEmailCampur)</td>
            <td style="padding: 12px 10px; font-family: monospace; font-weight: bold; color: #10b981;"><?= htmlspecialchars($emailKecil, ENT_QUOTES, 'UTF-8') ?></td>
            <td style="padding: 12px 10px; font-size: 0.9rem;">Normalisasi alamat email pengguna agar konsisten dan unik</td>
          </tr>

          <tr style="border-bottom: 1px solid #f1f5f9;">
            <td style="padding: 12px 10px; font-weight: bold; color: #0284c7;">strlen()</td>
            <td style="padding: 12px 10px; font-family: monospace; background: #f8fafc;"><?= htmlspecialchars($nomorTelepon, ENT_QUOTES, 'UTF-8') ?></td>
            <td style="padding: 12px 10px; font-family: monospace;">strlen($nomorTelepon)</td>
            <td style="padding: 12px 10px; font-family: monospace; font-weight: bold; color: #10b981;"><?= $panjangTelepon ?> karakter</td>
            <td style="padding: 12px 10px; font-size: 0.9rem;">Validasi batas panjang digit nomor telepon atau password</td>
          </tr>

          <tr style="border-bottom: 1px solid #f1f5f9;">
            <td style="padding: 12px 10px; font-weight: bold; color: #0284c7;">substr() (Offset)</td>
            <td style="padding: 12px 10px; font-family: monospace; background: #f8fafc;"><?= htmlspecialchars($kodeTransaksi, ENT_QUOTES, 'UTF-8') ?></td>
            <td style="padding: 12px 10px; font-family: monospace;">substr($kodeTransaksi, 4, 8)</td>
            <td style="padding: 12px 10px; font-family: monospace; font-weight: bold; color: #10b981;"><?= htmlspecialchars($potonganTanggal, ENT_QUOTES, 'UTF-8') ?></td>
            <td style="padding: 12px 10px; font-size: 0.9rem;">Mengekstrak segmen tanggal transaksi (YYYYMMDD)</td>
          </tr>

          <tr style="border-bottom: 1px solid #f1f5f9;">
            <td style="padding: 12px 10px; font-weight: bold; color: #0284c7;">substr() (Negatif)</td>
            <td style="padding: 12px 10px; font-family: monospace; background: #f8fafc;"><?= htmlspecialchars($kodeTransaksi, ENT_QUOTES, 'UTF-8') ?></td>
            <td style="padding: 12px 10px; font-family: monospace;">substr($kodeTransaksi, -8)</td>
            <td style="padding: 12px 10px; font-family: monospace; font-weight: bold; color: #10b981;"><?= htmlspecialchars($potonganAcak, ENT_QUOTES, 'UTF-8') ?></td>
            <td style="padding: 12px 10px; font-size: 0.9rem;">Mengambil 8 karakter token keamanan di akhir kode</td>
          </tr>

          <tr style="border-bottom: 1px solid #f1f5f9;">
            <td style="padding: 12px 10px; font-weight: bold; color: #0284c7;">ucwords()</td>
            <td style="padding: 12px 10px; font-family: monospace; background: #f8fafc;"><?= htmlspecialchars($deskripsiMentah, ENT_QUOTES, 'UTF-8') ?></td>
            <td style="padding: 12px 10px; font-family: monospace;">ucwords($deskripsiMentah)</td>
            <td style="padding: 12px 10px; font-family: monospace; font-weight: bold; color: #10b981;"><?= htmlspecialchars($judulBuku, ENT_QUOTES, 'UTF-8') ?></td>
            <td style="padding: 12px 10px; font-size: 0.9rem;">Membuat judul kursus berkapitalisasi rapi (Title Case)</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div style="margin-top: 1.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
      <a href="date-test.php" class="btn btn-primary">Lanjut ke Pengujian Tanggal & Waktu</a>
      <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
    </div>
  </section>
</main>

<footer class="site-footer">
  <div class="container footer-content">
    <p>&copy; <?= date('Y') ?> KursusKu. Hak Cipta Dilindungi.</p>
  </div>
</footer>
</body>
</html>
