<?php

namespace ByTIC\Migrations\Migrator\Traits;

/**
 * Trait HasEnviromentsTrait
 * @package ByTIC\Migrations\Migrator\Traits
 */
trait HasEnviromentsTrait
{
    /**
     * @param string $name
     * @param array $config
     */
    public function addEnviromentFromEnv($name = 'local', $config = [])
    {
        $this->getConfig()->addEnviromentFromEnv($name, $config);
    }
}
