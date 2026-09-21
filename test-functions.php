<?php

require_once __DIR__ . '/helpers.php';

$tests = [
    ['Rupiah', rupiah(250000), 'Rp 250.000'],
    ['Penuh', statusKursus(25, 25), 'Penuh'],
    ['Tersedia', statusKursus(30, 29), 'Tersedia'],
    ['Sisa kosong', sisaKursi(20, 0), 20],
    ['Sisa penuh', sisaKursi(25, 25), 0],
    ['Tanggal', formatTanggal('2026-09-15'), '15-09-2026'],
];

foreach ($tests as [$name, $actual, $expected]) {
    $passed = $actual === $expected;

    echo $name . ': ' . ($passed ? 'PASS' : 'FAIL');
    echo ' | actual=' . $actual;
    echo ' | expected=' . $expected . '<br>';
}