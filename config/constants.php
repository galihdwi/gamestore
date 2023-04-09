<?php

/**
 * Yii
 */
define('YII_DEBUG', true);
define('YII_ENV', 'dev');

/**
 * database
 */
define('DB_DSN', 'mysql:host=127.0.0.1;dbname=gamestore');
define('DB_USER', 'root');
define('DB_PASS', 'akuadmine');

/**
 * app
 */
define('APP_NAME', 'Game Store');
define('APP_ID', 'gamestore');

/**
 * params
 */
define('PARAMS', [
    'companyName' => 'Game Store',
    'copyrightText' => date('Y') !== '2023' ? 'Copyright &copy; 2023-' . date('Y') . ' by GameStore' : 'Copyright &copy; 2023' . ' by GameStore',
    'mailAddress' => [
        'fromEmail' => ['noreply@gamestore.id' => 'GameStore'],
        'bccEmail' => [],
        'ccEmail' => []
    ],
    'mailer' => [
        'host' => '127.0.0.1',
        'username' => '',
        'password' => '',
        'port' => '25',
    ],
    'whatsapp' => [
        'apiUrl' => 'https://wachat.digihub.id',
        'token' => '__TOKEN__',
    ],
    'hashid' => [
        'salt' => '__SALT__',
        'minHashLength' => 16,
        'alphabet' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890',
    ],
    'faq' => [
        [
            'question' => 'Bagaimana cara saya dapat mengambil barang di gudang optiX?',
            'answer' => 'Anda dapat mengambil barang di gudang optiX dengan membawa surat pengambilan barang dan identitas diri.',
        ],
        [
            'question' => 'Kapan saya dapat melakukan pengambilan barang yang sudah siap?',
            'answer' => 'Anda dapat melakukan pengambilan barang selama jam operasional gudang optiX, yakni pukul 08:00-16:00 WITA',
        ],
        [
            'question' => 'Siapa yang bisa dihubungi ketika saya akan melakukan pengambilan barang?',
            'answer' => 'Anda dapat menghubungi salah satu admin gudang optiX melalui WhatsApp 089657197650 atas nama Noviana',
        ],
        [
            'question' => 'Metode pembayaran apa saja yang tersedia?',
            'answer' => 'Metode pembayaran yang tersedia adalah transfer bank.',
        ],
        [
            'question' => 'Apakah barang yang saya beli dapat dikembalikan?',
            'answer' => 'Barang yang sudah dibeli tidak dapat dikembalikan.',
        ],
        [
            'question' => 'Berapa lama batas pembarayan invoice?',
            'answer' => 'Batas pembayaran invoice adalah 3 jam sejak invoice diterbitkan.',
        ],
        [
            'question' => 'Apakah saya dapat membatalkan pesanan?',
            'answer' => 'Pesanan dapat dibatalkan jika status pesanan masih dalam proses.',
        ]
    ]
]);
