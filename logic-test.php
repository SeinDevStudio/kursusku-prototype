<?php
$quota = 30;
$registered = 18;

$isFull = $registered >= $quota;
$hasSeat = $registered < $quota;
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Logic Test - KursusKu</title>
    <style>
        body { font-family: monospace; background: #0f172a; color: #f8fafc; padding: 30px; font-size: 16px; }
        .card { background: #1e293b; border-radius: 8px; padding: 20px; border: 1px solid #334155; max-width: 680px; }
        h1 { color: #38bdf8; font-size: 20px; margin-top: 0; }
        .val-false { color: #f43f5e; font-weight: bold; }
        .val-true { color: #22c55e; font-weight: bold; }
        pre { background: #0f172a; padding: 15px; border-radius: 6px; border: 1px solid #334155; color: #38bdf8; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Uji Coba Logika Kursus (logic-test.php)</h1>
        <p><strong>Nilai Variabel:</strong></p>
        <ul>
            <li>$quota = 30</li>
            <li>$registered = 18</li>
        </ul>
        <hr style="border-color: #334155;">
        <p><strong>1. Evaluasi $isFull (apakah $registered &gt;= $quota):</strong></p>
        <p>Output var_dump($isFull):</p>
        <pre><?php var_dump($isFull); ?></pre>

        <hr style="border-color: #334155;">
        <p><strong>2. Evaluasi $hasSeat (apakah $registered &lt; $quota):</strong></p>
        <p>Output var_dump($hasSeat):</p>
        <pre><?php var_dump($hasSeat); ?></pre>
    </div>
</body>
</html>
