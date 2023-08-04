<?php

use System\Foundation\Path;
use Illuminate\Support\Env;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => Env::get('FILESYSTEM_DISK', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'public' => [
            'driver'     => 'local',
            'root'       => Path::storage((Env::get('APP_ENV') === 'testing' ? 'framework/testing' : 'app') . '/public'),
            'url'        => Env::get('APP_URL') . (Env::get('APP_ENV') === 'testing' ? '/testing' : '/storage'),
            'visibility' => 'public',
            'throw'      => false,
        ],

        'private' => [
            'driver'     => 'local',
            'root'       => Path::storage((Env::get('APP_ENV') === 'testing' ? 'framework/testing' : 'app') . '/private'),
            'url'        => Env::get('APP_URL') . (Env::get('APP_ENV') === 'testing' ? '/testing' : '/storage'),
            'visibility' => 'private',
            'throw'      => false,
        ],

        'backup' => [
            'driver'                  => 's3',
            'key'                     => Env::get('AWS_ACCESS_KEY_ID'),
            'secret'                  => Env::get('AWS_SECRET_ACCESS_KEY'),
            'region'                  => Env::get('AWS_DEFAULT_REGION', 'eu-west-2'),
            'bucket'                  => Env::get('AWS_BUCKET'),
            'url'                     => Env::get('AWS_URL'),
            'endpoint'                => Env::get('AWS_ENDPOINT'),
            'use_path_style_endpoint' => Env::get('AWS_USE_PATH_STYLE_ENDPOINT', false),
            'throw'                   => false,
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [
        Path::public('storage') => Path::storage('app/public'),
        Path::public('testing') => Path::storage('framework/testing/public'),
    ],

];
