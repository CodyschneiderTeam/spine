<?php

use Illuminate\Support\Env;
use Illuminate\Container\Container;

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
            'root'       => Container::getInstance()->storagePath((Env::get('APP_ENV') === 'testing' ? 'framework/testing' : 'app') . '/public'),
            'url'        => Env::get('APP_URL') . (Env::get('APP_ENV') === 'testing' ? '/testing' : '/storage'),
            'visibility' => 'public',
            'throw'      => false,
        ],

        'private' => [
            'driver'     => 'local',
            'root'       => Container::getInstance()->storagePath((Env::get('APP_ENV') === 'testing' ? 'framework/testing' : 'app') . '/private'),
            'url'        => Env::get('APP_URL') . (Env::get('APP_ENV') === 'testing' ? '/testing' : '/storage'),
            'visibility' => 'private',
            'throw'      => false,
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
        Container::getInstance()->publicPath('storage') => Container::getInstance()->storagePath('app/public'),
        Container::getInstance()->publicPath('testing') => Container::getInstance()->storagePath('framework/testing/public'),
    ],

];
