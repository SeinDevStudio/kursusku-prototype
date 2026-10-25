<?php

$data = require __DIR__ . '/data.php';

$courses = $data['courses'];
$interests = $data['interests'];
$participantTypes = $data['participant_types'];
$facilities = $data['facilities'];
$learningMethods = $data['learning_methods'];

function rupiahFormat(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pendaftaran Peserta Baru - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a class="is-active" href="register.php">Registrasi Baru</a>
    <a href="history.php">Riwayat</a>
    <a href="get-demo.php">Pencarian</a>
    <a href="fee-tests.php">Uji Biaya</a>
  </nav>
</header>

<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Formulir Pendaftaran Terpadu</p>
    <h1>Registrasi Program Pelatihan</h1>
    <p>Silakan lengkapi formulir di bawah ini dengan data yang benar. Seluruh opsi pilihan dirender secara dinamis dari data sistem.</p>
  </section>

  <section class="form-card">
    <form action="process.php" method="POST" class="registration-form">
      <div class="form-grid">
        <div class="form-group">
          <label for="fullname">Nama Lengkap</label>
          <input id="fullname" name="fullname" type="text" minlength="3" maxlength="100" placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="form-group">
          <label for="email">Alamat Email</label>
          <input id="email" name="email" type="email" maxlength="120" placeholder="nama@domain.com" required>
        </div>

        <div class="form-group">
          <label for="phone">Nomor Telepon / WhatsApp</label>
          <input id="phone" name="phone" type="tel" maxlength="20" placeholder="Contoh: 08123456789" required>
        </div>

        <div class="form-group">
          <label for="institution">Asal Institusi / Instansi / Kampus</label>
          <input id="institution" name="institution" type="text" maxlength="100" placeholder="Contoh: UIN Syarif Hidayatullah" required>
        </div>
      </div>

      <div class="form-group">
        <label for="course">Pilihan Program Kursus</label>
        <select id="course" name="course" required>
          <option value="">-- Pilih Program Kursus --</option>
          <?php foreach ($courses as $key => $course): ?>
            <option value="<?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8') ?>">
              <?= htmlspecialchars($course['name'], ENT_QUOTES, 'UTF-8') ?> - <?= rupiahFormat($course['price']) ?> (Durasi: <?= htmlspecialchars($course['duration'], ENT_QUOTES, 'UTF-8') ?>)
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="form-grid">
        <div class="form-group">
          <label for="package_count">Jumlah Paket Materi</label>
          <input id="package_count" name="package_count" type="number" min="1" max="5" value="1" required>
        </div>

        <div class="form-group">
          <label>Metode Pembelajaran</label>
          <div class="choice-group">
            <?php foreach ($learningMethods as $methodKey => $methodLabel): ?>
              <label class="choice-item">
                <input type="radio" name="learning_method" value="<?= htmlspecialchars($methodKey, ENT_QUOTES, 'UTF-8') ?>" required>
                <span><?= htmlspecialchars($methodLabel, ENT_QUOTES, 'UTF-8') ?></span>
              </label>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div class="form-group">
        <label>Kategori Peserta (Penentu Diskon Khusus)</label>
        <div class="choice-group">
          <?php foreach ($participantTypes as $typeKey => $typeInfo): ?>
            <label class="choice-item">
              <input type="radio" name="participant_type" value="<?= htmlspecialchars($typeKey, ENT_QUOTES, 'UTF-8') ?>" required>
              <span>
                <?= htmlspecialchars($typeInfo['label'], ENT_QUOTES, 'UTF-8') ?>
                <strong>(Diskon <?= (int)$typeInfo['discount'] ?>%)</strong>
              </span>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="form-group">
        <label>Pilihan Minat dan Fokus Tambahan</label>
        <div class="choice-grid">
          <?php foreach ($interests as $interestKey => $interestLabel): ?>
            <label class="choice-item">
              <input type="checkbox" name="interests[]" value="<?= htmlspecialchars($interestKey, ENT_QUOTES, 'UTF-8') ?>">
              <span><?= htmlspecialchars($interestLabel, ENT_QUOTES, 'UTF-8') ?></span>
            </label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="form-group">
        <label for="notes">Catatan atau Harapan Belajar (Opsional)</label>
        <textarea id="notes" name="notes" rows="3" placeholder="Tuliskan materi atau ekspektasi yang ingin dicapai selama kursus..."></textarea>
      </div>

      <div class="form-group">
        <label>Fasilitas Resmi yang Disediakan</label>
        <ul class="facility-preview">
          <?php foreach ($facilities as $facility): ?>
            <li>✓ <?= htmlspecialchars($facility, ENT_QUOTES, 'UTF-8') ?></li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="form-actions">
        <button type="submit" class="btn btn-primary">Kirim Pendaftaran & Hitung Biaya</button>
        <button type="reset" class="btn btn-secondary">Reset Formulir</button>
      </div>
    </form>
  </section>
</main>

<footer class="site-footer">
  <div class="container footer-content">
    <p>&copy; <?= date('Y') ?> KursusKu. Hak Cipta Dilindungi.</p>
  </div>
</footer>
</body>
</html>
