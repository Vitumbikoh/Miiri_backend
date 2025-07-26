<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:8080',
        'http://127.0.0.1:8080',
        'http://127.0.0.1:8000', // Usually not needed, but safe
    ],

    'allowed_headers' => ['*'],

    'supports_credentials' => true,
];

