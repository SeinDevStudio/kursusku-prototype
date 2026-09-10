<?php $siteName = 'KursusKu UIN';
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year = date('Y'); ?>
<!doctype html>
<html lang="id">

<link rel="stylesheet" href="assets/css/style.css">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($siteName) ?></title>
</head>

<body> 
  <header>
    <nav aria-label="Navigasi utama"> <a href="index.php"> <strong><?= htmlspecialchars($siteName) ?></strong> </a> <a href="#keunggulan">Keunggulan</a> <a href="#katalog">Katalog</a> <a href="#alur">Cara Daftar</a> <a href="#kontak">Kontak</a> </nav>
  </header>
  <main>
    <section id="hero">
      <h1><?= htmlspecialchars($tagline) ?></h1>
      <p> Temukan kursus teknologi yang relevan untuk meningkatkan keterampilan Anda. </p> <a href="#katalog"> Lihat Katalog Kursus </a>
    </section>
    <section id="keunggulan">
      <h2>Mengapa Memilih KursusKu?</h2>
      <article>
        <h3>Materi Terarah</h3>
        <p> Materi disusun bertahap dari dasar hingga praktik. </p>
      </article>
      <article>
        <h3>Belajar dengan Proyek</h3>
        <p> Setiap tahap menghasilkan bagian nyata dari aplikasi. </p>
      </article>
      <article>
        <h3>Pendampingan Praktik</h3>
        <p> Mahasiswa belajar melalui demonstrasi, latihan, dan evaluasi. </p>
      </article>
    </section> 
    <section id="katalog">
      <h2>Katalog Kursus</h2>
      <article>
        <h3>Web Dasar</h3>
        <p> Belajar struktur HTML dan dasar pengembangan web. </p>
      </article>
      <article>
        <h3>PHP Dasar</h3>
        <p> Belajar variabel, operator, percabangan, looping, dan form. </p>
      </article>
      <article>
        <h3>Laravel Dasar</h3>
        <p> Mengenal framework, route, controller, view, dan database. </p>
      </article>
    </section> 
    <section id="alur">
      <h2>Cara Mendaftar</h2>
      <ol>
        <li>Pilih kursus yang diminati.</li>
        <li>Isi form pendaftaran.</li>
        <li>Periksa kembali data.</li>
        <li> Kirim pendaftaran dan tunggu konfirmasi. </li>
      </ol>
    </section>
    <section id="media">
      <h2>Kenali Program Kami</h2> <img src="assets/images/hero-kursus.jpg" alt="Mahasiswa sedang mengikuti kegiatan kursus komputer" width="640">
      <h3>Video Singkat</h3> <video controls width="640">
        <source src="assets/video/intro-kursus.mp4" type="video/mp4"> Browser Anda tidak mendukung video HTML5.
      </video>
      <p> <a href="https://www.php.net/" target="_blank" rel="noopener"> Dokumentasi PHP </a> </p>
    </section>
    <section id="kontak">
      <h2>Kontak</h2>
      <p> Email: Seindevstudio@gmail.com </p>
      <p> Alamat: UIN Sjech M Djamil Djambek </p>
    </section>
  </main>
  <footer> <small> &copy; <?= $year ?> <?= htmlspecialchars($siteName) ?> </small> </footer>
</body>

</html>