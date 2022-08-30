<?php

declare(strict_types=1);

use Symfony\Component\Dotenv\Dotenv;

$baseDir = getcwd();
(new Dotenv())
    ->bootEnv($baseDir.'/.env');

$config = new \ByTIC\Migrations\Config\Config();
$config->addBasePath($baseDir);
$config->addEnviromentFromEnv();

return $config;
