<?php

define('TEST_BASE_PATH', realpath(__DIR__));
define('PROJECT_BASE_PATH', dirname(TEST_BASE_PATH));
define('TEST_FIXTURE_PATH', TEST_BASE_PATH . DIRECTORY_SEPARATOR . 'fixtures');

error_reporting(E_ALL);

require PROJECT_BASE_PATH . '/vendor/autoload.php';

\Nip\Container\Container::setInstance(new \Nip\Container\Container());
