<?php

return [
    // режим отладки
    'debug'     => true,

    // возможные приложения
    'app.list'  => [
        'public',
        'admin',
    ],

    // ключ шифрования
    'secret'    => 'change-me-please',

    // базовая папка
    'base_dir'  => __DIR__ . '/..',

    // базовый хост
    'base_host' => '',

    // базовый порт
    'base_port' => 80,

    // подключение к базе данных
    'database'  => [
        [
            'dsn'      => 'mysql:host=DB_HOST;dbname=DB_NAME',
            'username' => '',
            'password' => '',
            'option'   => [
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
            ],
        ],
    ],

    // подключение к memcache
    'memory'    => [
        [
            'host' => 'localhost',
            'port' => 11211,
        ],
    ],

    // расположение модулей
    'modules'   => [
        __DIR__ . '/module/',
    ],
];