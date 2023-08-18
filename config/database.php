<?php

use System\Support\Text;
use Illuminate\Support\Env;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => Env::get('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'mysql' => [
            'driver'         => Env::get('DB_DRIVER', 'mysql'),
            'url'            => Env::get('DATABASE_URL'),
            'host'           => Env::get('DB_HOST', '127.0.0.1'),
            'port'           => Env::get('DB_PORT', '3306'),
            'database'       => Env::get('DB_DATABASE', 'forge'),
            'username'       => Env::get('DB_USERNAME', 'forge'),
            'password'       => Env::get('DB_PASSWORD', ''),
            'unix_socket'    => Env::get('DB_SOCKET', ''),
            'charset'        => 'utf8mb4',
            'collation'      => 'utf8mb4_0900_ai_ci',
            'prefix'         => '',
            'prefix_indexes' => true,
            'strict'         => true,
            'engine'         => null,
            'options'        => [],
        ],

        'testing' => [
            'driver'         => 'mysql',
            'url'            => null,
            'host'           => '127.0.0.1',
            'port'           => '3306',
            'database'       => 'testing',
            'username'       => 'root',
            'password'       => '',
            'unix_socket'    => '',
            'charset'        => 'utf8mb4',
            'collation'      => 'utf8mb4_0900_ai_ci',
            'prefix'         => '',
            'prefix_indexes' => true,
            'strict'         => true,
            'engine'         => null,
            'options'        => [],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client'  => Env::get('REDIS_CLIENT', 'predis'),

        'options' => [
            'cluster' => Env::get('REDIS_CLUSTER', 'redis'),
            'prefix'  => Env::get('REDIS_PREFIX', Text::slug(Env::get('APP_NAME'), '_') . '_database_'),
        ],

        'default' => [
            'url'      => Env::get('REDIS_URL'),
            'host'     => Env::get('REDIS_HOST', '127.0.0.1'),
            'password' => Env::get('REDIS_PASSWORD'),
            'port'     => Env::get('REDIS_PORT', '6379'),
            'database' => Env::get('REDIS_DB', '0'),
        ],

        'cache'   => [
            'url'      => Env::get('REDIS_URL'),
            'host'     => Env::get('REDIS_HOST', '127.0.0.1'),
            'password' => Env::get('REDIS_PASSWORD'),
            'port'     => Env::get('REDIS_PORT', '6379'),
            'database' => Env::get('REDIS_CACHE_DB', '0'),
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Slow Query Duration
    |--------------------------------------------------------------------------
    |
    | This value specifies the maximum duration in milliseconds that a query
    | may run for before it is considered slow and should be reported for
    | review via an exception. Set to null, to skip monitoring queries.
    |
    */

    'slow_query_duration' => Env::get('DB_SLOW_QUERY_DURATION', 5000),

];
