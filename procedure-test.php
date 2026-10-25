<?php

function cetakPemberitahuan(string $judul, string $pesan, string $tipe = 'info'): void
{
    $warnaBg = '#e0f2fe';
    $warnaTeks = '#0369a1';
    $warnaBorder = '#0284c7';
    $simbol = 'ℹ';

    if ($tipe === 'sukses') {
        $warnaBg = '#dcfce7';
        $warnaTeks = '#15803d';
        $warnaBorder = '#16a34a';
        $simbol = '✓';
    } elseif ($tipe === 'peringatan') {
        $warnaBg = '#fef3c7';
        $warnaTeks = '#b45309';
        $warnaBorder = '#f59e0b';
        $simbol = '⚠';
    } elseif ($tipe === 'bahaya') {
        $warnaBg = '#fee2e2';
        $warnaTeks = '#b91c1c';
        $warnaBorder = '#ef4444';
        $simbol = '✖';
    }

    echo '<div style="background: ' . $warnaBg . '; color: ' . $warnaTeks . '; border-left: 4px solid ' . $warnaBorder . '; padding: 1rem 1.25rem; border-radius: 6px; margin-bottom: 1rem;">';
    echo '<h3 style="margin: 0 0 0.35rem 0; font-size: 1.05rem; display: flex; align-items: center; gap: 0.5rem;">';
    echo '<span>' . $simbol . '</span> ' . htmlspecialchars($judul, ENT_QUOTES, 'UTF-8');
    echo '</h3>';
    echo '<p style="margin: 0; font-size: 0.95rem; line-height: 1.5;">' . htmlspecialchars($pesan, ENT_QUOTES, 'UTF-8') . '</p>';
    echo '</div>';
}

function sapaanPeserta(string $nama, string $kategori, string $kursus): void
{
    echo '<div class="form-card" style="margin-bottom: 1rem; border: 1px solid #e2e8f0;">';
    echo '<h3 style="margin: 0 0 0.5rem 0; color: #0284c7;">Selamat Datang, ' . htmlspecialchars($nama, ENT_QUOTES, 'UTF-8') . '!</h3>';
    echo '<p style="margin: 0 0 0.5rem 0; color: #475569;">Anda terdaftar sebagai <strong>' . htmlspecialchars($kategori, ENT_QUOTES, 'UTF-8') . '</strong> untuk program <strong>' . htmlspecialchars($kursus, ENT_QUOTES, 'UTF-8') . '</strong>.</p>';
    echo '<span class="badge" style="background: #e0f2fe; color: #0369a1; padding: 3px 8px; border-radius: 4px; font-size: 0.8rem;">Status Akun: Terverifikasi</span>';
    echo '</div>';
}

function tampilkanStatusSistem(string $modul, string $kondisi, string $latensi): void
{
    $bg = ($kondisi === 'Normal') ? '#d1fae5' : '#fee2e2';
    $teks = ($kondisi === 'Normal') ? '#065f46' : '#991b1b';

    echo '<tr style="border-bottom: 1px solid #f1f5f9;">';
    echo '<td style="padding: 10px; font-weight: 500;">' . htmlspecialchars($modul, ENT_QUOTES, 'UTF-8') . '</td>';
    echo '<td style="padding: 10px;"><span style="padding: 3px 10px; border-radius: 999px; font-size: 0.85rem; font-weight: bold; background: ' . $bg . '; color: ' . $teks . ';">' . htmlspecialchars($kondisi, ENT_QUOTES, 'UTF-8') . '</span></td>';
    echo '<td style="padding: 10px; font-family: monospace; color: #64748b;">' . htmlspecialchars($latensi, ENT_QUOTES, 'UTF-8') . '</td>';
    echo '</tr>';
}

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengujian Prosedur Void - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="type-data-test.php">Tipe Data</a>
    <a href="string-test.php">Fungsi String</a>
    <a href="date-test.php">Waktu & Tanggal</a>
    <a class="is-active" href="procedure-test.php">Prosedur</a>
    <a href="register.php">Registrasi Baru</a>
  </nav>
</header>

<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Fungsi Prosedural (Void)</p>
    <h1>Demonstrasi Prosedur Tanpa Nilai Balik</h1>
    <p>Pengujian pembuatan dan eksekusi fungsi prosedur (function : void) yang bertugas mencetak elemen visual secara langsung.</p>
  </section>

  <section class="form-card" style="margin-bottom: 2rem;">
    <h2>1. Prosedur Notifikasi Banner (cetakPemberitahuan)</h2>
    <p>Memanggil prosedur untuk menghasilkan komponen banner peringatan sesuai tipe pesan:</p>

    <?php
      cetakPemberitahuan(
          'Pendaftaran Gelombang Baru Dibuka',
          'Silakan pilih program pelatihan pilihan Anda sebelum kuota masing-masing kelas terpenuhi.',
          'sukses'
      );

      cetakPemberitahuan(
          'Batas Akhir Pelunasan Biaya',
          'Peserta yang belum menyelesaikan konfirmasi pembayaran dimohon menyelesaikan sebelum batas waktu.',
          'peringatan'
      );

      cetakPemberitahuan(
          'Pemeliharaan Server Terjadwal',
          'Sistem akan melakukan backup data mingguan pada hari Minggu dini hari pukul 01:00 WIB.',
          'info'
      );

      cetakPemberitahuan(
          'Koneksi Database Belum Dikonfigurasi',
          'Data pendaftaran saat ini masih disimpan secara statis sebagai array dummy tanpa basis data relasional.',
          'bahaya'
      );
    ?>
  </section>

  <section class="form-card" style="margin-bottom: 2rem;">
    <h2>2. Prosedur Sapaan Interaktif (sapaanPeserta)</h2>
    <p>Merender kartu profil pengguna berdasarkan parameter masukan:</p>

    <?php
      sapaanPeserta('Alya Rahmadina', 'Pelajar / Mahasiswa', 'Fullstack JavaScript Modern');
      sapaanPeserta('Bambang Irawan', 'Tenaga Pendidik', 'Python untuk Sains Data');
    ?>
  </section>

  <section class="form-card">
    <h2>3. Prosedur Output Baris Tabel (tampilkanStatusSistem)</h2>
    <table class="data-table">
      <thead>
        <tr>
          <th>Modul Layanan</th>
          <th>Status Operasional</th>
          <th>Latensi Respons</th>
        </tr>
      </thead>
      <tbody>
        <?php
          tampilkanStatusSistem('Web Server Apache (Laragon)', 'Normal', '1.2 ms');
          tampilkanStatusSistem('PHP 8.3 Engine', 'Normal', '0.8 ms');
          tampilkanStatusSistem('Koneksi Database MySQL', 'Tidak Aktif (Simulasi Dummy)', 'N/A');
          tampilkanStatusSistem('Modul Kalkulator Biaya', 'Normal', '0.4 ms');
        ?>
      </tbody>
    </table>

    <div style="margin-top: 1.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
      <a href="get-demo.php" class="btn btn-primary">Lanjut ke Demo Form GET</a>
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
