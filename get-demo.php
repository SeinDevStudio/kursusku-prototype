<?php

$catalogItems = [
    [
        'code' => 'WEB-FE',
        'title' => 'Dasar Frontend Web & Responsive CSS',
        'category' => 'frontend',
        'level' => 'pemula',
        'fee' => 300000,
    ],
    [
        'code' => 'PHP-BE',
        'title' => 'Pemrograman PHP Modern & RESTful API',
        'category' => 'backend',
        'level' => 'menengah',
        'fee' => 380000,
    ],
    [
        'code' => 'UI-DSG',
        'title' => 'Desain Antarmuka Pengguna dengan Figma',
        'category' => 'ui-ux',
        'level' => 'pemula',
        'fee' => 320000,
    ],
    [
        'code' => 'PY-DAT',
        'title' => 'Pengolahan Data & Statistik dengan Python',
        'category' => 'datascience',
        'level' => 'menengah',
        'fee' => 420000,
    ],
    [
        'code' => 'LAR-ADV',
        'title' => 'Arsitektur Aplikasi Laravel Lanjutan',
        'category' => 'backend',
        'level' => 'mahir',
        'fee' => 450000,
    ],
];

$keyword = trim($_GET['keyword'] ?? '');
$category = trim($_GET['category'] ?? '');
$level = trim($_GET['level'] ?? '');

$hasQuery = !empty($_GET);

$filteredItems = array_filter($catalogItems, function ($item) use ($keyword, $category, $level) {
    if (!empty($keyword)) {
        if (stripos($item['title'], $keyword) === false && stripos($item['code'], $keyword) === false) {
            return false;
        }
    }

    if (!empty($category) && $item['category'] !== $category) {
        return false;
    }

    if (!empty($level) && $item['level'] !== $level) {
        return false;
    }

    return true;
});

function formatRupiah(int $number): string
{
    return 'Rp ' . number_format($number, 0, ',', '.');
}

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Demonstrasi Pengambilan Data GET - KursusKu</title>
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
    <a class="is-active" href="get-demo.php">Pencarian GET</a>
    <a href="fee-tests.php">Uji Biaya</a>
  </nav>
</header>

<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Protokol HTTP & Request</p>
    <h1>Demonstrasi Form Pencarian Berbasis GET</h1>
    <p>Pengiriman parameter melalui query string URL dan penanganan data secara aman di sisi server menggunakan PHP.</p>
  </section>

  <section class="form-card" style="margin-bottom: 2rem;">
    <h2>Formulir Filter & Pencarian (Method GET)</h2>
    <form action="get-demo.php" method="GET" class="registration-form">
      <div class="form-grid">
        <div class="form-group">
          <label for="keyword">Kata Kunci Pencarian</label>
          <input id="keyword" name="keyword" type="text" value="<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') ?>" placeholder="Contoh: PHP, Figma, atau Web">
        </div>

        <div class="form-group">
          <label for="category">Kategori Kursus</label>
          <select id="category" name="category">
            <option value="">-- Semua Kategori --</option>
            <option value="frontend" <?= $category === 'frontend' ? 'selected' : '' ?>>Frontend Development</option>
            <option value="backend" <?= $category === 'backend' ? 'selected' : '' ?>>Backend Development</option>
            <option value="ui-ux" <?= $category === 'ui-ux' ? 'selected' : '' ?>>UI / UX Design</option>
            <option value="datascience" <?= $category === 'datascience' ? 'selected' : '' ?>>Data Science</option>
          </select>
        </div>

        <div class="form-group">
          <label for="level">Tingkat Kesulitan</label>
          <select id="level" name="level">
            <option value="">-- Semua Tingkat --</option>
            <option value="pemula" <?= $level === 'pemula' ? 'selected' : '' ?>>Pemula (Beginner)</option>
            <option value="menengah" <?= $level === 'menengah' ? 'selected' : '' ?>>Menengah (Intermediate)</option>
            <option value="mahir" <?= $level === 'mahir' ? 'selected' : '' ?>>Mahir (Advanced)</option>
          </select>
        </div>
      </div>

      <div class="form-actions" style="margin-top: 1rem;">
        <button type="submit" class="btn btn-primary">Terapkan Filter GET</button>
        <a href="get-demo.php" class="btn btn-secondary">Reset Pencarian</a>
      </div>
    </form>

    <div style="margin-top: 1.25rem; font-size: 0.9rem; color: #64748b;">
      <span>Tautan Cepat Uji Coba:</span>
      <a href="get-demo.php?keyword=PHP&category=backend&level=menengah" style="color: #0284c7; margin-left: 8px;">Filter: PHP Backend</a> |
      <a href="get-demo.php?keyword=Figma&category=ui-ux&level=pemula" style="color: #0284c7; margin-left: 8px;">Filter: UI/UX Pemula</a> |
      <a href="get-demo.php?keyword=Data&category=datascience" style="color: #0284c7; margin-left: 8px;">Filter: Data Science</a>
    </div>
  </section>

  <section class="form-card" style="margin-bottom: 2rem;">
    <h2>Inspeksi Parameter URL Terkirim</h2>
    <table class="data-table">
      <tr>
        <th style="width: 250px;">Metode Pengiriman</th>
        <td><code><?= htmlspecialchars($_SERVER['REQUEST_METHOD'] ?? 'GET', ENT_QUOTES, 'UTF-8') ?></code></td>
      </tr>
      <tr>
        <th>Raw Query String ($_SERVER)</th>
        <td>
          <code><?= !empty($_SERVER['QUERY_STRING']) ? htmlspecialchars($_SERVER['QUERY_STRING'], ENT_QUOTES, 'UTF-8') : '<em>(Tidak ada query string di URL)</em>' ?></code>
        </td>
      </tr>
      <tr>
        <th>Status Array $_GET</th>
        <td>
          <?php if ($hasQuery): ?>
            <span class="badge" style="background: #d1fae5; color: #065f46;"><?= count($_GET) ?> Parameter Diterima</span>
          <?php else: ?>
            <span class="badge" style="background: #f1f5f9; color: #64748b;">Array $_GET Kosong</span>
          <?php endif; ?>
        </td>
      </tr>
      <tr>
        <th>Isi Parameter keyword</th>
        <td><strong><?= !empty($keyword) ? htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') : '<em>(Tidak diisi)</em>' ?></strong></td>
      </tr>
      <tr>
        <th>Isi Parameter category</th>
        <td><strong><?= !empty($category) ? htmlspecialchars($category, ENT_QUOTES, 'UTF-8') : '<em>(Semua kategori)</em>' ?></strong></td>
      </tr>
      <tr>
        <th>Isi Parameter level</th>
        <td><strong><?= !empty($level) ? htmlspecialchars($level, ENT_QUOTES, 'UTF-8') : '<em>(Semua level)</em>' ?></strong></td>
      </tr>
    </table>
  </section>

  <section class="form-card">
    <h2>Hasil Filter Kursus Berdasarkan Parameter GET</h2>
    <p>Menampilkan <?= count($filteredItems) ?> dari total <?= count($catalogItems) ?> program kursus yang tersedia.</p>

    <div class="table-scroll" style="overflow-x: auto;">
      <table class="data-table" style="width: 100%; border-collapse: collapse;">
        <thead>
          <tr style="border-bottom: 2px solid #e2e8f0; text-align: left;">
            <th style="padding: 10px;">Kode</th>
            <th style="padding: 10px;">Judul Program</th>
            <th style="padding: 10px;">Kategori</th>
            <th style="padding: 10px;">Tingkat</th>
            <th style="padding: 10px; text-align: right;">Biaya Kursus</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($filteredItems)): ?>
            <tr>
              <td colspan="5" style="text-align: center; padding: 20px; color: #64748b;">
                Tidak ada program kursus yang cocok dengan filter parameter pencarian.
              </td>
            </tr>
          <?php else: ?>
            <?php foreach ($filteredItems as $item): ?>
              <tr style="border-bottom: 1px solid #f1f5f9;">
                <td style="padding: 10px; font-weight: bold; font-family: monospace;"><?= htmlspecialchars($item['code'], ENT_QUOTES, 'UTF-8') ?></td>
                <td style="padding: 10px;"><?= htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') ?></td>
                <td style="padding: 10px;"><span class="badge" style="background: #e0f2fe; color: #0369a1;"><?= htmlspecialchars($item['category'], ENT_QUOTES, 'UTF-8') ?></span></td>
                <td style="padding: 10px;"><span class="badge" style="background: #f1f5f9; color: #334155;"><?= htmlspecialchars($item['level'], ENT_QUOTES, 'UTF-8') ?></span></td>
                <td style="padding: 10px; text-align: right; font-weight: 600;"><?= formatRupiah($item['fee']) ?></td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <div style="margin-top: 1.5rem; display: flex; gap: 1rem; flex-wrap: wrap;">
      <a href="register.php" class="btn btn-primary">Buka Form Registrasi POST</a>
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
