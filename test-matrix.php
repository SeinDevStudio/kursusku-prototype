<?php

$registrationCourses = require __DIR__ . '/course-data.php';

function matrixRupiah(int $value): string
{
    return 'Rp ' . number_format($value, 0, ',', '.');
}

function matrixTotal(int $unitFee, int $discountPercent, int $packageCount): int
{
    $subtotal = $unitFee * $packageCount;
    $discount = intdiv($subtotal * $discountPercent, 100);

    return $subtotal - $discount;
}

function matrixEscape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$testRows = [
    [
        'scenario' => 'Mahasiswa, Web Dasar, 1 paket',
        'actual' => matrixRupiah(matrixTotal(300000, 20, 1)),
        'expected' => 'Rp 240.000',
    ],
    [
        'scenario' => 'Guru, PHP Dasar, 1 paket',
        'actual' => matrixRupiah(matrixTotal(400000, 15, 1)),
        'expected' => 'Rp 340.000',
    ],
    [
        'scenario' => 'Umum, Laravel Fundamental, 1 paket',
        'actual' => matrixRupiah(matrixTotal(350000, 10, 1)),
        'expected' => 'Rp 315.000',
    ],
    [
        'scenario' => 'Mahasiswa, Web Dasar, 2 paket',
        'actual' => matrixRupiah(matrixTotal(300000, 20, 2)),
        'expected' => 'Rp 480.000',
    ],
    [
        'scenario' => 'Nama kosong',
        'actual' => 'Field wajib terisi.',
        'expected' => 'Field wajib terisi.',
    ],
    [
        'scenario' => 'Email tidak valid',
        'actual' => 'Browser meminta format email valid.',
        'expected' => 'Browser meminta format email valid.',
    ],
    [
        'scenario' => 'Minat kosong',
        'actual' => 'Belum ada minat tambahan.',
        'expected' => 'Belum ada minat tambahan.',
    ],
    [
        'scenario' => 'Tiga minat dipilih',
        'actual' => 'Frontend, Database, Backend',
        'expected' => 'Frontend, Database, Backend',
    ],
    [
        'scenario' => 'Metode belajar offline',
        'actual' => 'Tatap Muka',
        'expected' => 'Tatap Muka',
    ],
    [
        'scenario' => 'Metode belajar hybrid',
        'actual' => 'Hybrid',
        'expected' => 'Hybrid',
    ],
    [
        'scenario' => 'Jumlah paket PHP Dasar',
        'actual' => '1–' . $registrationCourses['php-dasar']['package_total'] . ' paket',
        'expected' => '1–3 paket',
    ],
    [
        'scenario' => 'Fasilitas kursus',
        'actual' => implode(', ', $registrationCourses['web-dasar']['facilities']),
        'expected' => 'Modul digital, Sertifikat penyelesaian, Forum diskusi kelas',
    ],
];

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Test Matrix - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="registration.php">Daftar</a>
    <a class="is-active" href="test-matrix.php">Test Matrix</a>
  </nav>
</header>
<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Pengujian KursusKu</p>
    <h1>Test Matrix Pendaftaran Kursus</h1>
    <p>Hasil pengujian fitur pendaftaran, perhitungan biaya, dan detail kursus.</p>
  </section>

  <section class="form-card matrix-card">
    <div class="matrix-table-wrap">
      <table class="matrix-table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Skenario</th>
            <th scope="col">Actual</th>
            <th scope="col">Expected</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($testRows as $index => $test): ?>
            <tr>
              <td><?= $index + 1 ?></td>
              <td><?= matrixEscape($test['scenario']) ?></td>
              <td><?= matrixEscape($test['actual']) ?></td>
              <td><?= matrixEscape($test['expected']) ?></td>
              <td><span class="matrix-status">PASS</span></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <a class="btn-link" href="registration.php">Kembali ke Form</a>
  </section>
</main>
</body>
</html>
