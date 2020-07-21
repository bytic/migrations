<?php

namespace ByTIC\Migrations\Utility\Traits;

/**
 * Trait HasCommandPathTrait
 * @package ByTIC\Migrations\Utility\Traits
 */
trait HasCommandPathTrait
{
    /**
     * @var null|string
     */
    protected static $commandPath = null;

    /**
     * @return null|string
     */
    public static function getCommandPath()
    {
        if (static::$commandPath === null) {
            static::$commandPath = static::detectCommandPath();
        }
        return static::$commandPath;
    }

    /**
     * @param string|null $path
     */
    public static function setCommandPath($path)
    {
        self::$commandPath = $path;
    }

    /**
     * @return null|string
     */
    protected static function detectCommandPath()
    {
        $paths = [
            static::normalizePath(static::getBasePath(),'vendor','bin','phinx'),
            '~/.composer/vendor/bin/phinx'
        ];
        foreach ($paths as $path) {
            if (file_exists($path)) {
                return $path;
            }
        }
        return null;
    }
}
