<?php

namespace ByTIC\Migrations\Config\Traits;

use ByTIC\Migrations\Utility\Helper;

/**
 * Trait HasPathsTrait
 * @package ByTIC\Migrations\Config\Traits
 */
trait HasPathsTrait
{
    /**
     * @param $path
     */
    public function addBasePath($path)
    {
        $this->setPath($path . DIRECTORY_SEPARATOR . 'migrations', 'migrations');
        $this->setPath($path . DIRECTORY_SEPARATOR . 'seeds', 'seeds');
    }

    /**
     * @param string $type
     */
    public function initPaths($type = 'migrations')
    {
        $paths = [];
        if (in_array($type, ['migrations', 'seeds'])) {
            $test = Helper::normalizePath(Helper::getBasePath(), 'database', $type);
            if (is_dir($test)) {
                $paths[] = $test;
            }
        }
        $this->setPath($paths, $type);
    }

    /**
     * @param $type
     * @param $path
     */
    public function setPath($path, $type = 'migrations')
    {
        $path = is_array($path) ? $path : [$path];
        $this->params['paths'][$type] = $path;
    }

    /**
     * Register a custom migration path.
     *
     * @param string $path
     * @param string $type
     * @return void
     */
    public function path($path, $type = 'migrations')
    {
        $this->params['paths'][$type] = array_unique(array_merge($this->params['paths'][$type], [$path]));
    }

    /**
     * @param string $type
     * @return mixed
     */
    public function paths($type = 'migrations')
    {
        return $this->params['paths'][$type];
    }
}