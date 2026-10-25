<?php

date_default_timezone_set('Asia/Jakarta');

$zonaWaktu = date_default_timezone_get();
$sekarangTimestamp = time();
$formatStandar = date('Y-m-d H:i:s', $sekarangTimestamp);
$formatLengkap = date('l, d F Y - H:i:s', $sekarangTimestamp);

$hariInggris = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
$hariIndo = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

$bulanInggris = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
$bulanIndo = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

$hariNama = str_replace($hariInggris, $hariIndo, date('l', $sekarangTimestamp));
$bulanNama = str_replace($bulanInggris, $bulanIndo, date('F', $sekarangTimestamp));
$tanggalIndoLengkap = $hariNama . ', ' . date('d', $sekarangTimestamp) . ' ' . $bulanNama . ' ' . date('Y', $sekarangTimestamp);

$tglBatasDaftar = date('d-m-Y', strtotime('+7 days', $sekarangTimestamp));
$tglMulaiKelas = date('d-m-Y', strtotime('+14 days', $sekarangTimestamp));
$tglSelesaiKelas = date('d-m-Y', strtotime('+56 days', $sekarangTimestamp));

$objSekarang = new DateTime();
$objMulai = new DateTime('+14 days');
$selisih = $objSekarang->diff($objMulai);
$sisaHari = $selisih->days;

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengujian Tanggal & Waktu - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="type-data-test.php">Tipe Data</a>
    <a href="string-test.php">Fungsi String</a>
    <a class="is-active" href="date-test.php">Waktu & Tanggal</a>
    <a href="procedure-test.php">Prosedur</a>
    <a href="register.php">Registrasi Baru</a>
  </nav>
</header>

<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Manajemen Waktu Sistem</p>
    <h1>Pengujian Tanggal & Waktu (Asia/Jakarta)</h1>
    <p>Pengelolaan konfigurasi timezone server, penanggalan lokal Indonesia, dan perhitungan jadwal kursus.</p>
  </section>

  <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
    <section class="form-card">
      <h2 style="color: #0284c7; margin-top: 0;">Konfigurasi Zona Waktu</h2>
      <table class="data-table">
        <tr>
          <th>Zona Waktu Aktif</th>
          <td><span class="badge" style="background: #dbeafe; color: #1e40af; font-weight: bold;"><?= htmlspecialchars($zonaWaktu, ENT_QUOTES, 'UTF-8') ?></span></td>
        </tr>
        <tr>
          <th>Offset UTC</th>
          <td>+07:00 (Waktu Indonesia Barat)</td>
        </tr>
        <tr>
          <th>Timestamp Unix</th>
          <td><code><?= $sekarangTimestamp ?></code></td>
        </tr>
      </table>
    </section>

    <section class="form-card">
      <h2 style="color: #0284c7; margin-top: 0;">Waktu Server Terkini</h2>
      <table class="data-table">
        <tr>
          <th>Format Standar (ISO)</th>
          <td><code><?= htmlspecialchars($formatStandar, ENT_QUOTES, 'UTF-8') ?> WIB</code></td>
        </tr>
        <tr>
          <th>Format Internasional</th>
          <td><?= htmlspecialchars($formatLengkap, ENT_QUOTES, 'UTF-8') ?></td>
        </tr>
        <tr>
          <th>Format Indonesia</th>
          <td><strong><?= htmlspecialchars($tanggalIndoLengkap, ENT_QUOTES, 'UTF-8') ?></strong></td>
        </tr>
      </table>
    </section>
  </div>

  <section class="form-card" style="margin-bottom: 2rem;">
    <h2>Simulasi Perhitungan Linimasa Kursus</h2>
    <table class="data-table">
      <thead>
        <tr>
          <th>Tahapan Program</th>
          <th>Rumus Perhitungan</th>
          <th>Jadwal Terhitung</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><strong>Hari Ini (Pendaftaran Buka)</strong></td>
          <td><code>time()</code></td>
          <td><?= date('d-m-Y H:i', $sekarangTimestamp) ?> WIB</td>
          <td>Pendaftaran gelombang aktif dibuka secara daring</td>
        </tr>
        <tr>
          <td><strong>Batas Akhir Pembayaran</strong></td>
          <td><code>strtotime('+7 days')</code></td>
          <td><strong><?= $tglBatasDaftar ?></strong> 23:59 WIB</td>
          <td>Tenggat pelunasan biaya untuk reservasi kursi</td>
        </tr>
        <tr>
          <td><strong>Mulai Pertemuan Perdana</strong></td>
          <td><code>strtotime('+14 days')</code></td>
          <td><strong><?= $tglMulaiKelas ?></strong> 09:00 WIB</td>
          <td>Sesi orientasi dan kick-off kelas perdana (Sisa: <?= $sisaHari ?> hari)</td>
        </tr>
        <tr>
          <td><strong>Ujian Akhir & Kelulusan</strong></td>
          <td><code>strtotime('+56 days')</code></td>
          <td><strong><?= $tglSelesaiKelas ?></strong></td>
          <td>Pengumpulan capstone project dan penerbitan sertifikat</td>
        </tr>
      </tbody>
    </table>

    <div style="margin-top: 1.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
      <a href="procedure-test.php" class="btn btn-primary">Lanjut ke Pengujian Prosedur</a>
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
