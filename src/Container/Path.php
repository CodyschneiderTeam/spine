<?php

namespace System\Container;

use Illuminate\Container\Container;

class Path
{
    /**
     * Retrieve the path to the app folder.
     *
     */
    public static function app(string $path = '') : string
    {
        return Container::getInstance()->path($path);
    }

    /**
     * Retrieve the path to the root folder.
     *
     */
    public static function base(string $path = '') : string
    {
        return Container::getInstance()->basePath($path);
    }

    /**
     * Retrieve the path to the configuration folder.
     *
     */
    public static function config(string $path = '') : string
    {
        return Container::getInstance()->configPath($path);
    }

    /**
     * Retrieve the path to the database folder.
     *
     */
    public static function database(string $path = '') : string
    {
        return Container::getInstance()->databasePath($path);
    }

    /**
     * Retrieve the path to the public folder.
     *
     */
    public static function public(string $path = '') : string
    {
        return Container::getInstance()->publicPath($path);
    }

    /**
     * Retrieve the path to the resource folder.
     *
     */
    public static function resource(string $path = '') : string
    {
        return Container::getInstance()->resourcePath($path);
    }

    /**
     * Retrieve the path to the storage folder.
     *
     */
    public static function storage(string $path = '') : string
    {
        return Container::getInstance()->storagePath($path);
    }
}
