<?php

$baseDir = getcwd();

Dotenv\Dotenv::createImmutable($baseDir)->load();

$config = new \ByTIC\Migrations\Config\Config();
$config->addBasePath($baseDir);
$config->addEnviromentFromEnv();

return $config;
