<?php
// Deteksi apakah request menggunakan GET atau POST secara otomatis
$method = $_SERVER['REQUEST_METHOD'];
$dataSource = ($method === 'GET') ? $_GET : $_POST;

$name = trim($dataSource['name'] ?? '');
$email = trim($dataSource['email'] ?? '');
$phone = trim($dataSource['phone'] ?? '');
$studyProgram = trim($dataSource['study_program'] ?? '');
$course = $dataSource['course'] ?? '';
$participantType = $dataSource['participant_type'] ?? '';
$interests = $dataSource['interests'] ?? [];
$note = trim($dataSource['note'] ?? '');
$source = $dataSource['source'] ?? '';

$interestText = implode(', ', $interests);

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

// Menentukan warna badge berdasarkan metode
$badgeColor = ($method === 'GET') ? '#06b6d4' : '#6366f1';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hasil Pendaftaran - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<main class="container result-page">
  <section class="alert-success">
    <span class="method-badge" style="background-color: <?= $badgeColor ?>;">Metode HTTP: <?= e($method) ?></span>
    <h1>Pendaftaran Diterima untuk Diproses</h1>
    <p>Periksa kembali data latihan berikut.</p>
  </section>
  <section class="summary-card">
    <dl class="summary-list">
      <dt>Nama</dt><dd><?= e($name) ?></dd>
      <dt>Email</dt><dd><?= e($email) ?></dd>
      <dt>Nomor HP</dt><dd><?= e($phone) ?></dd>
      <dt>Program Studi</dt><dd><?= e($studyProgram) ?></dd>
      <dt>Kursus</dt><dd><?= e($course) ?></dd>
      <dt>Jenis Peserta</dt><dd><?= e($participantType) ?></dd>
      <dt>Minat</dt><dd><?= e($interestText) ?></dd>
      <dt>Catatan</dt><dd><?= e($note) ?></dd>
      <dt>Sumber</dt><dd><?= e($source) ?></dd>
      <dt>Metode Digunakan</dt><dd><strong><?= e($method) ?></strong></dd>
    </dl>
    <a class="btn-link" href="registration.php">Kembali ke Form</a>
  </section>
</main>
</body>
</html>