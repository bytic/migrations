<?php

namespace Bytic\Migrations\Migrator\Traits;

/**
 * Trait HasEnviromentsTrait
 * @package Bytic\Migrations\Migrator\Traits
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
