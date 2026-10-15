<?php

$courses = [
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'fee' => 200000,
    ],
    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'fee' => 250000,
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'fee' => 300000,
    ],
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'fee' => 350000,
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'fee' => 275000,
    ],
    [
        'code' => 'UI-01',
        'name' => 'UI Web Dasar',
        'fee' => 225000,
    ],
];

function findCourse(array $courses, string $code): ?array
{
    foreach ($courses as $course) {
        if ($course['code'] === $code) {
            return $course;
        }
    }

    return null;
}

$searchCode = 'laravel';
$result = findCourse($courses, $searchCode);

?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Simulasi findCourse() - KursusKu</title>
  <style>
    body { font-family: monospace; background: #0f172a; color: #f8fafc; padding: 30px; font-size: 15px; }
    .card { background: #1e293b; border-radius: 8px; padding: 25px; border: 1px solid #334155; max-width: 680px; }
    h1 { color: #38bdf8; font-size: 20px; margin-top: 0; }
    .badge-null { background: #ef4444; color: #ffffff; padding: 3px 8px; border-radius: 4px; font-weight: bold; }
    pre { background: #0f172a; padding: 15px; border-radius: 6px; border: 1px solid #334155; color: #38bdf8; }
  </style>
</head>
<body>
  <div class="card">
    <h1>Simulasi Fungsi findCourse($courses, "laravel")</h1>
    <p><strong>Daftar Kode Kursus yang Tersedia:</strong></p>
    <ul>
      <li>WEB-01 (Web Dasar)</li>
      <li>PHP-01 (PHP Dasar)</li>
      <li>PHP-02 (PHP Lanjutan)</li>
      <li>LAR-01 (Laravel Fundamental)</li>
      <li>DB-01 (MySQL Dasar)</li>
      <li>UI-01 (UI Web Dasar)</li>
    </ul>

    <hr style="border-color: #334155;">

    <p><strong>Pencarian:</strong> <code>findCourse($courses, "laravel")</code></p>
    <p>Hasil: <span class="badge-null">NULL</span> (karena code "laravel" tidak tersedia di daftar kursus)</p>

    <hr style="border-color: #334155;">

    <p><strong>Output var_dump(findCourse($courses, 'laravel')):</strong></p>
    <pre><?php var_dump($result); ?></pre>
  </div>
</body>
</html>
