<?php

return [
    'paths' => [
        'migrations' => '',
        'seeds' => '',
    ],
    'environments' => [
        'local' => [
            'adapter' => 'mysql',
            'host' => $_ENV['DB_HOST'],
            'name' => $_ENV['DB_DATABASE'],
            'user' => $_ENV['DB_USERNAME'],
            'pass' => $_ENV['DB_PASSWORD'],
            'port' => '3306',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ],
    ],
];
