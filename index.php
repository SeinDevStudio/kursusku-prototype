<?php 
$siteName = 'KursusKu UIN';
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year = date('Y'); 

require_once __DIR__ . '/helpers.php';

$courses = [
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'fee' => 200000,
        'quota' => 30,
        'registered' => 12,
        'start_date' => '2026-09-21',
    ],
    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'fee' => 250000,
        'quota' => 30,
        'registered' => 18,
        'start_date' => '2026-09-22',
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'fee' => 300000,
        'quota' => 25,
        'registered' => 24,
        'start_date' => '2026-09-24',
    ],
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'fee' => 350000,
        'quota' => 25,
        'registered' => 25,
        'start_date' => '2026-09-28',
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'fee' => 275000,
        'quota' => 20,
        'registered' => 0,
        'start_date' => '2026-10-01',
    ],
    [
        'code' => 'UI-01',
        'name' => 'UI Web Dasar',
        'fee' => 225000,
        'quota' => 35,
        'registered' => 9,
        'start_date' => '2026-10-03',
    ],
];?>

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
      <p> Temukan kursus teknologi yang relevan untuk meningkatkan keterampilan Anda. </p> <div class="hero-buttons">
    <a href="#katalog" class="btn-primary">
        Lihat Kursus
    </a>

    <a href="fee-calculator.php" class="calculator-link">
        Lihat Estimasi Biaya
    </a>
</div>
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

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Kursus</th>
                <th>Biaya</th>
                <th>Mulai</th>
                <th>Sisa Kursi</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= htmlspecialchars($course['code']) ?></td>

                    <td>
                        <?= htmlspecialchars(trim($course['name'])) ?>
                    </td>

                    <td>
                        <?= rupiah($course['fee']) ?>
                    </td>

                    <td>
                        <?= formatTanggal($course['start_date']) ?>
                    </td>

                    <td>
                        <?= sisaKursi($course['quota'], $course['registered']) ?>
                    </td>

                    <td>
    <?php
    $status = statusKursus(
        $course['quota'],
        $course['registered']
    );

    $class = $status === 'Penuh'
        ? 'badge-full'
        : 'badge-available';
    ?>

    <span class="<?= $class ?>">
        <?= $status ?>
    </span>
</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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