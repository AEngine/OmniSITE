<?php

return [
    // debug mode
    'debug'     => true,

    // app list
    'app.list'  => [
        'public',
    ],

    // secret keystring
    'secret'    => 'change-me-please',

    // base app dir
    'base_dir'  => __DIR__ . '/..',

    // base host name
    'base_host' => '',

    // base port
    'base_port' => 80,

    // database connection server list
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

    // memcache connection server list
    'memory'    => [
        [
            'host' => 'localhost',
            'port' => 11211,
        ],
    ],

    // module folder list
    'modules'   => [
        __DIR__ . '/src/Module',
    ],
];
