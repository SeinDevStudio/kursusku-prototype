# KursusKu - Rumus Biaya Minggu 3

## Kalkulator Estimasi Biaya Kursus

Kalkulator ini digunakan untuk menghitung estimasi biaya kursus berdasarkan:

- Biaya kursus per peserta
- Jumlah peserta
- Persentase diskon
- Biaya administrasi

## Rumus Perhitungan

### 1. Subtotal

subtotal = fee x participantCount

### 2. Diskon

discount = subtotal x discountPercent / 100

### 3. Total

total = subtotal - discount + adminFee

## Contoh Input

- Nama kursus: Laravel Fundamental
- Biaya per peserta: Rp 350.000
- Jumlah peserta: 2 orang
- Diskon: 10%
- Biaya admin: Rp 25.000

## Contoh Perhitungan

Subtotal:

350.000 x 2 = 700.000

Diskon:

700.000 x 10 / 100 = 70.000

Total:

700.000 - 70.000 + 25.000 = 655.000

### Hasil

Total biaya kursus = **Rp 655.000**

## Catatan

- Semua nilai uang disimpan sebagai integer rupiah.
- Nilai masih hard-code pada Pertemuan 3.
- Input dari form akan ditambahkan pada pertemuan berikutnya.
- Format rupiah menggunakan `number_format()` saat ditampilkan.
- Biaya admin ditambahkan setelah pengurangan diskon.
