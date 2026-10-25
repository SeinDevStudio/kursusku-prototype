<?php

$historyRecords = [
    [
        'code' => 'REG-26101',
        'name' => 'Pratama Nugraha',
        'course' => 'Fullstack JavaScript Modern',
        'participant_type' => 'Pelajar / Mahasiswa',
        'method' => 'Online Mandiri',
        'package_count' => 2,
        'total_fee' => 590000,
        'date' => '2026-10-10',
        'status' => 'Terverifikasi',
    ],
    [
        'code' => 'REG-26102',
        'name' => 'Siti Aminah',
        'course' => 'Python untuk Sains Data',
        'participant_type' => 'Tenaga Pendidik',
        'method' => 'Blended Learning',
        'package_count' => 1,
        'total_fee' => 356000,
        'date' => '2026-10-12',
        'status' => 'Menunggu Pembayaran',
    ],
    [
        'code' => 'REG-26103',
        'name' => 'Hendra Wijaya',
        'course' => 'Mobile App Flutter & Dart',
        'participant_type' => 'Alumni KursusKu',
        'method' => 'Tatap Muka di Lab',
        'package_count' => 2,
        'total_fee' => 785000,
        'date' => '2026-10-14',
        'status' => 'Aktif Belajar',
    ],
    [
        'code' => 'REG-26104',
        'name' => 'Ratna Kartika',
        'course' => 'Desain Antarmuka UI/UX Figma',
        'participant_type' => 'Masyarakat Umum',
        'method' => 'Online Mandiri',
        'package_count' => 1,
        'total_fee' => 324000,
        'date' => '2026-10-18',
        'status' => 'Terverifikasi',
    ],
    [
        'code' => 'REG-26105',
        'name' => 'Fauzan Ramadhan',
        'course' => 'Keamanan Jaringan & Web',
        'participant_type' => 'Pelajar / Mahasiswa',
        'method' => 'Tatap Muka di Lab',
        'package_count' => 1,
        'total_fee' => 395000,
        'date' => '2026-10-21',
        'status' => 'Menunggu Verifikasi',
    ],
];

function formatRupiah(int $number): string
{
    return 'Rp ' . number_format($number, 0, ',', '.');
}

function formatDateIndo(string $dateString): string
{
    $time = strtotime($dateString);
    return date('d/m/Y', $time);
}

$totalRegistrants = count($historyRecords);
$totalRevenue = array_sum(array_column($historyRecords, 'total_fee'));

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Riwayat Pendaftaran - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
  <style>
    .history-layout {
      max-width: 1180px;
      margin: 0 auto;
    }
    .history-card-custom {
      max-width: 1140px;
      width: 100%;
      margin: 0 auto 2.5rem;
      background: var(--bg-surface);
      border: 1px solid var(--border-color);
      border-radius: 20px;
      padding: 2rem 1.75rem;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
      backdrop-filter: blur(10px);
      position: relative;
      overflow: visible;
    }
    .history-scroll-box {
      overflow-x: auto;
      width: 100%;
      -webkit-overflow-scrolling: touch;
      border: 1px solid var(--border-color);
      border-radius: 12px;
      margin-bottom: 1.5rem;
      background: rgba(17, 24, 39, 0.6);
    }
    .history-table-custom {
      width: 100%;
      min-width: 860px;
      border-collapse: collapse;
      table-layout: auto;
    }
    .history-table-custom th {
      padding: 14px 12px;
      color: var(--text-inverse);
      background: rgba(255, 255, 255, 0.04);
      border-bottom: 2px solid var(--border-color);
      font-size: 0.82rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      text-align: left;
    }
    .history-table-custom td {
      padding: 12px;
      border-bottom: 1px solid var(--border-color);
      vertical-align: middle;
      font-size: 0.9rem;
    }
    .history-table-custom tbody tr:hover {
      background: rgba(255, 255, 255, 0.025);
    }
    .history-table-custom tbody tr:last-child td {
      border-bottom: none;
    }
    .history-badge {
      display: inline-block;
      padding: 5px 12px;
      border-radius: 999px;
      font-size: 0.8rem;
      font-weight: 600;
      line-height: 1.2;
      text-align: center;
      white-space: nowrap;
      box-sizing: border-box;
      max-width: 100%;
    }
    @media (max-width: 768px) {
      .history-card-custom {
        padding: 1.25rem 0.75rem;
        border-radius: 14px;
      }
    }
  </style>
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="register.php">Registrasi Baru</a>
    <a class="is-active" href="history.php">Riwayat</a>
    <a href="get-demo.php">Pencarian</a>
    <a href="fee-tests.php">Uji Biaya</a>
  </nav>
</header>

<main class="container history-layout">
  <section class="page-intro">
    <p class="eyebrow">Simulasi Log Data</p>
    <h1>Riwayat Pendaftaran Kursus</h1>
    <p>Daftar aktivitas pendaftaran peserta program pelatihan KursusKu.</p>
  </section>

  <div class="note-box" style="background: rgba(245, 158, 11, 0.12); border-left: 4px solid #f59e0b; padding: 1rem 1.25rem; border-radius: 10px; margin-bottom: 2rem; max-width: 1140px; margin-left: auto; margin-right: auto;">
    <h2 style="font-size: 1rem; color: #fbbf24; margin: 0 0 0.5rem 0;">Informasi Penyimpanan Data:</h2>
    <p style="margin: 0; color: #fef3c7; font-size: 0.95rem; line-height: 1.6;">
      Seluruh rekaman riwayat yang tercantum di bawah ini merupakan <strong>data dummy statis (mock data)</strong> yang dimuat langsung melalui struktur array PHP murni. Aplikasi prototipe ini belum terintegrasi dengan database persisten (seperti MySQL atau MariaDB), sehingga data baru dari formulir pendaftaran belum tersimpan secara permanen.
    </p>
  </div>

  <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 1rem; margin-bottom: 2rem; max-width: 1140px; margin-left: auto; margin-right: auto;">
    <div style="background: var(--bg-surface); border: 1px solid var(--border-color); border-radius: 16px; padding: 1.25rem; text-align: center; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);">
      <span style="font-size: 0.85rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;">Total Pendaftar Dummy</span>
      <h3 style="font-size: 1.85rem; margin: 0.5rem 0 0 0; color: var(--accent);"><?= $totalRegistrants ?> Peserta</h3>
    </div>
    <div style="background: var(--bg-surface); border: 1px solid var(--border-color); border-radius: 16px; padding: 1.25rem; text-align: center; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);">
      <span style="font-size: 0.85rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;">Total Nilai Dummy</span>
      <h3 style="font-size: 1.85rem; margin: 0.5rem 0 0 0; color: #34d399;"><?= formatRupiah($totalRevenue) ?></h3>
    </div>
    <div style="background: var(--bg-surface); border: 1px solid var(--border-color); border-radius: 16px; padding: 1.25rem; text-align: center; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);">
      <span style="font-size: 0.85rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.5px;">Status Server</span>
      <h3 style="font-size: 1.85rem; margin: 0.5rem 0 0 0; color: #a78bfa;">In-Memory Array</h3>
    </div>
  </div>

  <section class="history-card-custom">
    <div class="history-scroll-box">
      <table class="history-table-custom">
        <thead>
          <tr>
            <th style="width: 110px; white-space: nowrap;">ID Tiket</th>
            <th style="min-width: 130px;">Nama Peserta</th>
            <th style="min-width: 170px;">Program Kursus</th>
            <th style="min-width: 130px;">Kategori</th>
            <th style="min-width: 120px;">Metode</th>
            <th style="width: 115px; text-align: right; white-space: nowrap;">Total Biaya</th>
            <th style="width: 100px; text-align: center; white-space: nowrap;">Tgl Daftar</th>
            <th style="width: 165px; min-width: 155px; text-align: center; white-space: nowrap;">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($historyRecords as $record): ?>
            <tr>
              <td style="font-weight: 700; font-family: monospace; color: var(--accent); white-space: nowrap;"><?= htmlspecialchars($record['code'], ENT_QUOTES, 'UTF-8') ?></td>
              <td style="font-weight: 500; color: var(--text-main); line-height: 1.4; word-break: normal; white-space: normal;"><?= htmlspecialchars($record['name'], ENT_QUOTES, 'UTF-8') ?></td>
              <td style="color: var(--text-main); line-height: 1.4; word-break: normal; white-space: normal;"><?= htmlspecialchars($record['course'], ENT_QUOTES, 'UTF-8') ?></td>
              <td style="color: var(--text-muted); line-height: 1.4; font-size: 0.85rem; word-break: normal; white-space: normal;"><?= htmlspecialchars($record['participant_type'], ENT_QUOTES, 'UTF-8') ?></td>
              <td style="color: var(--text-muted); line-height: 1.4; font-size: 0.85rem; word-break: normal; white-space: normal;"><?= htmlspecialchars($record['method'], ENT_QUOTES, 'UTF-8') ?></td>
              <td style="text-align: right; font-weight: 700; color: #34d399; white-space: nowrap; font-variant-numeric: tabular-nums;"><?= formatRupiah($record['total_fee']) ?></td>
              <td style="text-align: center; font-size: 0.85rem; color: var(--text-muted); white-space: nowrap;"><?= formatDateIndo($record['date']) ?></td>
              <td style="text-align: center; white-space: nowrap; width: 165px; min-width: 155px;">
                <?php
                  $badgeColor = 'background: rgba(148, 163, 184, 0.15); color: #cbd5e1; border: 1px solid rgba(148, 163, 184, 0.35);';
                  if ($record['status'] === 'Terverifikasi') {
                      $badgeColor = 'background: rgba(16, 185, 129, 0.18); color: #34d399; border: 1px solid rgba(52, 211, 153, 0.45);';
                  } elseif ($record['status'] === 'Aktif Belajar') {
                      $badgeColor = 'background: rgba(99, 102, 241, 0.18); color: #818cf8; border: 1px solid rgba(129, 140, 248, 0.45);';
                  } elseif ($record['status'] === 'Menunggu Pembayaran') {
                      $badgeColor = 'background: rgba(245, 158, 11, 0.18); color: #fbbf24; border: 1px solid rgba(251, 191, 36, 0.45);';
                  } elseif ($record['status'] === 'Menunggu Verifikasi') {
                      $badgeColor = 'background: rgba(6, 182, 212, 0.18); color: #22d3ee; border: 1px solid rgba(34, 211, 238, 0.45);';
                  }
                ?>
                <span class="history-badge" style="<?= $badgeColor ?>">
                  <?= htmlspecialchars($record['status'], ENT_QUOTES, 'UTF-8') ?>
                </span>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div style="margin-top: 1.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
      <a href="register.php" class="btn btn-primary">Daftar Kursus Baru</a>
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
