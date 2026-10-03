<?php

$registrationCourses = require __DIR__ . '/course-data.php';

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Daftar Kursus - KursusKu</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/polish.css">
</head>
<body>
<header class="site-header">
  <nav class="site-nav container" aria-label="Navigasi utama">
    <a class="brand" href="index.php">KursusKu</a>
    <a href="index.php">Beranda</a>
    <a href="index.php#katalog">Katalog</a>
    <a class="is-active" href="registration.php">Daftar</a>
    <a href="test-matrix.php">Test Matrix</a>
  </nav>
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
          <?php foreach ($registrationCourses as $courseKey => $course): ?>
            <option value="<?= htmlspecialchars($courseKey, ENT_QUOTES, 'UTF-8') ?>">
              <?= htmlspecialchars($course['name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
          <?php endforeach; ?>
        </select>
      </div>

      <aside id="course-details" class="course-details" aria-live="polite" hidden>
        <div class="course-details-heading">
          <p class="eyebrow">Detail Kursus</p>
          <h2 id="course-name">&nbsp;</h2>
        </div>
        <div class="course-package-total">
          <span>Jumlah paket tersedia</span>
          <strong id="package-total">0 paket</strong>
        </div>
        <div>
          <h3>Fasilitas yang didapat</h3>
          <ul id="facility-list" class="facility-list"></ul>
        </div>
      </aside>

      <div class="form-grid">
        <div class="form-group">
          <label for="learning_method">Metode Belajar</label>
          <select id="learning_method" name="learning_method" required>
            <option value="">-- Pilih metode belajar --</option>
            <option value="online">Kelas Online</option>
            <option value="offline">Kelas Tatap Muka</option>
            <option value="hybrid">Kelas Hybrid</option>
          </select>
        </div>
        <div class="form-group">
          <label for="package_count">Jumlah Paket</label>
          <select id="package_count" name="package_count" required disabled>
            <option value="">-- Pilih kursus terlebih dahulu --</option>
          </select>
        </div>
      </div>

      <fieldset class="form-group option-fieldset">
        <legend>Jenis Peserta</legend>
        <label class="choice">
          <input type="radio" name="participant_type" value="mahasiswa" required> Mahasiswa
        </label>
        <label class="choice">
          <input type="radio" name="participant_type" value="guru"> Guru
        </label>
        <label class="choice">
          <input type="radio" name="participant_type" value="umum"> Umum
        </label>
      </fieldset>

      <fieldset class="form-group option-fieldset">
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

      <div class="button-group">
        <button class="btn-primary" type="submit">Proses Pendaftaran</button>
        <a class="btn-secondary" href="history-dummy.php">History Dummy</a>
        <a class="btn-secondary" href="loop-lab.php">Loop Lab</a>
      </div>
    </form>
  </section>
</main>
<script>
  const courses = <?= json_encode(
      $registrationCourses,
      JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_UNICODE
  ) ?>;
  const courseSelect = document.querySelector('#course');
  const courseDetails = document.querySelector('#course-details');
  const courseName = document.querySelector('#course-name');
  const packageTotal = document.querySelector('#package-total');
  const packageCountSelect = document.querySelector('#package_count');
  const facilityList = document.querySelector('#facility-list');

  function setPackageOptions(total) {
    const currentValue = Number(packageCountSelect.value);
    const placeholder = new Option('-- Pilih jumlah paket --', '');
    const options = [placeholder];

    for (let count = 1; count <= total; count += 1) {
      options.push(new Option(`${count} paket`, count));
    }

    packageCountSelect.replaceChildren(...options);
    packageCountSelect.disabled = false;

    if (currentValue >= 1 && currentValue <= total) {
      packageCountSelect.value = currentValue;
    }
  }

  function showCourseDetails() {
    const selectedCourse = courses[courseSelect.value];

    if (!selectedCourse) {
      courseDetails.hidden = true;
      packageCountSelect.replaceChildren(
        new Option('-- Pilih kursus terlebih dahulu --', '')
      );
      packageCountSelect.disabled = true;
      return;
    }

    courseName.textContent = selectedCourse.name;
    packageTotal.textContent = `${selectedCourse.package_total} paket`;
    setPackageOptions(selectedCourse.package_total);
    facilityList.replaceChildren(
      ...selectedCourse.facilities.map((facility) => {
        const item = document.createElement('li');
        item.textContent = facility;
        return item;
      })
    );
    courseDetails.hidden = false;
  }

  courseSelect.addEventListener('change', showCourseDetails);
  showCourseDetails();
</script>
</body>
</html>
