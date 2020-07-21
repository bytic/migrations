<?php

namespace ByTIC\Migrations\Migrator\Traits;

use ByTIC\Migrations\Utility\Helper;

/**
 * Trait HasPathsTrait
 * @package ByTIC\Migrations\Migrator\Traits
 */
trait HasPathsTrait
{

    /**
     * Register a custom migration path.
     *
     * @param string $path
     * @param string $type
     */
    public function path($path, $type = 'migrations')
    {
        $this->getConfig()->path($path, $type);
    }

    /**
     * Register a custom migration path.
     *
     * @param string $path
     * @param string $type
     */
    public function setPath($path, $type = 'migrations')
    {
        $this->getConfig()->setPath($path, $type);
    }

    /**
     * Get all of the custom migration paths.
     *
     * @param string $type
     * @return array
     */
    public function paths($type = 'migrations')
    {
        return $this->getConfig()->paths($type);
    }

    /**
     * @param string $type
     */
    protected function initPaths($type = 'migrations')
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
}
