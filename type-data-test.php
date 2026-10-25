<?php

$sampleString = 'Kursus Pemrograman Web Modern';
$sampleInteger = 350000;
$sampleBooleanTrue = true;
$sampleBooleanFalse = false;

$sampleIndexedArray = [
    'Sertifikat Digital',
    'Akses Video Selamanya',
    'Konsultasi Mentor',
    'Source Code Proyek',
];

$sampleAssociativeArray = [
    'kode' => 'KRS-WEB-2026',
    'judul' => 'Fullstack Web Development',
    'durasi_minggu' => 8,
    'tingkat' => 'Menengah',
    'biaya' => 450000,
    'status_buka' => true,
];

$sampleMultiArray = [
    [
        'sesi' => 1,
        'topik' => 'Pengenalan PHP & Konfigurasi Laragon',
        'jam' => 3,
    ],
    [
        'sesi' => 2,
        'topik' => 'Tipe Data, Variabel & Operator',
        'jam' => 3,
    ],
    [
        'sesi' => 3,
        'topik' => 'Percabangan & Struktur Kontrol',
        'jam' => 4,
    ],
];

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Eksplorasi Tipe Data PHP - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="register.php">Registrasi Baru</a>
    <a class="is-active" href="type-data-test.php">Tipe Data</a>
    <a href="string-test.php">Fungsi String</a>
    <a href="date-test.php">Waktu & Tanggal</a>
    <a href="procedure-test.php">Prosedur</a>
  </nav>
</header>

<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Laboratorium Bahasa PHP</p>
    <h1>Demonstrasi Tipe Data Primitif & Majemuk</h1>
    <p>Pengujian representasi memori, struktur, dan karakteristik tipe data fundamental dalam PHP.</p>
  </section>

  <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
    <section class="form-card">
      <h2 style="color: #0284c7; margin-top: 0;">1. Tipe Data String</h2>
      <p>Digunakan untuk menyimpan teks dan karakter alfanumerik.</p>
      <table class="data-table">
        <tr>
          <th>Nilai Variabel</th>
          <td><code>"<?= htmlspecialchars($sampleString, ENT_QUOTES, 'UTF-8') ?>"</code></td>
        </tr>
        <tr>
          <th>gettype()</th>
          <td><span class="badge" style="background: #e0f2fe; color: #0369a1;"><?= gettype($sampleString) ?></span></td>
        </tr>
        <tr>
          <th>is_string()</th>
          <td><strong><?= is_string($sampleString) ? 'true (Ya)' : 'false' ?></strong></td>
        </tr>
        <tr>
          <th>Panjang Karakter</th>
          <td><?= strlen($sampleString) ?> karakter</td>
        </tr>
      </table>
    </section>

    <section class="form-card">
      <h2 style="color: #0284c7; margin-top: 0;">2. Tipe Data Integer</h2>
      <p>Digunakan untuk bilangan bulat tanpa komponen desimal.</p>
      <table class="data-table">
        <tr>
          <th>Nilai Variabel</th>
          <td><code><?= $sampleInteger ?></code></td>
        </tr>
        <tr>
          <th>gettype()</th>
          <td><span class="badge" style="background: #fef3c7; color: #b45309;"><?= gettype($sampleInteger) ?></span></td>
        </tr>
        <tr>
          <th>is_int()</th>
          <td><strong><?= is_int($sampleInteger) ? 'true (Ya)' : 'false' ?></strong></td>
        </tr>
        <tr>
          <th>Operasi Aritmatika</th>
          <td>Rp <?= number_format($sampleInteger, 0, ',', '.') ?> x 2 = Rp <?= number_format($sampleInteger * 2, 0, ',', '.') ?></td>
        </tr>
      </table>
    </section>

    <section class="form-card">
      <h2 style="color: #0284c7; margin-top: 0;">3. Tipe Data Boolean</h2>
      <p>Menyimpan nilai kebenaran biner: true atau false.</p>
      <table class="data-table">
        <tr>
          <th>Nilai True</th>
          <td>
            <code><?= var_export($sampleBooleanTrue, true) ?></code>
            <span class="badge" style="background: #dcfce7; color: #15803d; margin-left: 8px;">Aktif</span>
          </td>
        </tr>
        <tr>
          <th>Nilai False</th>
          <td>
            <code><?= var_export($sampleBooleanFalse, true) ?></code>
            <span class="badge" style="background: #fee2e2; color: #b91c1c; margin-left: 8px;">Non-Aktif</span>
          </td>
        </tr>
        <tr>
          <th>gettype()</th>
          <td><span class="badge" style="background: #f3e8ff; color: #7e22ce;"><?= gettype($sampleBooleanTrue) ?></span></td>
        </tr>
        <tr>
          <th>Logika Negasi (!)</th>
          <td>!true bernilai <code><?= var_export(!$sampleBooleanTrue, true) ?></code></td>
        </tr>
      </table>
    </section>

    <section class="form-card">
      <h2 style="color: #0284c7; margin-top: 0;">4. Tipe Data Array</h2>
      <p>Menghimpun sekumpulan elemen dalam satu variabel majemuk.</p>
      <table class="data-table">
        <tr>
          <th>gettype()</th>
          <td><span class="badge" style="background: #fce7f3; color: #be185d;"><?= gettype($sampleIndexedArray) ?></span></td>
        </tr>
        <tr>
          <th>Elemen Terindeks</th>
          <td><?= count($sampleIndexedArray) ?> item fasilitas</td>
        </tr>
        <tr>
          <th>Kunci Asosiatif</th>
          <td><?= count($sampleAssociativeArray) ?> pasang key-value</td>
        </tr>
        <tr>
          <th>Array Multidimensi</th>
          <td><?= count($sampleMultiArray) ?> baris silabus</td>
        </tr>
      </table>
    </section>
  </div>

  <section class="form-card" style="margin-bottom: 2rem;">
    <h2>Inspeksi Struktur Array Asosiatif</h2>
    <div style="background: #0f172a; color: #38bdf8; padding: 1.25rem; border-radius: 8px; font-family: monospace; overflow-x: auto;">
      <pre style="margin: 0;"><?php print_r($sampleAssociativeArray); ?></pre>
    </div>
  </section>

  <section class="form-card">
    <h2>Rendering Tabel Array Multidimensi</h2>
    <table class="data-table">
      <thead>
        <tr>
          <th>Sesi</th>
          <th>Topik Pembahasan</th>
          <th style="text-align: center;">Estimasi Durasi</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($sampleMultiArray as $row): ?>
          <tr>
            <td><strong>Sesi Ke-<?= (int)$row['sesi'] ?></strong></td>
            <td><?= htmlspecialchars($row['topik'], ENT_QUOTES, 'UTF-8') ?></td>
            <td style="text-align: center;"><?= (int)$row['jam'] ?> Jam Belajar</td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div style="margin-top: 1.5rem;">
      <a href="string-test.php" class="btn btn-primary">Lanjut ke Pengujian String</a>
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
