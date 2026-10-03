<?php

$registrationCourses = require __DIR__ . '/course-data.php';

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Loop Lab - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="registration.php">Daftar</a>
    <a href="history-dummy.php">History</a>
    <a class="is-active" href="loop-lab.php">Loop Lab</a>
  </nav>
</header>
<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Loop Lab</p>
    <h1>Paket dan Fasilitas Kursus</h1>
    <p>Daftar kursus dan fasilitas ini ditampilkan otomatis dari data kursus menggunakan loop.</p>
  </section>

  <section class="course-lab" aria-label="Daftar paket dan fasilitas kursus">
    <?php foreach ($registrationCourses as $course): ?>
      <article class="lab-course-card">
        <p class="eyebrow"><?= $course['package_total'] ?> Paket Tersedia</p>
        <h2><?= htmlspecialchars($course['name'], ENT_QUOTES, 'UTF-8') ?></h2>
        <h3>Fasilitas</h3>
        <ul class="facility-list">
          <?php foreach ($course['facilities'] as $facility): ?>
            <li><?= htmlspecialchars($facility, ENT_QUOTES, 'UTF-8') ?></li>
          <?php endforeach; ?>
        </ul>
      </article>
    <?php endforeach; ?>
  </section>

  <div class="page-action">
    <a class="btn-link" href="registration.php">Kembali ke Form</a>
  </div>
</main>
</body>
</html>
