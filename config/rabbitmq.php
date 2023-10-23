<?php

return [
    'default' => [
        'host'  => env('RABBIT_MQ_HOST', 'localhost'),
        'port'  => env('RABBIT_MQ_PORT', 5672),
        'user'  => env('RABBIT_MQ_USER', 'guest'),
        'pass'  => env('RABBIT_MQ_PASS', 'guest'),
        'vhost' => env('RABBIT_MQ_VHOST', '/'),
    ],
];
