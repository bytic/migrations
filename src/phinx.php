<?php

$baseDir = getcwd();

Dotenv\Dotenv::createImmutable($baseDir)->load();

$config = new \Bytic\Migrations\Utility\Config();
$config->addBasePath($baseDir);
$config->addEnviromentFromEnv();

return $config;
