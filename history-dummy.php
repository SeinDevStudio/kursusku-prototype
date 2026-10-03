<?php

$registrationHistory = [
    [
        'id' => 'REG-26001',
        'name' => 'Nadia Putri',
        'course' => 'Web Dasar',
        'method' => 'Kelas Online',
        'status' => 'Diproses',
    ],
    [
        'id' => 'REG-26002',
        'name' => 'Budi Santoso',
        'course' => 'PHP Dasar',
        'method' => 'Kelas Tatap Muka',
        'status' => 'Terkonfirmasi',
    ],
    [
        'id' => 'REG-26003',
        'name' => 'Dewi Lestari',
        'course' => 'Laravel Fundamental',
        'method' => 'Kelas Hybrid',
        'status' => 'Menunggu Pembayaran',
    ],
];

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>History Dummy - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="registration.php">Daftar</a>
    <a class="is-active" href="history-dummy.php">History</a>
    <a href="loop-lab.php">Loop Lab</a>
  </nav>
</header>
<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Data Contoh</p>
    <h1>History Pendaftaran</h1>
    <p>Riwayat berikut adalah data dummy dan tidak berasal dari pendaftaran yang dikirim.</p>
  </section>

  <section class="summary-card history-card">
    <div class="table-scroll">
      <table class="history-table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kursus</th>
            <th>Metode Belajar</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($registrationHistory as $registration): ?>
            <tr>
              <td><?= e($registration['id']) ?></td>
              <td><?= e($registration['name']) ?></td>
              <td><?= e($registration['course']) ?></td>
              <td><?= e($registration['method']) ?></td>
              <td>
                <span class="history-status <?= $registration['status'] === 'Terkonfirmasi' ? 'history-status-confirmed' : '' ?>">
                  <?= e($registration['status']) ?>
                </span>
              </td>
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
