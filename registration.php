<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Kursus - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a class="brand" href="index.php">KursusKu</a>
    <nav aria-label="Navigasi utama">
      <a href="index.php">Beranda</a>
      <a href="index.php#katalog">Katalog</a>
      <a href="registration.php">Daftar</a>
    </nav>
  </div>
</header>
<main class="container">
  <section class="page-intro">
    <p class="eyebrow">Pendaftaran Kursus</p>
    <h1>Mulai belajar bersama KursusKu</h1>
    <p>Gunakan data latihan. Field bertanda wajib harus diisi.</p>
  </section>
  <section class="form-card">
    <form action="process-registration.php" method="POST" class="registration-form">
      <input type="hidden" name="source" value="week-05">

      <div class="form-grid">
        <div class="form-group">
          <label for="name">Nama Lengkap</label>
          <input id="name" name="name" type="text"
                 minlength="3" maxlength="100"
                 autocomplete="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" name="email" type="email"
                 maxlength="120" autocomplete="email" required>
        </div>
        <div class="form-group">
          <label for="phone">Nomor HP</label>
          <input id="phone" name="phone" type="tel"
                 maxlength="15" autocomplete="tel"
                 placeholder="Contoh: 081234567890" required>
        </div>
        <div class="form-group">
          <label for="study_program">Program Studi</label>
          <input id="study_program" name="study_program"
                 type="text" maxlength="100" required>
        </div>
      </div>

      <div class="form-group">
        <label for="course">Kursus yang Dipilih</label>
        <select id="course" name="course" required>
          <option value="">-- Pilih kursus --</option>
          <option value="web-dasar">Web Dasar</option>
          <option value="php-dasar">PHP Dasar</option>
          <option value="laravel-fundamental">Laravel Fundamental</option>
        </select>
      </div>

      <fieldset class="form-group">
        <legend>Jenis Peserta</legend>
        <label class="choice">
          <input type="radio" name="participant_type" value="mahasiswa" required> Mahasiswa
        </label>
        <label class="choice">
          <input type="radio" name="participant_type" value="umum"> Umum
        </label>
      </fieldset>

      <fieldset class="form-group">
        <legend>Minat Tambahan</legend>
        <label class="choice"><input type="checkbox" name="interests[]" value="ui-ux"> UI/UX</label>
        <label class="choice"><input type="checkbox" name="interests[]" value="database"> Database</label>
        <label class="choice"><input type="checkbox" name="interests[]" value="backend"> Backend</label>
      </fieldset>

      <div class="form-group">
        <label for="note">Catatan</label>
        <textarea id="note" name="note" rows="5" maxlength="300"
                  placeholder="Tuliskan kebutuhan belajar Anda (opsional)"></textarea>
        <small class="help">Maksimal 300 karakter.</small>
      </div>

      <button class="btn-primary" type="submit">Kirim Pendaftaran</button>
    </form>
  </section>
</main>
</body>
</html>