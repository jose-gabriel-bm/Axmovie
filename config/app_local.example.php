<?php

return [
   
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),

    
    'Security' => [
        'salt' => env('SECURITY_SALT', '__SALT__'),
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
