<?php

namespace ByTIC\Migrations\Tests\Config;

use ByTIC\Migrations\Tests\AbstractTest;
use ByTIC\Migrations\Config\Config;

/**
 * Class ConfigTest.
 */
class ConfigTest extends AbstractTest
{
    public function test_fromConfig()
    {
        $configParams = @require PROJECT_BASE_PATH . '/config/migrations.php';
        $config = Config::fromConfig($configParams);

        $params = $config->toArray();
        self::assertCount(8, $params['environments']['local']);
    }

    public function test_noConfig()
    {
        $config = new Config();

        self::assertSame(['paths' => ['migrations' => [], 'seeds' => []], 'environments' => []], $config->toArray());
    }

    public function test_addBasePath()
    {
        $config = new Config();
        $basePath = TEST_FIXTURE_PATH . DIRECTORY_SEPARATOR . 'directions';
        $config->addBasePath($basePath);
        self::assertSame(
            [
                'paths' => [
                    'migrations' => [$basePath . DIRECTORY_SEPARATOR . 'migrations'],
                    'seeds'      => [$basePath . DIRECTORY_SEPARATOR . 'seeds'],
                ],
                'environments' => [],
            ],
            $config->toArray()
        );
    }

    public function test_addEnviromentFromEnv()
    {
        $config = new Config();

        $_ENV['DB_HOST'] = 'localhost';
        $_ENV['DB_DATABASE'] = 'mydb';
        $_ENV['DB_USERNAME'] = 'root';
        $_ENV['DB_PASSWORD'] = 'pass';

        $config->addEnviromentFromEnv();
        $params = $config->toArray();

        self::assertSame(
            [
                'host'      => 'localhost',
                'name'      => 'mydb',
                'user'      => 'root',
                'pass'      => 'pass',
                'adapter'   => 'mysql',
                'port'      => '3306',
                'charset'   => 'utf8',
                'collation' => 'utf8_unicode_ci',
            ],
            $params['environments']['local']
        );
    }
}
