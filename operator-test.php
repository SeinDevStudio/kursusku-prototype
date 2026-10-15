<?php
$fee = 350000;

$result = ($fee === 350000);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Operator Test - KursusKu</title>
    <style>
        body { font-family: monospace; background: #0f172a; color: #f8fafc; padding: 30px; font-size: 16px; }
        .card { background: #1e293b; border-radius: 8px; padding: 20px; border: 1px solid #334155; max-width: 680px; }
        h1 { color: #38bdf8; font-size: 20px; margin-top: 0; }
        .val-true { color: #22c55e; font-weight: bold; }
        pre { background: #0f172a; padding: 15px; border-radius: 6px; border: 1px solid #334155; color: #38bdf8; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Uji Coba Operator Identik === (operator-test.php)</h1>
        <p><strong>Deklarasi Variabel:</strong> <code>$fee = 350000;</code></p>
        <hr style="border-color: #334155;">
        <p><strong>Ekspresi Perbandingan:</strong> <code>$fee === 350000</code></p>
        <p>Hasil: <span class="val-true"><?= var_export($result, true) ?></span> (karena nilai dan tipe data sama-sama integer 350000)</p>
        <hr style="border-color: #334155;">
        <p><strong>Output var_dump($fee === 350000):</strong></p>
        <pre><?php var_dump($fee === 350000); ?></pre>
    </div>
</body>
</html>
