<?php

namespace Bytic\Migrations\Config\Traits;

/**
 * Trait HasPathsTrait
 * @package Bytic\Migrations\Config\Traits
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