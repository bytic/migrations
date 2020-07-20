<?php

namespace Bytic\Migrations\Tests\Migrator\Traits;

use Bytic\Migrations\Migrator;
use Bytic\Migrations\Tests\AbstractTest;
use Bytic\Migrations\Utility\Helper;

/**
 * Class HasConfigTraitTest
 * @package Bytic\Migrations\Tests\Migrator\Traits
 */
class HasConfigTraitTest extends AbstractTest
{
    public function test_getCachedConfigPath()
    {
        $migrator = new Migrator();
        Helper::setBasePath(TEST_FIXTURE_PATH);

        $configPath = $migrator->getCachedConfigPath();
        self::assertFileExists($configPath);

        $data = require $configPath;
        self::assertIsArray($data);

        self::assertCount(1, $data['paths']['migrations']);
        self::assertCount(1, $data['paths']['seeds']);
        self::assertCount(1, $data['environments']);
    }
}
