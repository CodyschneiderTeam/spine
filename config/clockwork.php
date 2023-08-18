<?php

use System\Foundation\Path;
use Illuminate\Support\Env;

return [

    /*
    |-----------------------------------------------------------------------
    | Enable Clockwork
    |-----------------------------------------------------------------------
    |
    | Clockwork is enabled by default only when your application is in
    | debug mode. Here you can explicitly enable or disable Clockwork.
    | When off, no data is collected and the api and web ui are inactive.
    |
    */

    'enable' => Env::get('CLOCKWORK_ENABLE'),

    /*
    |-----------------------------------------------------------------------
    | Features
    |-----------------------------------------------------------------------
    |
    | You can enable or disable various Clockwork features here. Some
    | features have additional settings (eg. slow query threshold).
    |
    */

    'features' => [

        'cache' => [
            'enabled'         => Env::get('CLOCKWORK_CACHE_ENABLED', false),
            'collect_queries' => Env::get('CLOCKWORK_CACHE_QUERIES', false),
            'collect_values'  => Env::get('CLOCKWORK_CACHE_COLLECT_VALUES', false),
        ],

        'database' => [
            'enabled'                  => Env::get('CLOCKWORK_DATABASE_ENABLED', true),
            'collect_queries'          => Env::get('CLOCKWORK_DATABASE_COLLECT_QUERIES', true),
            'collect_models_actions'   => Env::get('CLOCKWORK_DATABASE_COLLECT_MODELS_ACTIONS', true),
            'collect_models_retrieved' => Env::get('CLOCKWORK_DATABASE_COLLECT_MODELS_RETRIEVED', false),
            'slow_threshold'           => Env::get('CLOCKWORK_DATABASE_SLOW_THRESHOLD'),
            'slow_only'                => Env::get('CLOCKWORK_DATABASE_SLOW_ONLY', false),
            'detect_duplicate_queries' => Env::get('CLOCKWORK_DATABASE_DETECT_DUPLICATE_QUERIES', false),
        ],

        'events' => [
            'enabled'        => Env::get('CLOCKWORK_EVENTS_ENABLED', true),
            'ignored_events' => [],
        ],

        'log' => [
            'enabled' => Env::get('CLOCKWORK_LOG_ENABLED', false),
        ],

        'notifications' => [
            'enabled' => Env::get('CLOCKWORK_NOTIFICATIONS_ENABLED', true),
        ],

        'performance' => [
            'client_metrics' => Env::get('CLOCKWORK_PERFORMANCE_CLIENT_METRICS', true),
        ],

        'queue' => [
            'enabled' => Env::get('CLOCKWORK_QUEUE_ENABLED', true),
        ],

        'redis' => [
            'enabled' => Env::get('CLOCKWORK_REDIS_ENABLED', true),
        ],

        'routes' => [
            'enabled'         => Env::get('CLOCKWORK_ROUTES_ENABLED', false),
            'only_namespaces' => ['App'],
        ],

        'views' => [
            'enabled'           => Env::get('CLOCKWORK_VIEWS_ENABLED', false),
            'collect_data'      => Env::get('CLOCKWORK_VIEWS_COLLECT_DATA', false),
            'use_twig_profiler' => Env::get('CLOCKWORK_VIEWS_USE_TWIG_PROFILER', false),
        ],

    ],

    /*
    |-----------------------------------------------------------------------
    | Enable web UI
    |-----------------------------------------------------------------------
    |
    | Clockwork comes with a web UI accessible via http://your.app/clockwork.
    | Here you can enable or disable this feature. You can also set a custom
    | path for the web UI.
    |
    */

    'web' => Env::get('CLOCKWORK_WEB', true),

    /*
    |-----------------------------------------------------------------------
    | Enable toolbar
    |-----------------------------------------------------------------------
    |
    | Clockwork can show a toolbar with basic metrics on all responses.
    | Here you can enable or disable this feature. Requires a separate
    | clockwork-browser npm library.
    |
    */

    'toolbar' => Env::get('CLOCKWORK_TOOLBAR', false),

    /*
    |-----------------------------------------------------------------------
    | HTTP requests collection
    |-----------------------------------------------------------------------
    |
    | Clockwork collects data about HTTP requests to your app. Here you can
    | choose which requests should be collected.
    |
    */

    'requests' => [
        'on_demand'        => Env::get('CLOCKWORK_REQUESTS_ON_DEMAND', false),
        'errors_only'      => Env::get('CLOCKWORK_REQUESTS_ERRORS_ONLY', false),
        'slow_threshold'   => Env::get('CLOCKWORK_REQUESTS_SLOW_THRESHOLD'),
        'slow_only'        => Env::get('CLOCKWORK_REQUESTS_SLOW_ONLY', false),
        'sample'           => Env::get('CLOCKWORK_REQUESTS_SAMPLE', false),
        'except'           => ['/horizon/.*', '/telescope/.*', '/_debugbar/.*'],
        'only'             => [],
        'except_preflight' => Env::get('CLOCKWORK_REQUESTS_EXCEPT_PREFLIGHT', true),
    ],

    /*
    |-----------------------------------------------------------------------
    | Artisan commands collection
    |-----------------------------------------------------------------------
    |
    | Clockwork can collect data about executed artisan commands. Here you
    | can enable and configure which commands should be collected.
    |
    */

    'artisan' => [
        'collect'                 => Env::get('CLOCKWORK_ARTISAN_COLLECT', false),
        'except'                  => [],
        'only'                    => [],
        'collect_output'          => Env::get('CLOCKWORK_ARTISAN_COLLECT_OUTPUT', false),
        'except_laravel_commands' => Env::get('CLOCKWORK_ARTISAN_EXCEPT_LARAVEL_COMMANDS', true),
    ],

    /*
    |-----------------------------------------------------------------------
    | Queue jobs collection
    |-----------------------------------------------------------------------
    |
    | Clockwork can collect data about executed queue jobs. Here you can
    | enable and configure which queue jobs should be collected.
    |
    */

    'queue' => [
        'collect' => Env::get('CLOCKWORK_QUEUE_COLLECT', false),
        'except'  => [],
        'only'    => [],
    ],

    /*
    |-----------------------------------------------------------------------
    | Tests collection
    |-----------------------------------------------------------------------
    |
    | Clockwork can collect data about executed tests. Here you can enable
    | and configure which tests should be collected.
    |
    */

    'tests' => [
        'collect' => Env::get('CLOCKWORK_TESTS_COLLECT', false),
        'except'  => [],
    ],

    /*
    |-----------------------------------------------------------------------
    | Enable data collection when Clockwork is disabled
    |-----------------------------------------------------------------------
    |
    | You can enable this setting to collect data even when Clockwork is
    | disabled, e.g. for future analysis.
    |
    */

    'collect_data_always' => Env::get('CLOCKWORK_COLLECT_DATA_ALWAYS', false),

    /*
    |-----------------------------------------------------------------------
    | Metadata storage
    |-----------------------------------------------------------------------
    |
    | Configure how is the metadata collected by Clockwork stored. Two
    | options are available:
    |
    |   - files - Storing data in one-per-request files.
    |   - sql - Stores requests in a sql database.
    |   - redis - Stores requests in redis. Requires phpredis.
    |
    */

    'storage'                => Env::get('CLOCKWORK_STORAGE', 'sql'),
    'storage_files_path'     => Env::get('CLOCKWORK_STORAGE_FILES_PATH', Path::storage('framework/clockwork')),
    'storage_files_compress' => Env::get('CLOCKWORK_STORAGE_FILES_COMPRESS', false),
    'storage_sql_database'   => Env::get('CLOCKWORK_STORAGE_SQL_DATABASE', 'testing'),
    'storage_sql_table'      => Env::get('CLOCKWORK_STORAGE_SQL_TABLE', 'clockwork'),
	'storage_redis'          => Env::get('CLOCKWORK_STORAGE_REDIS', 'default'),
	'storage_redis_prefix'   => Env::get('CLOCKWORK_STORAGE_REDIS_PREFIX', 'clockwork'),
    'storage_expiration'     => Env::get('CLOCKWORK_STORAGE_EXPIRATION', 2),

    /*
    |-----------------------------------------------------------------------
    | Authentication
    |-----------------------------------------------------------------------
    |
    | Clockwork can be configured to require authentication before allowing
    | access to the collected data. This might be useful when the application
    | is publicly accessible. Setting to true will enable a simple
    | authentication with a pre-configured password. You can also pass a
    | class name of a custom implementation.
    |
    */

    'authentication'          => Env::get('CLOCKWORK_AUTHENTICATION', false),
    'authentication_password' => Env::get('CLOCKWORK_AUTHENTICATION_PASSWORD', 'VerySecretPassword'),

    /*
    |-----------------------------------------------------------------------
    | Stack traces collection
    |-----------------------------------------------------------------------
    |
    | Clockwork can collect stack traces for log messages and certain data
    | like database queries. Here you can set whether to collect stack
    | traces, limit the number of collected frames and set further
    | configuration. Collecting long stack traces considerably
    | increases metadata size.
    |
    */

    'stack_traces' => [
        'enabled'         => Env::get('CLOCKWORK_STACK_TRACES_ENABLED', true),
        'limit'           => Env::get('CLOCKWORK_STACK_TRACES_LIMIT', 10),
        'skip_vendors'    => [],
        'skip_namespaces' => [],
        'skip_classes'    => [],
    ],

    /*
    |-----------------------------------------------------------------------
    | Serialization
    |-----------------------------------------------------------------------
    |
    | Clockwork serializes the collected data to json for storage and
    | transfer. Here you can configure certain aspects of serialization.
    | Serialization has a large effect on the cpu time and memory usage.
    |
    */

    'serialization_depth' => Env::get('CLOCKWORK_SERIALIZATION_DEPTH', 10),
    'serialization_blackbox' => [
        \Illuminate\Container\Container::class,
        \Illuminate\Foundation\Application::class,
        \Laravel\Lumen\Application::class,
    ],

    /*
    |-----------------------------------------------------------------------
    | Register helpers
    |-----------------------------------------------------------------------
    |
    | Clockwork comes with a "clock" global helper function. You can use
    | this helper to quickly log something and to access the instance.
    |
    */

    'register_helpers' => Env::get('CLOCKWORK_REGISTER_HELPERS', true),

    /*
    |-----------------------------------------------------------------------
    | Send headers for AJAX request
    |-----------------------------------------------------------------------
    |
    | When trying to collect data, the AJAX method can sometimes fail if it
    | is missing required headers. For example, an API might require a
    | version number using Accept headers to route the HTTP request
    | to the correct codebase.
    |
    */

    'headers' => [],

    /*
    |-----------------------------------------------------------------------
    | Server timing
    |-----------------------------------------------------------------------
    |
    | Clockwork supports the W3C Server Timing specification, which allows
    | for collecting a simple performance metrics in a cross-browser way.
    | E.g. in Chrome, your app, database and timeline event timings will
    | be shown in the Dev Tools network tab. This setting specifies the
    | max number of timeline events that will be sent. Setting to false
    | will disable the feature.
    |
    */

    'server_timing' => Env::get('CLOCKWORK_SERVER_TIMING', 10),

];
