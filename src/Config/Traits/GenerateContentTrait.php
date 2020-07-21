<?php

namespace ByTIC\Migrations\Config\Traits;

/**
 * Trait GenerateContentTrait
 * @package ByTIC\Migrations\Config\Traits
 */
trait GenerateContentTrait
{
    /**
     * @param $configPath
     */
    public function savePhp($configPath)
    {
        file_put_contents($configPath, $this->generatePhpContent());
    }

    /**
     * @return string
     */
    public function generatePhpContent()
    {
        return '<?php return ' . var_export($this->params, true) . ';' . PHP_EOL;
    }
}
