<?php

namespace Bytic\Migrations\Config\Traits;

/**
 * Trait HasEnviromentsTrait
 * @package Bytic\Migrations\Config\Traits
 */
trait HasEnviromentsTrait
{

    /**
     * @param $name
     * @param $config
     */
    public function addEnviromentFromEnv($name = 'local', $config = [])
    {
        $env = [
            'adapter' => 'DB_ADAPTER',
            'host'    => 'DB_HOST',
            'name'    => 'DB_DATABASE',
            'user'    => 'DB_USERNAME',
            'pass'    => 'DB_PASSWORD',
        ];
        foreach ($env as $param => $envName) {
            if (!empty($config[$param])) {
                continue;
            }
            if (empty($_ENV[$envName])) {
                continue;
            }
            $config[$param] = $_ENV[$envName];
        }
        $this->addEnviroment($name, $config);
    }

    /**
     * @param $name
     * @param $config
     */
    public function addEnviroment($name, $config)
    {
        $default = [
            'adapter'   => 'mysql',
            'host'      => 'localhost',
            'name'      => '',
            'user'      => '',
            'pass'      => '',
            'port'      => '3306',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
        ];
        foreach ($default as $param => $value) {
            if (isset($config[$param])) {
                continue;
            }
            $config[$param] = $value;
        }
        $this->params['environments'][$name] = $config;
    }
}