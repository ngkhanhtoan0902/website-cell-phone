<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

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

    'google' => [
        'grecaptchaKey' => env('GOOGLE_RECAPTCHA_KEY','6Lc9zdobAAAAAMXFCqt1o_szSbH5bhJZExK8rbfz'),
        'grecaptchaSecret' => env('GOOGLE_RECAPTCHA_SECRET','6Lc9zdobAAAAAIgG07cF2wK00zJ-86HW4WVUeX_-')
    ],

    'telegram' => [
        'bot_token' => '945151095:AAHNux9jpUJ6iH0VlY-ZYyIVgrX8u05sUiM',
        'realtime_group' => env('RCMS_TELEGRAM_GROUP', '-641080195'), // Group realtime report
        'log_group' => env('RCMS_TELEGRAM_LOG', '-310463162'), // Group logs report
        'stripe_log_group' => env('RCMS_TELEGRAM_STRIPE_LOG', '-310463162'), // Group logs report,
        'daily_report_group' => env('RCMS_TELEGRAM_DAILY_REPORT', '-310463162'), // Group logs report
        'booking_demo_group' => env('RCMS_TELEGRAM_BOOKING_DEMO','-967753226') //Group demo booking
    ]
];
