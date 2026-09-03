<?php

$siteName = "KursusKu";
$tagline = "Belajar Teknologi, Bangun Masa Depan";
$tahun = date("Y");

?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">

  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0">

  <title><?php echo $siteName; ?></title>

  <link
    rel="stylesheet"
    href="assets/css/style.css">
</head>

<body>
  <header class="header">

    <div class="container">

      <h1>
        <?php echo $siteName; ?>
      </h1>

      <p>
        <?php echo $tagline; ?>
      </p>

    </div>

  </header>

  <nav class="navbar">

    <div class="container">

      <a href="#beranda">Beranda</a>

      <a href="#kursus">Kursus</a>

      <a href="#tentang">Tentang</a>

      <a href="#kontak">Kontak</a>

    </div>

  </nav>

  <main>
    <section id="beranda" class="hero">

      <div class="container">

        <div class="hero-content">

          <div>

            <h2>
              Selamat Datang di
              <?php echo $siteName; ?>
            </h2>

            <p>
              Platform belajar teknologi untuk
              mahasiswa yang ingin meningkatkan
              kemampuan pemrograman web.
            </p>

            <a
              href="#kursus"
              class="button">
              Lihat Kursus
            </a>

          </div>

          <div>

            <img
              src="assets/img/image1.png"
              alt="Mahasiswa sedang belajar pemrograman web"
              class="hero-image">

          </div>

        </div>

      </div>

    </section>
    <section id="kursus" class="section">

      <div class="container">

        <h2>Program Kursus</h2>

        <div class="course-grid">

          <article class="course-card">

            <h3>HTML & CSS</h3>

            <p>
              Belajar membangun struktur dan
              tampilan website dari dasar.
            </p>

          </article>


          <article class="course-card">

            <h3>PHP</h3>

            <p>
              Belajar pemrograman web
              server-side menggunakan PHP.
            </p>

          </article>


          <article class="course-card">

            <h3>Laravel</h3>

            <p>
              Membangun aplikasi web modern
              menggunakan framework Laravel.
            </p>

          </article>

        </div>

      </div>

    </section>
    <section id="tentang" class="section section-light">

      <div class="container">

        <h2>Tentang KursusKu</h2>

        <p>
          KursusKu merupakan prototype website
          pembelajaran yang dikembangkan dalam
          mata kuliah Pemrograman Web III.
        </p>

        <p>
          Pada semester ini mahasiswa akan belajar
          PHP, MySQL dan framework Laravel.
        </p>

        <a
          href="https://laravel.com"
          target="_blank"
          rel="noopener">
          Pelajari Laravel
        </a>

      </div>

    </section>
    <section class="section">

      <div class="container">

        <h2>Video Pembelajaran</h2>

        <div class="video-placeholder">

          <iframe width="342" height="607" src="https://www.youtube.com/embed/nQinn48Bk2g" title="Kenapa Laravel Masih Banyak Yang Pake" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>


      </div>

    </section>
    <section id="kontak" class="section section-light">

      <div class="container">

        <h2>Kontak</h2>

        <p>
          Informasi lebih lanjut mengenai
          program KursusKu dapat diperoleh
          melalui halaman ini.
        </p>

      </div>

    </section>
  </main>

  <footer class="footer">

    <div class="container">

      <p>

        &copy;
        <?php echo $tahun; ?>

        <?php echo $siteName; ?>.

        Pemrograman Web III.

      </p>

    </div>

  </footer>
</body>

</html>