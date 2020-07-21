<?php

namespace ByTIC\Migrations\Utility\Traits;

/**
 * Trait HasBasePathTrait
 * @package ByTIC\Migrations\Utility\Traits
 */
trait HasBasePathTrait
{

    /**
     * @var null|string
     */
    protected static $basePath = null;

    /**
     * @return null|string
     */
    public static function getBasePath()
    {
        if (static::$basePath === null) {
            static::$basePath = static::detectAppPath();
        }
        return static::$basePath;
    }

    /**
     * @param string|null $basePath
     */
    public static function setBasePath($basePath)
    {
        self::$basePath = $basePath;
    }

    /**
     * @return null|string
     */
    protected static function detectAppPath()
    {
        $basePath = __DIR__;

        $maxStep = 5;
        $step = 0;
        while ($step <= $maxStep) {
            $basePath = dirname($basePath);
            if (file_exists($basePath . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php')) {
                return $basePath;
            }
            $step++;
        }
        return null;
    }
}