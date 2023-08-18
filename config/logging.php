<?php

use System\Foundation\Path;
use Illuminate\Support\Env;
use Monolog\Handler\NullHandler;
use Monolog\Handler\StreamHandler;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Log Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default log channel that gets used when writing
    | messages to the logs. The name specified in this option should match
    | one of the channels defined in the "channels" configuration array.
    |
    */

    'default' => Env::get('LOG_CHANNEL', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Deprecations Log Channel
    |--------------------------------------------------------------------------
    |
    | This option controls the log channel that should be used to log warnings
    | regarding deprecated PHP and library features. This allows you to get
    | your application ready for upcoming major versions of dependencies.
    |
    */

    'deprecations' => Env::get('LOG_DEPRECATIONS_CHANNEL', 'null'),

    /*
    |--------------------------------------------------------------------------
    | Log Channels
    |--------------------------------------------------------------------------
    |
    | Here you may configure the log channels for your application. Out of
    | the box, Laravel uses the Monolog PHP logging library. This gives
    | you a variety of powerful log handlers / formatters to utilize.
    |
    | Available Drivers: "single", "daily", "slack", "syslog",
    |                    "errorlog", "monolog",
    |                    "custom", "stack"
    |
    */

    'channels' => [
        'stack' => [
            'driver'            => 'stack',
            'channels'          => [Env::get('LOG_STACK', 'bugsnag')],
            'ignore_exceptions' => false,
        ],

        'single' => [
            'driver' => 'single',
            'path'   => Path::storage('framework/logs/laravel.log'),
            'level'  => Env::get('LOG_LEVEL', 'debug'),
        ],

        'daily' => [
            'driver' => 'daily',
            'path'   => Path::storage('framework/logs/laravel.log'),
            'level'  => Env::get('LOG_LEVEL', 'debug'),
            'days'   => 14,
        ],

        'bugsnag' => [
            'driver' => 'bugsnag',
        ],

        'slack' => [
            'driver'   => 'slack',
            'url'      => Env::get('SLACK_WEBHOOK_URL'),
            'username' => 'Laravel Log',
            'emoji'    => ':boom:',
            'level'    => 'debug',
        ],

        'stderr' => [
            'driver'    => 'monolog',
            'level'     => Env::get('LOG_LEVEL', 'debug'),
            'handler'   => StreamHandler::class,
            'formatter' => Env::get('LOG_STDERR_FORMATTER'),
            'with'      => [
                'stream' => 'php://stderr',
            ],
        ],

        'syslog' => [
            'driver' => 'syslog',
            'level'  => Env::get('LOG_LEVEL', 'debug'),
        ],

        'errorlog' => [
            'driver' => 'errorlog',
            'level'  => Env::get('LOG_LEVEL', 'debug'),
        ],

        'null' => [
            'driver'  => 'monolog',
            'handler' => NullHandler::class,
        ],

        'emergency' => [
            'path' => Path::storage('framework/logs/laravel.log'),
        ],
    ],

];
