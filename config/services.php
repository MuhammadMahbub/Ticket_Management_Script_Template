<?php

return [

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    // 'google' => [
    //     'client_id' => '336697325185-ekp18n4juphj2g8ksg444mbi9b79q7ns.apps.googleusercontent.com',
    //     'client_secret' => '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',
    //     'redirect' => 'http://localhost:8000/google/callback',
    // ],

    // 'google' => [
    //     'client_id' => socialite()->client_id,
    //     'client_secret' => socialite()->client_secret,
    //     'redirect' => socialite()->redirect,
    // ],

    // 'google' => [
    //     'client_id' => env('CLIENT_ID'),
    //     'client_secret' => env('CLIENT_SECRET'),
    //     'redirect' => env('REDIRECT'),
    // ],

];
