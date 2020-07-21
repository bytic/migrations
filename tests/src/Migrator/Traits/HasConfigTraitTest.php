<?php

namespace ByTIC\Migrations\Tests\Migrator\Traits;

use ByTIC\Migrations\Migrator;
use ByTIC\Migrations\Tests\AbstractTest;
use ByTIC\Migrations\Utility\Helper;

/**
 * Class HasConfigTraitTest
 * @package ByTIC\Migrations\Tests\Migrator\Traits
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
