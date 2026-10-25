<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

date_default_timezone_set('Asia/Jakarta');

$data = require __DIR__ . '/data.php';

$courses = $data['courses'];
$interestsList = $data['interests'];
$participantTypes = $data['participant_types'];
$facilities = $data['facilities'];
$learningMethods = $data['learning_methods'];
$adminFee = (int)($data['admin_fee'] ?? 20000);

$fullname = trim($_POST['fullname'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$institution = trim($_POST['institution'] ?? '');
$courseKey = trim($_POST['course'] ?? '');
$packageCount = filter_var($_POST['package_count'] ?? null, FILTER_VALIDATE_INT);
$learningMethodKey = trim($_POST['learning_method'] ?? '');
$participantTypeKey = trim($_POST['participant_type'] ?? '');
$rawInterests = is_array($_POST['interests'] ?? null) ? $_POST['interests'] : [];
$notes = trim($_POST['notes'] ?? '');

$errors = [];

if (mb_strlen($fullname) < 3) {
    $errors[] = 'Nama lengkap wajib diisi minimal 3 karakter.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format alamat email tidak valid.';
}

if (strlen($phone) < 8 || !preg_match('/^[0-9+\-\s]+$/', $phone)) {
    $errors[] = 'Nomor telepon wajib diisi minimal 8 digit angka yang valid.';
}

if (mb_strlen($institution) < 2) {
    $errors[] = 'Nama institusi/instansi wajib diisi.';
}

if (!isset($courses[$courseKey])) {
    $errors[] = 'Pilihan program kursus tidak ditemukan dalam sistem.';
}

$maxPackages = isset($courses[$courseKey]) ? (int)$courses[$courseKey]['packages'] : 5;
if ($packageCount === false || $packageCount < 1 || $packageCount > $maxPackages) {
    $errors[] = 'Jumlah paket materi harus bernilai antara 1 sampai ' . $maxPackages . '.';
}

if (!isset($learningMethods[$learningMethodKey])) {
    $errors[] = 'Metode pembelajaran yang dipilih tidak valid.';
}

if (!isset($participantTypes[$participantTypeKey])) {
    $errors[] = 'Kategori tipe peserta tidak valid.';
}

$validInterests = [];
foreach ($rawInterests as $item) {
    if (isset($interestsList[$item])) {
        $validInterests[] = $interestsList[$item];
    }
}

function rupiah(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

if (!empty($errors)) {
    http_response_code(422);
}
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= !empty($errors) ? 'Validasi Gagal (422) - KursusKu' : 'Ringkasan Pendaftaran - KursusKu' ?></title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
  <link rel="stylesheet" href="assets/css/summary.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="register.php">Registrasi Baru</a>
    <a href="history.php">Riwayat</a>
    <a href="fee-tests.php">Uji Biaya</a>
  </nav>
</header>

<main class="container">
  <?php if (!empty($errors)): ?>
    <section class="page-intro">
      <p class="eyebrow" style="color: #ef4444;">Status HTTP 422 - Unprocessable Entity</p>
      <h1>Pendaftaran Tidak Dapat Diproses</h1>
      <p>Data yang dikirimkan belum memenuhi persyaratan validasi server. Silakan periksa kembali daftar kendala berikut:</p>
    </section>

    <section class="form-card" style="border-left: 4px solid #ef4444;">
      <h2 style="color: #ef4444; font-size: 1.25rem; margin-top: 0;">Kendala Pengisian Data:</h2>
      <ul style="margin-left: 1.25rem; color: #b91c1c; line-height: 1.8;">
        <?php foreach ($errors as $error): ?>
          <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
        <?php endforeach; ?>
      </ul>
      <div style="margin-top: 1.5rem;">
        <a href="javascript:history.back()" class="btn btn-primary">Kembali dan Perbaiki Data</a>
        <a href="register.php" class="btn btn-secondary">Isi Ulang Formulir</a>
      </div>
    </section>

  <?php else: ?>
    <?php
      $chosenCourse = $courses[$courseKey];
      $unitPrice = (int)$chosenCourse['price'];
      $subtotal = $unitPrice * (int)$packageCount;
      $typeInfo = $participantTypes[$participantTypeKey];
      $discountPercent = (int)$typeInfo['discount'];
      $discountAmount = intdiv($subtotal * $discountPercent, 100);
      $grandTotal = $subtotal - $discountAmount + $adminFee;
      $invoiceCode = 'REG-' . date('ymd') . '-' . strtoupper(substr(md5($fullname . microtime()), 0, 5));
      $registeredTime = date('d-m-Y H:i:s');
    ?>

    <section class="page-intro">
      <p class="eyebrow" style="color: #10b981;">Pendaftaran Berhasil Diterima</p>
      <h1>Ringkasan Pendaftaran Kursus</h1>
      <p>Terima kasih, pendaftaran Anda telah tercatat dalam sistem kami. Simpan kode registrasi untuk kebutuhan konfirmasi.</p>
    </section>

    <div class="summary-grid">
      <section class="summary-card">
        <h2>Identitas Peserta</h2>
        <table class="data-table">
          <tr>
            <th>Nomor Invoice</th>
            <td><strong><?= htmlspecialchars($invoiceCode, ENT_QUOTES, 'UTF-8') ?></strong></td>
          </tr>
          <tr>
            <th>Waktu Pendaftaran</th>
            <td><?= htmlspecialchars($registeredTime, ENT_QUOTES, 'UTF-8') ?> WIB</td>
          </tr>
          <tr>
            <th>Nama Lengkap</th>
            <td><?= htmlspecialchars($fullname, ENT_QUOTES, 'UTF-8') ?></td>
          </tr>
          <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?></td>
          </tr>
          <tr>
            <th>Nomor Telepon</th>
            <td><?= htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') ?></td>
          </tr>
          <tr>
            <th>Asal Institusi</th>
            <td><?= htmlspecialchars($institution, ENT_QUOTES, 'UTF-8') ?></td>
          </tr>
          <tr>
            <th>Kategori Peserta</th>
            <td><?= htmlspecialchars($typeInfo['label'], ENT_QUOTES, 'UTF-8') ?></td>
          </tr>
        </table>
      </section>

      <section class="summary-card">
        <h2>Program & Paket Pelatihan</h2>
        <table class="data-table">
          <tr>
            <th>Program Kursus</th>
            <td><?= htmlspecialchars($chosenCourse['name'], ENT_QUOTES, 'UTF-8') ?></td>
          </tr>
          <tr>
            <th>Durasi Kelas</th>
            <td><?= htmlspecialchars($chosenCourse['duration'], ENT_QUOTES, 'UTF-8') ?></td>
          </tr>
          <tr>
            <th>Metode Pembelajaran</th>
            <td><?= htmlspecialchars($learningMethods[$learningMethodKey], ENT_QUOTES, 'UTF-8') ?></td>
          </tr>
          <tr>
            <th>Jumlah Paket</th>
            <td><?= (int)$packageCount ?> Paket Materi</td>
          </tr>
          <tr>
            <th>Minat Tambahan</th>
            <td>
              <?php if (empty($validInterests)): ?>
                <em>Tidak ada opsi minat tambahan yang dipilih.</em>
              <?php else: ?>
                <ul>
                  <?php foreach ($validInterests as $interestName): ?>
                    <li><?= htmlspecialchars($interestName, ENT_QUOTES, 'UTF-8') ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </td>
          </tr>
          <tr>
            <th>Catatan Khusus</th>
            <td>
              <?= !empty($notes) ? nl2br(htmlspecialchars($notes, ENT_QUOTES, 'UTF-8')) : '<em>Tidak ada catatan khusus.</em>' ?>
            </td>
          </tr>
        </table>
      </section>
    </div>

    <section class="summary-card" style="margin-top: 1.5rem;">
      <h2>Kalkulasi & Rincian Pembiayaan</h2>
      <table class="data-table">
        <tr>
          <th>Biaya Kursus per Paket</th>
          <td><?= rupiah($unitPrice) ?></td>
        </tr>
        <tr>
          <th>Jumlah Paket Dipilih</th>
          <td>x <?= (int)$packageCount ?></td>
        </tr>
        <tr>
          <th>Subtotal Biaya Pelatihan</th>
          <td><?= rupiah($subtotal) ?></td>
        </tr>
        <tr>
          <th>Potongan Diskon (<?= $discountPercent ?>% Kategori <?= htmlspecialchars($typeInfo['label'], ENT_QUOTES, 'UTF-8') ?>)</th>
          <td style="color: #10b981;">- <?= rupiah($discountAmount) ?></td>
        </tr>
        <tr>
          <th>Biaya Administrasi & Server</th>
          <td>+ <?= rupiah($adminFee) ?></td>
        </tr>
        <tr style="font-size: 1.15rem; font-weight: bold; background: rgba(56, 189, 248, 0.08);">
          <th>Total Tagihan Akhir</th>
          <td style="color: #0284c7;"><?= rupiah($grandTotal) ?></td>
        </tr>
        <tr>
          <th>Status Verifikasi</th>
          <td><span class="badge" style="background: #fef3c7; color: #92400e; padding: 4px 10px; border-radius: 999px;">Menunggu Pembayaran</span></td>
        </tr>
      </table>

      <div style="margin-top: 1.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
        <a href="register.php" class="btn btn-primary">Daftar Kursus Lain</a>
        <a href="history.php" class="btn btn-secondary">Lihat Data Riwayat Dummy</a>
        <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
      </div>
    </section>
  <?php endif; ?>
</main>

<footer class="site-footer">
  <div class="container footer-content">
    <p>&copy; <?= date('Y') ?> KursusKu. Hak Cipta Dilindungi.</p>
  </div>
</footer>
</body>
</html>
