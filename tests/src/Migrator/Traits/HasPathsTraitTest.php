<?php

namespace ByTIC\Migrations\Tests\Migrator\Traits;

use ByTIC\Migrations\Migrator;
use ByTIC\Migrations\Tests\AbstractTest;
use ByTIC\Migrations\Utility\Helper;

/**
 * Class HasPathsTraitTest
 * @package ByTIC\Migrations\Tests\Migrator\Traits
 */
class HasPathsTraitTest extends AbstractTest
{
    public function test_paths_autodetect()
    {
        $migrator = new Migrator();

        Helper::setBasePath(TEST_FIXTURE_PATH);
        $basePath = TEST_FIXTURE_PATH . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR;

        self::assertSame([$basePath . 'migrations'], $migrator->paths());
        self::assertSame([$basePath . 'migrations'], $migrator->paths('migrations'));
        self::assertSame([$basePath . 'seeds'], $migrator->paths('seeds'));
    }
}
