<?php

return [
    'courses' => [
        'fullstack-js' => [
            'name' => 'Fullstack JavaScript Modern',
            'price' => 380000,
            'duration' => '6 Minggu',
            'quota' => 25,
            'registered' => 14,
            'packages' => 3,
        ],
        'python-data' => [
            'name' => 'Python untuk Sains Data',
            'price' => 420000,
            'duration' => '8 Minggu',
            'quota' => 20,
            'registered' => 18,
            'packages' => 2,
        ],
        'flutter-mobile' => [
            'name' => 'Mobile App Flutter & Dart',
            'price' => 450000,
            'duration' => '8 Minggu',
            'quota' => 15,
            'registered' => 7,
            'packages' => 2,
        ],
        'cyber-security' => [
            'name' => 'Keamanan Jaringan & Web',
            'price' => 500000,
            'duration' => '6 Minggu',
            'quota' => 20,
            'registered' => 5,
            'packages' => 2,
        ],
        'uiux-product' => [
            'name' => 'Desain Antarmuka UI/UX Figma',
            'price' => 320000,
            'duration' => '4 Minggu',
            'quota' => 30,
            'registered' => 22,
            'packages' => 3,
        ],
    ],
    'interests' => [
        'frontend' => 'Pengembangan Frontend & Antarmuka',
        'backend' => 'Arsitektur Backend & API',
        'devops' => 'Deployment Cloud & DevOps',
        'datascience' => 'Analisis Data & Visualisasi',
        'machine-learning' => 'Dasar Pemodelan Mesin Cerdas',
    ],
    'participant_types' => [
        'pelajar' => [
            'label' => 'Pelajar / Mahasiswa Aktif',
            'discount' => 25,
        ],
        'pendidik' => [
            'label' => 'Tenaga Pendidik / Guru / Dosen',
            'discount' => 20,
        ],
        'alumni' => [
            'label' => 'Alumni Program KursusKu',
            'discount' => 15,
        ],
        'umum' => [
            'label' => 'Masyarakat Umum / Profesional',
            'discount' => 5,
        ],
    ],
    'facilities' => [
        'Akses Rekaman Video Pembelajaran 24/7',
        'Sertifikat Digital Kelulusan Resmi',
        'Sesi Mentoring Langsung Bersama Praktisi',
        'Modul Panduan & Berkas Latihan Lengkap',
        'Grup Diskusi Komunitas Alumni KursusKu',
        'Review Tugas & Portofolio Proyek',
    ],
    'learning_methods' => [
        'online' => 'Online Mandiri & Webinar',
        'tatap-muka' => 'Tatap Muka di Lab Kampus',
        'blended' => 'Blended Learning (Kombinasi)',
    ],
    'admin_fee' => 20000,
];
