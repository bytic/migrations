<?php

namespace ByTIC\Migrations\Migrator\Traits;

use ByTIC\Migrations\Config\Config;
use ByTIC\Migrations\Utility\Helper;

/**
 * Trait HasConfigTrait
 * @package ByTIC\Migrations\Migrator\Traits
 */
trait HasConfigTrait
{
    /**
     * @var null|Config
     */
    protected $config = null;

    /**
     * @return Config
     */
    public function getConfig()
    {
        if ($this->config === null) {
            $this->initConfig();
        }
        return $this->config;
    }

    /**
     * @param null $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

    /**
     * @return string
     */
    public function getCachedConfigPath()
    {
        $path = Helper::normalizePath(Helper::getBasePath(), 'bootstrap', 'cache', 'migrations.php');
        if (!file_exists($path)) {
            $this->generateCachedConfig($path);
        }
        return $path;
    }

    /**
     * @param $path
     */
    protected function generateCachedConfig($path)
    {
        $this->getConfig()->savePhp($path);
    }

    protected function initConfig()
    {
        $this->setConfig($this->generateConfig());
    }

    /**
     * @return Config
     */
    protected function generateConfig()
    {
        try {
            if (config()->has('migrations')) {
                return Config::fromConfig(config()->get('migrations')->toArray());
            }
        } catch (\Exception $e) {
        }

        $config = new Config();
        $config->initPaths('migrations');
        $config->initPaths('seeds');
        $config->addEnviromentFromEnv();
        return $config;
    }
}
