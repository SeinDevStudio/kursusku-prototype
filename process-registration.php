<?php

$method = $_SERVER['REQUEST_METHOD'];
$dataSource = $method === 'GET' ? $_GET : $_POST;
$registrationCourses = require __DIR__ . '/course-data.php';

$name = trim($dataSource['name'] ?? '');
$email = trim($dataSource['email'] ?? '');
$courseKey = $dataSource['course'] ?? '';
$courseData = $registrationCourses[$courseKey] ?? null;
$course = $courseData['name'] ?? $courseKey;
$learningMethod = $dataSource['learning_method'] ?? '';
$participantType = $dataSource['participant_type'] ?? '';
$interests = is_array($dataSource['interests'] ?? null) ? $dataSource['interests'] : [];
$note = trim($dataSource['note'] ?? '');

$requestedPackageCount = filter_var(
    $dataSource['package_count'] ?? null,
    FILTER_VALIDATE_INT,
    ['options' => ['min_range' => 1]]
);
$maximumPackages = $courseData['package_total'] ?? 0;
$packageCount = $requestedPackageCount !== false && $requestedPackageCount <= $maximumPackages
    ? $requestedPackageCount
    : 0;

$learningMethodLabels = [
    'online' => 'Online',
    'offline' => 'Tatap Muka',
    'hybrid' => 'Hybrid',
];
$participantTypeLabels = [
    'mahasiswa' => 'Mahasiswa',
    'umum' => 'Umum',
    'guru' => 'Guru',
];
$interestLabels = [
    'ui-ux' => 'Frontend',
    'database' => 'Database',
    'backend' => 'Backend',
];
$pricingByParticipant = [
    'mahasiswa' => ['unit_fee' => 300000, 'discount_percent' => 20],
    'guru' => ['unit_fee' => 400000, 'discount_percent' => 15],
    'umum' => ['unit_fee' => 350000, 'discount_percent' => 10],
];

$learningMethodText = $learningMethodLabels[$learningMethod] ?? $learningMethod;
$participantTypeText = $participantTypeLabels[$participantType] ?? $participantType;
$interestText = array_values(array_filter(
    array_map(static fn (string $interest): string => $interestLabels[$interest] ?? $interest, $interests)
));
$facilities = $courseData['facilities'] ?? [];
$pricing = $pricingByParticipant[$participantType] ?? ['unit_fee' => 0, 'discount_percent' => 0];
$unitFee = $pricing['unit_fee'];
$discountPercent = $pricing['discount_percent'];
$subtotal = $unitFee * $packageCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total = $subtotal - $discount;

function e(string|int $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function rupiah(int $value): string
{
    return 'Rp ' . number_format($value, 0, ',', '.');
}

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ringkasan Pendaftaran - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/summary.css">
  <link rel="stylesheet" href="assets/css/polish.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="index.php#katalog">Katalog</a>
    <a class="is-active" href="registration.php">Daftar</a>
    <a href="test-matrix.php">Test Matrix</a>
  </nav>
</header>
<main class="container result-page">
  <section class="page-intro result-intro">
    <p class="eyebrow">Ringkasan Pendaftaran</p>
    <h1>Pendaftaran Berhasil Diproses</h1>
    <p>Periksa kembali pilihan kursus dan rincian biaya Anda.</p>
  </section>

  <section class="summary-card registration-summary-card">
    <p class="summary-overline">Data Pendaftaran</p>

    <dl class="summary-details">
      <div class="summary-detail">
        <dt>Nama:</dt>
        <dd><?= e($name) ?></dd>
      </div>
      <div class="summary-detail">
        <dt>Email:</dt>
        <dd><?= e($email) ?></dd>
      </div>
      <div class="summary-detail">
        <dt>Kursus:</dt>
        <dd><?= e($course) ?></dd>
      </div>
      <div class="summary-detail">
        <dt>Tipe peserta:</dt>
        <dd><?= e($participantTypeText) ?></dd>
      </div>
      <div class="summary-detail">
        <dt>Metode:</dt>
        <dd><?= e($learningMethodText) ?></dd>
      </div>
      <div class="summary-detail">
        <dt>Jumlah paket:</dt>
        <dd><?= $packageCount > 0 ? e($packageCount) : '-' ?></dd>
      </div>
    </dl>

    <div class="summary-section">
      <h2>Rincian Biaya</h2>
      <dl class="cost-breakdown">
        <div><dt>Biaya satuan</dt><dd><?= e(rupiah($unitFee)) ?></dd></div>
        <div><dt>Subtotal</dt><dd><?= e(rupiah($subtotal)) ?></dd></div>
        <div><dt>Diskon <?= e($discountPercent) ?>%</dt><dd>-<?= e(rupiah($discount)) ?></dd></div>
        <div class="cost-total"><dt>Total akhir</dt><dd><?= e(rupiah($total)) ?></dd></div>
      </dl>
    </div>

    <div class="summary-section">
      <h2>Minat</h2>
      <?php if ($interestText !== []): ?>
        <ul class="interest-tags">
          <?php foreach ($interestText as $interest): ?>
            <li><?= e($interest) ?></li>
          <?php endforeach; ?>
        </ul>
      <?php else: ?>
        <p class="summary-empty">Belum ada minat tambahan.</p>
      <?php endif; ?>
    </div>

    <div class="summary-section">
      <h2>Fasilitas</h2>
      <ul class="summary-facilities">
        <?php foreach ($facilities as $facility): ?>
          <li><?= e($facility) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="summary-section summary-note">
      <h2>Catatan</h2>
      <p><?= $note !== '' ? e($note) : 'Tidak ada catatan.' ?></p>
    </div>

    <div class="summary-actions">
      <a class="summary-button summary-button-primary" href="registration.php">Daftar Lagi</a>
      <a class="summary-button" href="history-dummy.php">Lihat History Dummy</a>
      <a class="summary-button" href="index.php">Beranda</a>
    </div>
  </section>
</main>
</body>
</html>
