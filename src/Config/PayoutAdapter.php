<?php

return [
    'default' => 'transferwise',

    'transferwise' => [
        'api_token' => env('TRANSFERWISE_API_KEY'),
        'profile_id' => env('TRANSFERWISE_PROFILE')
    ],
];
