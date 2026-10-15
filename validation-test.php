<?php
// Simulasi validasi form gagal
http_response_code(422);
$errorMessage = 'Validasi gagal: Beberapa field wajib belum terisi dengan benar.';
?>
<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>422 Unprocessable Entity - Validation Error</title>
  <style>
    body { font-family: monospace; background: #0f172a; color: #f8fafc; padding: 30px; }
    .card { background: #1e293b; border-radius: 8px; padding: 25px; border: 1px solid #ef4444; max-width: 650px; }
    h1 { color: #f87171; font-size: 22px; margin-top: 0; }
    .badge { background: #ef4444; color: white; padding: 4px 8px; border-radius: 4px; font-weight: bold; }
    pre { background: #0f172a; padding: 15px; border-radius: 6px; border: 1px solid #334155; color: #38bdf8; }
  </style>
</head>
<body>
  <div class="card">
    <h1>HTTP Response Code: <span class="badge">422 Unprocessable Entity</span></h1>
    <p>Ketika terdapat error validasi formulir pada <code>process.php</code>, server menetapkan HTTP status code <strong>422</strong>.</p>
    <hr style="border-color: #334155;">
    <p><strong>Fungsi PHP:</strong> <code>http_response_code(422);</code></p>
    <p><strong>Hasil pemeriksaan fungsi:</strong></p>
    <pre>http_response_code() => <?= http_response_code() ?></pre>
    <p><em>(Catatan: Buka Inspect Element / F12 &rarr; Tab Network untuk melihat status code 422 secara langsung)</em></p>
  </div>
</body>
</html>
