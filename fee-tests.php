<?php

function hitungBiaya(int $unitPrice, int $packageCount, int $discountPercent, int $adminFee): int
{
    $subtotal = $unitPrice * $packageCount;
    $discountAmount = intdiv($subtotal * $discountPercent, 100);
    return $subtotal - $discountAmount + $adminFee;
}

function formatRupiah(int $number): string
{
    return 'Rp ' . number_format($number, 0, ',', '.');
}

$testCases = [
    [
        'name' => 'Kategori Pelajar - Fullstack JS (1 Paket, Diskon 25%)',
        'unit_price' => 380000,
        'package_count' => 1,
        'discount_percent' => 25,
        'admin_fee' => 20000,
        'expected' => 'Rp 305.000',
    ],
    [
        'name' => 'Kategori Pendidik - Python Sains Data (2 Paket, Diskon 20%)',
        'unit_price' => 420000,
        'package_count' => 2,
        'discount_percent' => 20,
        'admin_fee' => 20000,
        'expected' => 'Rp 692.000',
    ],
    [
        'name' => 'Kategori Alumni - Flutter Mobile (1 Paket, Diskon 15%)',
        'unit_price' => 450000,
        'package_count' => 1,
        'discount_percent' => 15,
        'admin_fee' => 20000,
        'expected' => 'Rp 402.500',
    ],
    [
        'name' => 'Kategori Umum - Keamanan Jaringan (2 Paket, Diskon 5%)',
        'unit_price' => 500000,
        'package_count' => 2,
        'discount_percent' => 5,
        'admin_fee' => 20000,
        'expected' => 'Rp 970.000',
    ],
    [
        'name' => 'Kategori Pelajar - Desain UI/UX Figma (3 Paket, Diskon 25%)',
        'unit_price' => 320000,
        'package_count' => 3,
        'discount_percent' => 25,
        'admin_fee' => 20000,
        'expected' => 'Rp 740.000',
    ],
    [
        'name' => 'Kategori Umum - Web Dasar Tanpa Diskon (1 Paket, Diskon 0%)',
        'unit_price' => 250000,
        'package_count' => 1,
        'discount_percent' => 0,
        'admin_fee' => 20000,
        'expected' => 'Rp 270.000',
    ],
];

$passCount = 0;
$failCount = 0;

$results = [];

foreach ($testCases as $case) {
    $calculated = hitungBiaya(
        $case['unit_price'],
        $case['package_count'],
        $case['discount_percent'],
        $case['admin_fee']
    );

    $actual = formatRupiah($calculated);
    $isPassed = ($actual === $case['expected']);

    if ($isPassed) {
        $passCount++;
    } else {
        $failCount++;
    }

    $results[] = [
        'name' => $case['name'],
        'input' => 'Unit: ' . formatRupiah($case['unit_price']) . ' | Paket: ' . $case['package_count'] . ' | Diskon: ' . $case['discount_percent'] . '% | Admin: ' . formatRupiah($case['admin_fee']),
        'expected' => $case['expected'],
        'actual' => $actual,
        'status' => $isPassed ? 'PASS' : 'FAIL',
    ];
}

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengujian Kalkulator Biaya - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="register.php">Registrasi Baru</a>
    <a href="history.php">Riwayat</a>
    <a class="is-active" href="fee-tests.php">Uji Biaya</a>
    <a href="test-matrix.php">Test Matrix Lama</a>
  </nav>
</header>

<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Unit Testing Biaya</p>
    <h1>Pengujian Kalkulator Biaya Kursus</h1>
    <p>Verifikasi otomatis logika rumus pembiayaan dengan perbandingan hasil kalkulasi (Actual) dan target (Expected).</p>
  </section>

  <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
    <div class="form-card" style="padding: 1.25rem; text-align: center;">
      <span style="font-size: 0.85rem; color: #64748b; text-transform: uppercase;">Total Kasus Uji</span>
      <h3 style="font-size: 2rem; margin: 0.5rem 0 0 0; color: #0284c7;"><?= count($testCases) ?></h3>
    </div>
    <div class="form-card" style="padding: 1.25rem; text-align: center;">
      <span style="font-size: 0.85rem; color: #64748b; text-transform: uppercase;">Status Lulus (PASS)</span>
      <h3 style="font-size: 2rem; margin: 0.5rem 0 0 0; color: #10b981;"><?= $passCount ?></h3>
    </div>
    <div class="form-card" style="padding: 1.25rem; text-align: center;">
      <span style="font-size: 0.85rem; color: #64748b; text-transform: uppercase;">Status Gagal (FAIL)</span>
      <h3 style="font-size: 2rem; margin: 0.5rem 0 0 0; color: #ef4444;"><?= $failCount ?></h3>
    </div>
  </div>

  <section class="form-card">
    <div class="table-scroll" style="overflow-x: auto;">
      <table class="data-table" style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr style="border-bottom: 2px solid #e2e8f0; text-align: left;">
            <th style="padding: 10px;">No</th>
            <th style="padding: 10px;">Skenario Pengujian</th>
            <th style="padding: 10px;">Parameter Masukan</th>
            <th style="padding: 10px;">Expected</th>
            <th style="padding: 10px;">Actual</th>
            <th style="padding: 10px; text-align: center;">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($results as $index => $res): ?>
            <tr style="border-bottom: 1px solid #f1f5f9;">
              <td style="padding: 12px 10px; font-weight: bold;"><?= $index + 1 ?></td>
              <td style="padding: 12px 10px; font-weight: 500;"><?= htmlspecialchars($res['name'], ENT_QUOTES, 'UTF-8') ?></td>
              <td style="padding: 12px 10px; font-size: 0.9rem; color: #64748b;"><?= htmlspecialchars($res['input'], ENT_QUOTES, 'UTF-8') ?></td>
              <td style="padding: 12px 10px; font-family: monospace;"><?= htmlspecialchars($res['expected'], ENT_QUOTES, 'UTF-8') ?></td>
              <td style="padding: 12px 10px; font-family: monospace; font-weight: bold;"><?= htmlspecialchars($res['actual'], ENT_QUOTES, 'UTF-8') ?></td>
              <td style="padding: 12px 10px; text-align: center;">
                <?php if ($res['status'] === 'PASS'): ?>
                  <span style="display: inline-block; padding: 4px 12px; border-radius: 999px; background: #d1fae5; color: #065f46; font-size: 0.85rem; font-weight: bold;">PASS</span>
                <?php else: ?>
                  <span style="display: inline-block; padding: 4px 12px; border-radius: 999px; background: #fee2e2; color: #991b1b; font-size: 0.85rem; font-weight: bold;">FAIL</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div style="margin-top: 1.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
      <a href="register.php" class="btn btn-primary">Buka Form Registrasi</a>
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
