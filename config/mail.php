<?php

use System\Support\Text;
use System\Foundation\Path;
use Illuminate\Support\Env;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send any email
    | messages sent by your application. Alternative mailers may be setup
    | and used as needed; however, this mailer will be used by default.
    |
    */

    'default'  => Env::get('MAIL_MAILER', Env::get('APP_ENV', 'production') === 'testing' ? 'array' : 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers to be used while
    | sending an e-mail. You will specify which one you are using for your
    | mailers below. You are free to add additional mailers as required.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2"
    |            "postmark", "log", "array"
    |
    */

    'mailers' => [
        'smtp' => [
            'transport'  => 'smtp',
            'host'       => Env::get('MAIL_HOST', '127.0.0.1'),
            'port'       => Env::get('MAIL_PORT', 2525),
            'encryption' => Env::get('MAIL_ENCRYPTION', 'tls'),
            'username'   => Env::get('MAIL_USERNAME'),
            'password'   => Env::get('MAIL_PASSWORD'),
            'timeout'    => null,
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'log' => [
            'transport' => 'log',
            'channel'   => Env::get('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers'   => ['log'],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    */

    'from' => [
        'name'    => Env::get('MAIL_FROM_NAME', Env::get('APP_NAME')),
        'address' => Env::get('MAIL_FROM_ADDRESS', Text::lower('noreply@' . Env::get('APP_NAME') . '.test')),
    ],

    /*
    |--------------------------------------------------------------------------
    | Markdown Mail Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based email rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the emails. Or, you may simply stick with the Laravel defaults!
    |
    */

    'markdown' => [
        'theme' => 'system',
        'paths' => [Path::base('vendor/caneara/spine/resources/views/vendor/mail')],
    ],

];
