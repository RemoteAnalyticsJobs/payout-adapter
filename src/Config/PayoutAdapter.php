<?php

return [
    'default' => env('PAYOUT_DRIVER', 'transferwise'),

    'transferwise' => [

        'SANDBOX_TOKEN' => env('TRANSFERWISE_SANDBOX_KEY'),
        'SANDBOX_PROFILE_ID' => env('TRANSFERWISE_SANDBOX_PROFILE'),

        'LIVE_TOKEN' => env('TRANSFERWISE_API_KEY'),
        'LIVE_PROFILE_ID' => env('TRANSFERWISE_PROFILE'),
    ],

    'transpay' => [
        'SANDBOX_TOKEN' => env('TRANSPAY_SANDBOX_TOKEN'),
        'LIVE_TOKEN'    => env('TRANSPAY_API_KEY'),

        'TRANSPAY_SANDBOX_USER'     => env('TRANSPAY_SANDBOX_USER'),
        'TRANSPAY_SANDBOX_PASSWORD' => env('TRANSPAY_SANDBOX_PASSWORD')
    ]
];
