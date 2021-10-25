<?php

return [
   
    'debug' => true,

    'Security' => [
        'salt' => env('SECURITY_SALT', '9683a2d68392d558fd645ee00ae47202d1cc7599250723b5d58d36f124b1917e'),
    ],

       'Datasources' => [
        'default' => [
            'host' => 'localhost',
            
            //'port' => 'non_standard_port_number',
            'username' => 'root',
            'password' => '323746',
            'database' => 'banco_axmovie',
            'log' => true,
            'url' => env('DATABASE_URL', null),
        ],
    ],

        'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];
