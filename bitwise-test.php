<?php
$READ = 1;     
$WRITE = 2;    
$DELETE = 4;   

$permission = $READ | $WRITE;

$canDelete = ($permission & $DELETE) === $DELETE;
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Bitwise Test - KursusKu</title>
    <style>
        body { font-family: monospace; background: #0f172a; color: #f8fafc; padding: 30px; font-size: 16px; }
        .card { background: #1e293b; border-radius: 8px; padding: 20px; border: 1px solid #334155; max-width: 680px; }
        h1 { color: #38bdf8; font-size: 20px; margin-top: 0; }
        .val-false { color: #f43f5e; font-weight: bold; }
        pre { background: #0f172a; padding: 15px; border-radius: 6px; border: 1px solid #334155; color: #38bdf8; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Uji Coba Bitwise Permission (bitwise-test.php)</h1>
        <p><strong>Definisi Nilai Flag:</strong></p>
        <ul>
            <li>$READ = 1 (biner: 001)</li>
            <li>$WRITE = 2 (biner: 010)</li>
            <li>$DELETE = 4 (biner: 100)</li>
        </ul>
        <hr style="border-color: #334155;">
        <p><strong>Penggabungan Izin:</strong> <code>$permission = $READ | $WRITE;</code></p>
        <p>Nilai $permission: <strong><?= $permission ?></strong> (biner: 011)</p>
        <hr style="border-color: #334155;">
        <p><strong>Pengecekan Izin Delete:</strong> <code>$canDelete = ($permission &amp; $DELETE) === $DELETE;</code></p>
        <p>Nilai $canDelete: <span class="val-false"><?= var_export($canDelete, true) ?></span></p>
        <p><em>(Alasan: false karena flag DELETE bernilai 4 tidak digabungkan ke dalam $permission)</em></p>
        <hr style="border-color: #334155;">
        <p><strong>Output var_dump($canDelete):</strong></p>
        <pre><?php var_dump($canDelete); ?></pre>
    </div>
</body>
</html>
